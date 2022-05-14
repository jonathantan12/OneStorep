function ordersFulfilledDashboard(account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getOrdersFulfilled(obj);
        }
    }

    request.open("GET", "./assets/classes/getMultipleOrder.php?account_id=" + account_id, true);
    request.send();
}

function getOrdersFulfilled(obj) {
    var displayOrdersFulfilled = `<br>
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
                    <th>Date Sent</th>
                  </tr>`;   


    for (var i=0; i < obj.length; i++){
        if (obj[i].order_status == "sent") {
            displayOrdersFulfilled += `<tr>
                                    <td>${obj[i].order_id}</td>
                                    <td>
                                        <table>
                                        <tr><td>${obj[i].product_quantity1}x ${obj[i].product_name1}</td></tr>`;
            
                                    if (obj[i].product_quantity2 == "") {
                                        displayOrdersFulfilled += '';
                                    }
                                    else {
                                        displayOrdersFulfilled += `<tr><td>${obj[i].product_quantity2}x ${obj[i].product_name2}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity3 == "") {
                                        displayOrdersFulfilled += '';
                                    }
                                    else {
                                        displayOrdersFulfilled += `<tr><td>${obj[i].product_quantity3}x ${obj[i].product_name3}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity4 == "") {
                                        displayOrdersFulfilled += '';
                                    }
                                    else {
                                        displayOrdersFulfilled += `<tr><td>${obj[i].product_quantity4}x ${obj[i].product_name4}</td></tr>`;
                                    }

                                    if (obj[i].product_quantity5 == "") {
                                        displayOrdersFulfilled += '';
                                    }
                                    else {
                                        displayOrdersFulfilled += `<tr><td>${obj[i].product_quantity5}x ${obj[i].product_name5}</td></tr>`;
                                    }
                                            
            displayOrdersFulfilled += `</table>
                                    </td>
                                    <td>${obj[i].address1}</td>
                                    <td>${obj[i].address2}</td>
                                    <td>${obj[i].postal_code}</td>
                                    <td>${obj[i].unit_number}</td>
                                    <td>${obj[i].customer_name}</td>
                                    <td>${obj[i].customer_contact}</td>
                                    <td>${obj[i].sent_date}</td>`;        
            }                  
    }
    displayOrdersFulfilled += `</table>
                      </div>`;

  // console.log(document.getElementById('displayDashboard').innerHTML);
  document.getElementById('displayOrdersFulfilled').innerHTML = displayOrdersFulfilled;   
  
}   

function ordersDoneDashboard(account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getOrdersDone(obj);
        }
    }

    request.open("GET", "./assets/classes/getInventory.php?account_id=" + account_id, true);
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

// Sorting Month Year Column
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("getOrdersDoneDisplay");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Each time a switch is done, increase this count by 1:
        switchcount ++;
      } else {
        /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
  