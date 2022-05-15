function ordersFulfilled($account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request

    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getFulfilledOrder(obj);
        }
    }
    
    request.open("GET", "./assets/classes/getMultipleOrder.php?account_id=" + atob($account_id), true);
    request.send();
}

function getFulfilledOrder(obj) {
    var displayMultipleOrder = `<br>
                  <div class="scrollable">
                  <table id="multipleDisplay" class="table table-striped-responsive">
                  <tr class="header">
                    <th>Account ID</th>
                    <th>Order ID</th>
                    <th>Order Details</th>
                    <th>Address 1</th>
                    <th>Address 2</th>
                    <th>Postal Code</th>
                    <th>Unit Number</th>
                    <th>Customer Name</th>
                    <th>Customer Contact</th>
                    <th>Date Arranged</th>
                  </tr>`;   


    for (var i=0; i < obj.length; i++){
        if (obj[i].order_status == "sent") {
            displayMultipleOrder += `<tr>
                                    <td>${obj[i].account_id}</th>
                                    <td>${obj[i].order_id}</td>
                                    <td>
                                        <table>
                                        <tr><td>${obj[i].product_quantity1}x ${obj[i].product_name1}</td></tr>`;
            
                                    if (obj[i].product_quantity2 == null || obj[i].product_quantity2 == "") {
                                        displayMultipleOrder += '';
                                    }
                                    else {
                                        displayMultipleOrder += `<tr><td>${obj[i].product_quantity2}x ${obj[i].product_name2}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity3 == null || obj[i].product_quantity3 == "") {
                                        displayMultipleOrder += '';
                                    }
                                    else {
                                        displayMultipleOrder += `<tr><td>${obj[i].product_quantity3}x ${obj[i].product_name3}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity4 == null || obj[i].product_quantity4 == "") {
                                        displayMultipleOrder += '';
                                    }
                                    else {
                                        displayMultipleOrder += `<tr><td>${obj[i].product_quantity4}x ${obj[i].product_name4}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity5 == null || obj[i].product_quantity5 == "") {
                                        displayMultipleOrder += '';
                                    }
                                    else {
                                        displayMultipleOrder += `<tr><td>${obj[i].product_quantity5}x ${obj[i].product_name5}</td></tr>`;
                                    }
                                    
                                    // ---
                                    if (obj[i].product_quantity6 == null || obj[i].product_quantity6 == "") {
                                        displayMultipleOrder += '';
                                    }
                                    else {
                                        displayMultipleOrder += `<tr><td>${obj[i].product_quantity6}x ${obj[i].product_name6}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity7 == null || obj[i].product_quantity7 == "") {
                                        displayMultipleOrder += '';
                                    }
                                    else {
                                        displayMultipleOrder += `<tr><td>${obj[i].product_quantity7}x ${obj[i].product_name7}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity8 == null || obj[i].product_quantity8 == "") {
                                        displayMultipleOrder += '';
                                    }
                                    else {
                                        displayMultipleOrder += `<tr><td>${obj[i].product_quantity8}x ${obj[i].product_name8}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity9 == null || obj[i].product_quantity9 == "") {
                                        displayMultipleOrder += '';
                                    }
                                    else {
                                        displayMultipleOrder += `<tr><td>${obj[i].product_quantity9}x ${obj[i].product_name9}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity10 == null || obj[i].product_quantity10 == "") {
                                        displayMultipleOrder += '';
                                    }
                                    else {
                                        displayMultipleOrder += `<tr><td>${obj[i].product_quantity10}x ${obj[i].product_name10}</td></tr>`;
                                    }
                                            
            displayMultipleOrder += `</table>
                                    </td>
                                    <td>${obj[i].address1}</td>
                                    <td>${obj[i].address2}</td>
                                    <td>${obj[i].postal_code}</td>
                                    <td>${obj[i].unit_number}</td>
                                    <td>${obj[i].customer_name}</td>
                                    <td>${obj[i].customer_contact}</td>
                                    <td>${obj[i].arranged_date}</td>`;        
            }                  
    }
    displayMultipleOrder += `</table>
                      </div>`;

  // console.log(document.getElementById('displayDashboard').innerHTML);
  document.getElementById('displayMultipleOrder').innerHTML = displayMultipleOrder;   
  
}   

function ordersDoneDashboard(account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getOrdersDone(obj);
        }
    }

    request.open("GET", "./assets/classes/getInventory.php?account_id=" + atob(account_id), true);
    request.send();
}

function getOrdersDone(obj) {
    let dict = {};
    let dict2 = {};

    var getOrdersDoneDisplay = `<div style="overflow-x:auto;">
                                  <table id="getOrdersDoneDisplay" class="table table-striped-responsive">
                                  <tr class="header">
                                    <th onclick="sortTable(0)" style="cursor:pointer; width:25%;">Year-Month</th>
                                    <th style="width:50%;">Product Name</th>
                                    <th>Number of Orders Fulfilled</th>
                                </tr>`; 

    // COUNTER
    for (var i=0; i < obj.length; i++){
        // Checking if value exist or not
        var yearMonth = obj[i].sent_date;
        if (yearMonth != null){
            yearMonth = yearMonth.slice(0,7);
            if(yearMonth + ',' + obj[i].product_name + ' (' + obj[i].product_size + ')' in dict){
                dict[yearMonth + ',' + obj[i].product_name + ' (' + obj[i].product_size + ')'] += 1
            } else{
                dict[yearMonth + ',' + obj[i].product_name + ' (' + obj[i].product_size + ')'] = 1
            }
        }
    }

    // SORTING THE DICTIONARY INTO DESCENDING ORDER
    var keys = Object.keys(dict); // or loop over the object to get the array
    // keys will be in any order
    keys.sort().reverse(); // maybe use custom sort, to change direction use .reverse()
    // keys now will be in wanted order

    for (var i=0; i<keys.length; i++) { // now lets iterate in sort order
        var key = keys[i];
        var value = dict[key];
        /* do something with key & value here */
        dict2[key] = value;
    }
    // END OF SORTING THE DICTIONARY INTO DESCENDING ORDER

    // console.log(dict2);
    for (var key in dict2){
        // console.log(dict[key]);
        var newYearMonth = key.slice(0,7);
        var newProductName = key.slice(8);
        
        getOrdersDoneDisplay += `<tr>
                                <td>${newYearMonth}</td>
                                <td>${newProductName}</td>
                                <td>${dict2[key]}</td>
                            </tr>`;
    }        

    getOrdersDoneDisplay += `</table>
                        </div>`;

    document.getElementById('displayOrdersDoneTable').innerHTML = getOrdersDoneDisplay;   
}