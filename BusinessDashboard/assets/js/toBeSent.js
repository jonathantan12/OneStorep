var params = new URLSearchParams(location.search);
var account_id = params.get('account_id');
// console.log(account_id);

function toBeSent(account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getMultipleOrder(obj);
        }
    }

    request.open("GET", "./assets/classes/getMultipleOrder.php?account_id=" + account_id, true);
    request.send();
}

function getMultipleOrder(obj) {

    var displayMultipleOrder = `<br>
                  <div class="scrollable">
                  <table id="multipleDisplay" class="table table-striped-responsive">
                  <tr class="header">
                    <th>Order ID</th>
                    <th>Order Details</th>
                    <th>Address 1</th>
                    <th>Address 2</th>
                    <th>Postal Code</th>
                    <th>Unit Number</th>
                    <th>Customer Name</th>
                    <th>Customer Contact</th>
                  </tr>`;   


    for (var i=0; i < obj.length; i++){
        displayMultipleOrder += `<tr>
                                <td>${obj[i].order_id}</td>
                                <td>
                                    <table>
                                    <tr><td>${obj[i].product_quantity1}x ${obj[i].product_name1}</td></tr>`;
        
                                if (obj[i].product_quantity2 == "") {
                                    displayMultipleOrder += '';
                                }
                                else {
                                    displayMultipleOrder += `<tr><td>${obj[i].product_quantity2}x ${obj[i].product_name2}</td></tr>`;
                                }

                                if (obj[i].product_quantity3 == "") {
                                    displayMultipleOrder += '';
                                }
                                else {
                                    displayMultipleOrder += `<tr><td>${obj[i].product_quantity3}x ${obj[i].product_name3}</td></tr>`;
                                }

                                if (obj[i].product_quantity4 == "") {
                                    displayMultipleOrder += '';
                                }
                                else {
                                    displayMultipleOrder += `<tr><td>${obj[i].product_quantity4}x ${obj[i].product_name4}</td></tr>`;
                                }

                                if (obj[i].product_quantity5 == "") {
                                    displayMultipleOrder += '';
                                }
                                else {
                                    displayMultipleOrder += `<tr><td>${obj[i].product_quantity5}x ${obj[i].product_name5}</td></tr>`;
                                }
                                        
        displayMultipleOrder += `</table>
                                </td>
                                <td>${obj[i].address1}</td>
                                <td>${obj[i].address2}</td>
                                <td>${obj[i].postal_code}</td>
                                <td>${obj[i].unit_number}</td>
                                <td>${obj[i].customer_name}</td>
                                <td>${obj[i].customer_contact}</td>`;                          
    }
    displayMultipleOrder += `</table>
                      </div>`;

  // console.log(document.getElementById('displayDashboard').innerHTML);
  document.getElementById('displayMultipleOrder').innerHTML = displayMultipleOrder;   
  
}   

