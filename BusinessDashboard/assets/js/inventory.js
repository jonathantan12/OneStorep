var params = new URLSearchParams(location.search);
var account_id = params.get('account_id');
// console.log(account_id);

function inventoryDashboard(account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getInventory(obj);
            getInventoryCount(obj);
        }
    }

    request.open("GET", "./assets/classes/getInventory.php?account_id=" + account_id, true);
    request.send();
}

function getInventory(obj) {
  var inventoryDisplay = `<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for product name">
                  <!-- <input type="text" id="filterStatus" onkeyup="filterStatus()" placeholder="Filter Status"> -->
                  <div class="scrollable">
                  <table id="inventoryDisplay" class="table table-striped-responsive">
                  <tr class="header">
                    <th></th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Colour</th>
                    <th>Size</th>
                    <th>Weight</th>
                    <th>Dimension</th>
                    <th onclick="sortTable(8)" style="cursor:pointer;">Stored Date</th>
                  </tr>`;   
  var counter = 0;
  for (var i=0; i < obj.length; i++){
      // var status_colour = '';
      // var sent_date = obj[i].sent_date;
      // var arranged_date = obj[i].arranged_date;

      // if (obj[i].arranged_date == null) {
      //   arranged_date = '-';
      // }
      // // Change date for sent date
      // if (obj[i].sent_date == null) {
      //   sent_date = '-';
      // }
      
      // // For status colour change
      // if (obj[i].status == 'sent') {
      //     status_colour = 'warning';
      // }
      // else if (obj[i].status == 'arranged'){
      //     status_colour = 'success';
      // }
      // else {
      //     status_colour = 'info';
      // }

      if (obj[i].status == 'stored'){
        counter += 1;
        inventoryDisplay += `<tr>
                              <td>${counter}</td>
                              <td>${obj[i].product_name}</td>
                              <td>${obj[i].product_brand}</td>
                              <td>${obj[i].product_type}</td>
                              <td>${obj[i].product_colour}</td>
                              <td>${obj[i].product_size}</td>
                              <td>${obj[i].product_weight}</td>
                              <td>${obj[i].product_dimension}</td>
                              <td>${obj[i].stored_date}</td>`;
      }
    
                              // <td><a class="btn-sm btn-block btn-dark" href="arrangeDelivery.php?product_id=${btoa(obj[i].product_id)}" role="button">Arrange Delivery</a></td></tr>`;

      // if (obj[i].status == 'stored') {
      //   inventoryDisplay += `<td><a class="btn-sm btn-block btn-dark" href="arrangeDelivery.php?product_id=${btoa(obj[i].product_id)}" role="button">Arrange Delivery</a></td></tr>`;

      // }
      // else if (obj[i].status == 'arranged'){
      //   inventoryDisplay += `<td><a class="btn-sm btn-block btn-dark" href="deliveryInfo.php?product_id=${btoa(obj[i].product_id)}" role="button">Delivery Info</a></td></tr>`;
      // }
      // else {
      //   inventoryDisplay += `<td><a class="btn-sm btn-block btn-dark" href="deliveryInfo.php?product_id=${btoa(obj[i].product_id)}" role="button">Delivery Info</a></td></tr>`;
      // }              
    }
  inventoryDisplay += `</table>
                      </div>`;

  // console.log(document.getElementById('displayDashboard').innerHTML);
  document.getElementById('displayDashboard').innerHTML = inventoryDisplay;   
  
}   

function getInventoryCount(obj) {
  let dict = {};
  // console.log(obj);
  for (var i=0; i < obj.length; i++){
      let product = obj[i].product_name + ' (' + obj[i].product_size+ ')';
      // Checking if value exist or not
      if (obj[i].arranged_date == null) {
        if(product in dict){
          dict[product] += 1
        } else{
          dict[product] = 1
        }
      }
  }

  // console.log(dict);

  var inventoryCountDisplay = `<input type="text" id="inventoryCountInput" onkeyup="searchFunctionConsolidatedInventory()" placeholder="Search for product name">
                  <table id="inventoryCountDisplay" class="table table-striped-responsive">
                  <tr class="header">
                    <th style="width:70%";>Product Name</th>
                    <th>Quantity</th>
                  </tr>`;   

  for (var key in dict){
      // console.log(dict[key]);
      // console.log(key);
      inventoryCountDisplay += `<tr>
                              <td>${key}</td>
                              <td>${dict[key]}</td>
                          </tr>`;
  }         
  inventoryCountDisplay += `</table>`;

  document.getElementById('displayInventoryCount').innerHTML = inventoryCountDisplay;          
}

function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("inventoryDisplay");
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

