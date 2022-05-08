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
  console.log(obj);
  console.log(obj[0].unit_number);
  var deliveryInfoDisplay = `${obj[0].unit_number}`;

  document.getElementById('deliveryInfo').innerHTML = deliveryInfoDisplay;  
  // document.getElementById('floatingAccountId').value = obj[0].account_id;
  // document.getElementById('floatingProductId').value = obj[0].product_id;
  // document.getElementById('floatingName').value = obj[0].product_name;
  // document.getElementById('floatingBrand').value = obj[0].product_brand;
  // document.getElementById('floatingCategory').value = obj[0].product_type;
  // document.getElementById('floatingColour').value = obj[0].product_colour;
  // document.getElementById('floatingSize').value = obj[0].product_size;
  // document.getElementById('floatingWeight').value = obj[0].product_weight;
  // document.getElementById('floatingDimension').value = obj[0].product_dimension;

}
