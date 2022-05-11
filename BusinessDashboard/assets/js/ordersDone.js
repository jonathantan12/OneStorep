function ordersDoneDashboard(account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getOrdersDone(obj);
            getIndOrdersDone(obj);
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
                                    <th onclick="sortTable(0)" style="cursor:pointer; width:60%;">Year-Month</th>
                                    <th>Number of Orders Fulfilled</th>
                                </tr>`; 

    // COUNTER
    for (var i=0; i < obj.length; i++){
        // Checking if value exist or not
        var yearMonth = obj[i].sent_date;
        if (yearMonth != null){
            yearMonth = yearMonth.slice(0,7);
            if(yearMonth in dict){
                dict[yearMonth] += 1
            } else{
                dict[yearMonth] = 1
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
        // console.log(key);
        getOrdersDoneDisplay += `<tr>
                                <td>${key}</td>
                                <td>${dict[key]}</td>
                            </tr>`;
    }        

    getOrdersDoneDisplay += `</table>
                        </div>`;

    document.getElementById('displayOrdersDoneTable').innerHTML = getOrdersDoneDisplay;   
}

function getIndOrdersDone(obj) {
  let dict = {};
  let dict2 = {};

  var getIndOrdersDoneDisplay = `<div style="overflow-x:auto;">
                                  <table id="getIndOrdersDoneDisplay" class="table table-striped-responsive">
                                  <tr class="header">
                                    <th onclick="sortIndOrdersDoneTable(0)" style="cursor:pointer; width:30%;">Year-Month</th>
                                    <th>Orders Fulfilled</th>
                                  </tr>`; 
  
  // ID, name, delivered date
  // COUNTER
  for (var i=0; i < obj.length; i++){
    // Checking if value exist or not
    var yearMonth = obj[i].sent_date;
    if (yearMonth != null){
        yearMonth = yearMonth.slice(0,7);
        if(yearMonth in dict){
          dict[yearMonth].push([obj[i].product_id, obj[i].product_name, obj[i].sent_date])
        } else{
          let temp = [obj[i].product_id, obj[i].product_name, obj[i].sent_date]
          dict[yearMonth] = [temp]
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
  for (var key in dict2){
    getIndOrdersDoneDisplay += `<tr>
                            <td>${key}</td>
                            <td><table class="table table-striped-responsive"><tr>
                                                                            <th>Product ID</th>
                                                                            <th>Product Name</th>
                                                                            <th>Sent Date</th>
                                                                            <th></th>
                                                                          </tr>`;
                            for (let i = 0; i < dict2[key].length; i++) {
                              getIndOrdersDoneDisplay += `
                                                          <tr>`;
                                                          for (let j = 0; j < dict2[key][i].length; j++){
                                                            getIndOrdersDoneDisplay += `<td>${dict2[key][i][j]}</td>
                                                            `;
                                                          }
                              getIndOrdersDoneDisplay += `<td><a class="btn-sm btn-block btn-dark" href="deliveryInfo.php?product_id=${btoa(dict2[key][i][0])}" role="button">Delivery Info</a></td>`;             
                              getIndOrdersDoneDisplay +=`</tr>`;
                            }
                          

    getIndOrdersDoneDisplay += `</table></td>
                              </tr>`;
}        

  getIndOrdersDoneDisplay += `</table>
                      </div>`;

  document.getElementById('displayIndOrdersDoneTable').innerHTML = getIndOrdersDoneDisplay;   
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

// Sorting IndOrdersDoneTable Column
function sortIndOrdersDoneTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("getIndOrdersDoneDisplay");
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

