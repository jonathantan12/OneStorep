var params = new URLSearchParams(location.search);
var account_id = params.get('account_id');
// console.log(account_id);

function inventoryDashboard(account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getInventory(obj);
        }
    }

    request.open("GET", "./assets/classes/getInventory.php?account_id=" + account_id, true);
    request.send();
}

function getInventory(obj) {
    var inventoryDisplay = `<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for product name">
                    <table id="myTable" class="table table-striped">
                    <tr class="header">
                      <th style="width:10%;">SKU</th>
                      <th>Name</th>
                      <th>Brand</th>
                      <th>Category</th>
                      <th>Colour</th>
                      <th>Size</th>
                      <th>Weight</th>
                      <th>Dimension</th>
                      <th>Stored Date</th>
                      <th>Sent Date</th>
                      <th>Delivered Date</th>
                      <th>Status</th>
                    </tr>`;   

    for (var i=0; i < obj.length; i++){
        console.log(obj[i].status);
        var status_colour = '';
        var sent_date = obj[i].sent_date;
        var delivered_date = obj[i].delivered_date;

        // Change date for sent date
        if (obj[i].sent_date == '0000-00-00 00:00:00') {
            sent_date = '-';
        }

        if (obj[i].delivered_date == '0000-00-00 00:00:00') {
            delivered_date = '-';
        }
        

        // For status colour change
        if (obj[i].status == 'sent') {
            status_colour = 'warning';
        }
        else if (obj[i].status == 'delivered'){
            status_colour = 'success';
        }
        else {
            status_colour = 'info';
        }

        inventoryDisplay += `<tr>
                                <td>${obj[i].sku}</td>
                                <td>${obj[i].product_name}</td>
                                <td>${obj[i].product_brand}</td>
                                <td>${obj[i].product_type}</td>
                                <td>${obj[i].product_colour}</td>
                                <td>${obj[i].product_size}</td>
                                <td>${obj[i].product_weight}</td>
                                <td>${obj[i].product_dimension}</td>
                                <td>${obj[i].stored_date}</td>
                                <td>${sent_date}</td>
                                <td>${delivered_date}</td>
                                <td><span class="badge bg-${status_colour}">${obj[i].status}</span></td>
                            </tr>`;
    }
    inventoryDisplay += `</table>`;

    // console.log(document.getElementById('displayDashboard').innerHTML);
    document.getElementById('displayDashboard').innerHTML = inventoryDisplay;   
    
}   



