function toBeSent($account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request

    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getMultipleOrder(obj);
        }
    }
    
    request.open("GET", "./assets/classes/getMultipleOrder.php?account_id=" + atob($account_id), true);
    request.send();
}

function getMultipleOrder(obj) {
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
                    <th></th>
                  </tr>`;   


    for (var i=0; i < obj.length; i++){
        if (obj[i].order_status == "arranged") {
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
                                    <td>${obj[i].arranged_date}</td>
                                    <td>
                                        <form class="row g-3" action="assets/classes/fulfillMultipleOrder.php?order_id=${obj[i].order_id}" method="post">      
                                            <button type="submit" class="btn-sm btn-dark">Order Fulfilled</button>
                                        </form>
                                    </td>`;        
            }                  
    }
    displayMultipleOrder += `</table>
                      </div>`;

  // console.log(document.getElementById('displayDashboard').innerHTML);
  document.getElementById('displayMultipleOrder').innerHTML = displayMultipleOrder;   
  
}   

function toBeSentSingle($account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request

    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getSingleOrder(obj);
        }
    }
    
    request.open("GET", "./assets/classes/getInventory.php?account_id=" + atob($account_id), true);
    request.send();
}

// function getSingleOrder(obj){
//     console.log(obj);
// }

function getSingleOrder(obj) {
    // console.log(obj);
    var displaySingleOrder = `<br><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for product name">
                    <div class="scrollableOrdersToBeSent">
                    <table id="singleOrder" class="table table-striped-responsive">
                    <tr class="header">
                      <th></th>
                      <th></th>
                      <th>Name</th>
                      <th>Brand</th>
                      <th>Category</th>
                      <th>Colour</th>
                      <th>Size</th>
                      <th>Weight</th>
                      <th>Dimension</th>
                      <th>Stored Date</th>
                      <th>Arranged Date</th>
                      <th onclick="sortTable(11)" style="cursor:pointer;">Status</th>
                      <th></th>
                    </tr>`;   
  
    for (var i=0; i < obj.length; i++){
        // console.log(obj[i].status);
        var status_colour = '';
        var sent_date = obj[i].sent_date;
        var arranged_date = obj[i].arranged_date;
        // console.log(sent_date);
  
        // Change date for sent date
        if (obj[i].sent_date == null) {
            sent_date = '-';
        }
  
        if (obj[i].arranged_date == null) {
          arranged_date = '-';
        }
  
        // For status colour change
        if (obj[i].status == 'sent') {
            status_colour = 'warning';
        }
        else if (obj[i].status == 'arranged'){
            status_colour = 'success';
        }
        else {
            status_colour = 'info';
        }

        // DISPLAYING ROW WITH ONLY ARRANGED
        if (obj[i].status == 'arranged'){
            displaySingleOrder += `<tr>
                                    <td>
                                    </td>
                                    <td>${i+1}</td>
                                    <td>${obj[i].product_name}</td>
                                    <td>${obj[i].product_brand}</td>
                                    <td>${obj[i].product_type}</td>
                                    <td>${obj[i].product_colour}</td>
                                    <td>${obj[i].product_size}</td>
                                    <td>${obj[i].product_weight}</td>
                                    <td>${obj[i].product_dimension}</td>
                                    <td>${obj[i].stored_date}</td>
                                    <td>${arranged_date}</td>
                                    <td><span class="badge bg-${status_colour}" style="text-transform: uppercase;">${obj[i].status}</span></td>
                                    <td>
                                        <form class="row g-3" action="assets/classes/updateInventoryToFulfilled.php?product_id=${obj[i].product_id}" method="post">      
                                            <button type="submit" class="btn-sm btn-dark">Fulfill</button>
                                        </form>
                                    </td>
                                </tr>`;
        }
    }
    displaySingleOrder += `</table>
                        </div>`;
  
    // console.log(document.getElementById('displayDashboard').innerHTML);
    document.getElementById('displaySingleOrder').innerHTML = displaySingleOrder;   
    
}   

// ADDED THIS IN FOR SEARCH BAR IN THE DASHBOARD
function myFunction(){
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("displaySingleOrder");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }



