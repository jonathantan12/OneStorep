function arrangeDelivery(product_id) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            arrangeDeliveryForm(obj);
        }
    }

    request.open("GET", "./assets/classes/getInventory.php?product_id=" + product_id, true);
    request.send();
}

function arrangeDeliveryForm(obj) {
    var arrangeDeliveryFormDisplay = `
                <!-- Arranging Delivery Form -->
                <br>
                  <form class="row g-3" action="assets/classes/arrangeOrder.php" method="post">
                      <input type="hidden" id="floatingAccountId" name="floatingAccountId">
                      <div class="col-md-2">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingProductId" name="floatingProductId" readonly>
                          <label for="floatingProductId">Product ID</label>
                        </div>
                      </div>
                      <div class="col-md-10"></div>
                      
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingName" name="floatingName" placeholder="Product Name" readonly>
                          <label for="floatingName">Product Name</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingBrand" name="floatingBrand" placeholder="Product Brand" readonly>
                          <label for="floatingBrand">Product Brand</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingCategory" name="floatingCategory" placeholder="Product Category" readonly>
                          <label for="floatingCategory">Product Category</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingColour" name="floatingColour" placeholder="Colour" readonly>
                          <label for="floatingColour">Colour</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingSize" name="floatingSize" placeholder="Size" readonly>
                          <label for="floatingSize">Size</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingWeight" name="floatingWeight" placeholder="Product Weight" readonly>
                          <label for="floatingWeight">Product Weight</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingDimension" name="floatingDimension" placeholder="Product Dimension" readonly>
                          <label for="floatingDimension">Product Dimension</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingAddress1" name="floatingAddress1" placeholder="Address Line 1">
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
                          <input type="text" class="form-control" id="floatingPostal" name="floatingPostal" placeholder="Postal Code">
                          <label for="floatingPostal">Postal Code</label>
                        </div>
                      </div>  
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="floatingUnit" name="floatingUnit" placeholder="Unit Number">
                          <label for="floatingUnit">Unit Number</label>
                        </div>
                      </div>           
                      
                      <div class="text-end">
                        <button type="submit" class="btn btn-dark">Submit</button>
                        <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                      </div>  
                     
                  </form><!-- Arranging Delivery Form -->
                                    `;

    document.getElementById('arrangeDeliveryForm').innerHTML = arrangeDeliveryFormDisplay;  
    
    document.getElementById('floatingAccountId').value = 11;
    document.getElementById('floatingProductId').value = 11;
    document.getElementById('floatingName').value = 11;
    document.getElementById('floatingBrand').value = 11;
    document.getElementById('floatingCategory').value = 11;
    document.getElementById('floatingColour').value = 11;
    document.getElementById('floatingSize').value = 11;
    document.getElementById('floatingWeight').value = 11;
    document.getElementById('floatingDimension').value = 11;

}
