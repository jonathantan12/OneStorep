var params = new URLSearchParams(location.search);
var account_id = params.get('account_id');
console.log(account_id);

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
    console.log('Currently reading');
    console.log(obj);
   
    var inventoryDisplay = `<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for product name">
                    <table id="myTable">
                    <tr class="header">
                      <th style="width:10%;">SKU</th>
                      <th>Name</th>
                      <th>Country</th>
                    </tr>`;   

    for (var i=0; i < obj.length; i++){
        console.log(obj);
        inventoryDisplay += `<tr>
                                <td>Alfreds Futterkiste</td>
                                <td>Germany</td>
                                <td>Test</td>
                            </tr>`;
    }
    inventoryDisplay += `</table>`;

    // console.log(document.getElementById('displayDashboard').innerHTML);
    document.getElementById('displayDashboard').innerHTML = inventoryDisplay;   
    
}   




