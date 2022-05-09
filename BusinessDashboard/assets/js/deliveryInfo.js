function deliveryInfo(product_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            deliveryInfoDisplay(obj);
        }
    }

    request.open("GET", "./assets/classes/getOrderInfo.php?product_id=" + product_id, true);
    request.send();
}

function deliveryInfoDisplay(obj) {
  var deliveryInfoDisplay = `<section class="section contact">
                                <br>
                                <div class="col-xl">       
                                    <div class="info-box card">
                                    <i class="bi bi-truck"></i>
                                    <h3>Product Name: ${obj[0].product_name}</h3>
                                    <h3>Product Brand: ${obj[0].product_brand}</h3>
                                    <h3>Product Type: ${obj[0].product_type}</h3>
                                    <h3>Product Colour: ${obj[0].product_colour}</h3>
                                    <h3>Product Size: ${obj[0].product_size}</h3>
                                    <h3>Product Weight: ${obj[0].product_weight}</h3>
                                    <h3>Product Dimension: ${obj[0].product_dimension}</h3>
                                    </br>
                                    <h3>Customer Name: ${obj[0].customer_name}</h3>
                                    <h3>Customer Contact: ${obj[0].customer_contact}</h3>
                                    <h3>Address Line 1: ${obj[0].address1}</h3>
                                    <h3>Address Line 2: ${obj[0].address2}</h3>
                                    <h3>Unit Number: ${obj[0].unit_number}</h3>
                                    <h3>Postal Code: ${obj[0].postal_code}</h3>
                                    
                                    </div>
                                </div>


                                </section>`;

  document.getElementById('deliveryInfo').innerHTML = deliveryInfoDisplay;  
}
