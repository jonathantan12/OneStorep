function arrangeDelivery(account_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            arrangeDeliveryForm(obj);
        }
    }

    request.open("GET", "./assets/classes/getInventory.php?account_id=" + account_id, true);
    request.send();
}

function arrangeDeliveryForm(obj) {
    var new_obj = [];
    for (var i=0; i < obj.length; i++){  
      if (obj[i].status == 'stored') {
        new_obj.push(obj[i]);
      }
    }

    var arrangeDeliveryFormDisplay = `
                <!-- Arranging Delivery Form -->
                <br>
                  <form action="assets/classes/insertMultipleOrder.php" method="post">
                      <input type="hidden" id="floatingAccountId" name="floatingAccountId">`;
                      
    
    //PRODUCT 1
    arrangeDeliveryFormDisplay += `
                      <div class="form-wrapper">
                      <div class="form-inner">
                        <div class="row g-3">
                        <h4 style="margin-bottom: 0px">Product 1:</h4>
                          <div class="col-md-6">
                            <div class="selectingProduct">
                              <select class="form-select" name="product_name1" required>
                                <option value="" selected>Select Product</option>`;

    var temp_list = [];
    for (var i=0; i < new_obj.length; i++){  
      var temp_string = new_obj[i].product_name + ' (' + new_obj[i].product_size + ')';
      // KEEPING THE UNIQUE VALUES ONLY
      if (temp_list.includes(temp_string) == false) {
        temp_list.push(temp_string);
      }    
    }

    for (var j=0; j < temp_list.length; j++) {
      arrangeDeliveryFormDisplay += 
                            `<option value="${temp_list[j]}">${temp_list[j]}</option>`;
    }             
    // QUANTITY
    arrangeDeliveryFormDisplay += `</select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="selectingQuantity">
                            <select class="form-select" name="product_quantity1" required>
                              <option value="" selected>Quantity</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">12</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                            </select>
                          </div>
                      </div>               
                    </div><br> 
                  </div>   
                </div>    
                <button type="button" class="btn btn-dark" id="add-more-forms" onclick="duplicateForm()">+ Add Product</button>
                <button type="button" class="btn btn-dark" id="remove-forms" onclick="remove()">- Remove Product</button>
                      `;

    arrangeDeliveryFormDisplay += ` 
                      <div><br><br><h4>Customer Address Details</h4></div>
                      <div class="row g-3">
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingAddress1" name="floatingAddress1" placeholder="Address Line 1" required>
                          <label for="floatingAddress1">Address Line 1</label>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingAddress2" name="floatingAddress2" placeholder="Address Line 2">
                          <label for="floatingAddress2">Address Line 2</label>
                        </div>
                      </div> 
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingPostal" name="floatingPostal" placeholder="Postal Code" required>
                          <label for="floatingPostal">Postal Code</label>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingUnit" name="floatingUnit" placeholder="Unit Number" required>
                          <label for="floatingUnit">Unit Number</label>
                        </div>
                      </div>      
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingCustomerName" name="floatingCustomerName" placeholder="Customer's Name" required>
                          <label for="floatingCustomerName">Customer's Name</label>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingCustomerContact" name="floatingCustomerContact" placeholder="Customer's Contact Number" required>
                          <label for="floatingCustomerContact">Customer's Contact Number</label>
                        </div>
                      </div>           
                      
                      <div class="text-end">
                        <button type="submit" class="btn btn-dark" onclick="return confirm('Please ensure that all the details being submitted is accurate. Otherwise, the details submitted can only be edited by contacting our customer support. Thank you! -OneStorep')">Submit</button>
                      </div>    
                      </div">   
                  </form>
               <!-- Arranging Delivery Form -->`;
                                    
    document.getElementById('arrangeDeliveryForm').innerHTML = arrangeDeliveryFormDisplay;  
    document.getElementById('floatingAccountId').value = obj[0].account_id;
    // console.log(document.getElementById('product_name1').value);

    // document.getElementById('floatingBrand').value = obj[0].product_brand;
    // document.getElementById('floatingCategory').value = obj[0].product_type;
    // document.getElementById('floatingColour').value = obj[0].product_colour;
    // document.getElementById('floatingSize').value = obj[0].product_size;
    // document.getElementById('floatingWeight').value = obj[0].product_weight;
    // document.getElementById('floatingDimension').value = obj[0].product_dimension;

}

// CREATING MAXIMUM FIVE ITEMS AND RE-CREATE FORM
var count = 1;

function duplicateForm() {
  // var div = document.getElementById('form-wrapper'); 
  var div = document.getElementsByClassName('form-wrapper')[0]; 
  var firstForm = document.getElementsByClassName('form-inner')[0]; // Clone this
  // console.log(firstForm);

  let formClone = firstForm.cloneNode(true);
  
  count += 1;
  console.log(count);
  if (count<=10){
    document.getElementById("add-more-forms").disabled = false;
    formClone.getElementsByTagName("h4")[0].innerHTML = "Product " + count + ":";
    formClone.getElementsByClassName("selectingProduct")[0].getElementsByClassName("form-select")[0].name = 'product_name' + count;
    formClone.getElementsByClassName("selectingQuantity")[0].getElementsByClassName("form-select")[0].name = 'product_quantity' + count;

    // formClone.getElementById("selectingProduct").innerHTML = "Product " + count + ":";
    div.appendChild(formClone);
  }
  else {
    document.getElementById("add-more-forms").disabled = true;
  }
}

function remove() {
  var formInnerLength = document.getElementsByClassName('form-inner').length;
  var element = document.getElementsByClassName('form-inner')[formInnerLength-1];
  element.remove();
  count -= 1;
}