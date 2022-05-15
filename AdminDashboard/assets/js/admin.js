// var params = new URLSearchParams(location.search);
// var account_id = params.get('account_id');
// console.log(account_id);

function adminDashboard(account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            // getInventory(obj);
            // getInventoryCount(obj);
            retrieveAllUsers(obj);
        }
    }

    request.open("GET", "./assets/classes/getUser.php", true);
    request.send();
}

function retrieveAllUsers(obj) {
    var displayCompanies = `<input type="text" id="displayCompaniesInput" onkeyup="searchCompaniesDisplay()" placeholder="Search for Company Name">
                    <table id="displayCompaniesTable" class="table table-striped-responsive">
                    <tr class="header">
                      <th onclick="sortUserTable(0)" style="width:50%; cursor:pointer;";>Company Name</th>
                      <th>Email</th>
                      <th>Account ID</th>
                      <th>Contact Number</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>`;   

    for (var i=0; i < obj.length; i++){
      var account_id = btoa(obj[i]['account_id']);

      displayCompanies += `<tr>
                              <td>${obj[i]['company_name']}</td>
                              <td>${obj[i]['email']}</td>
                              <td>${obj[i]['account_id']}</td>
                              <td>${obj[i]['contact_number']}</td>
                              <td><a class="btn btn-info" href="companyInventory.php?account_id=${account_id}&company_name=${obj[i]['company_name']}" role="button">Inventory</a></td>
                              <td><a class="btn btn-primary" href="companyInventoryUpload.php?account_id=${account_id}&company_name=${obj[i]['company_name']}" role="button">Upload</a></td>
                              <td><a class="btn btn-secondary" href="companyInventorySent.php?account_id=${account_id}&company_name=${obj[i]['company_name']}" role="button">Edit</a></td>
                              <td><a class="btn btn-warning" href="toBeSent.php?account_id=${account_id}&company_name=${obj[i]['company_name']}" role="button">Orders</a></td>
                              <td><a class="btn btn-success" href="ordersFulfilled.php?account_id=${account_id}&company_name=${obj[i]['company_name']}" role="button">Fulfilled</a></td>
                          </tr>`;
    }         
    displayCompanies += `</table>`;

    document.getElementById('displayCompanies').innerHTML = displayCompanies;          
}

function sortUserTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("displayCompaniesTable");
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


