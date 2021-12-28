var params = new URLSearchParams(location.search);
var itemname = params.get('itemname');
// console.log(itemname);

function itemPage(itemname) {
    var request = new XMLHttpRequest(); // Prep to make an HTTP request
    
    request.onreadystatechange = function() {
        if( this.readyState == 4 && this.status == 200 ) {
            let obj = JSON.parse(this.responseText);
            getFromUrl(obj);
        }
    }

    request.open("GET", "./getSpecificProductDAO.php?itemname=" + itemname, true);
    request.send();
}

function getProducts(obj) {
    console.log(obj[0]);
    
    var product_name = obj[0]['product_name'];
    var price = obj[0]['price'];
    var product_desc = obj[0]['product_desc'];
    var image = obj[0]['image'];
    var product_id = obj[0]['product_id'];

    product_information = obj[0];
    product_information['inCart'] = 0;
    console.log(product_information);

    var itemDisplay = `
    <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src='./product_image/${image}' alt="..." /></div>
                    <div class="col-md-6">
                        <h3 class="display-5 fw-bolder">${product_name}</h3>
                        <div class="fs-5 mb-3 fw-bolder">
                            <p>$${price}</p>
                        </div>
                        <p class="lead">${product_desc}</p>
                        <p>Sizes Available:</p>
                        <select class="form-select mb-3" aria-label="select size" id="selected_size">
                        `;
                            

    for (var i=0; i < obj.length; i++){
        size = obj[i]['size'];
        itemDisplay += `<option value="${size}">${size}</option>`
    }
    
    // product_information = JSON.stringify(obj[0]);
    // console.log(product_information);

    itemDisplay +=`         </select>
                            <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit" onclick="addToCart(${'product_information'})">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    `;

    document.getElementsByClassName('displayItem')[0].innerHTML = itemDisplay;   
    
    // TO HELP CHANGE THE SELECTED SIZE
    var select = document.getElementById("selected_size");
    select.addEventListener('change', (event) => {
        product_information['size'] = select.value;
    });
}   

function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');

    if (productNumbers) {
        document.getElementsByClassName("badge")[0].innerText = productNumbers;
    }
}

function addToCart(product_information){
    // product_information['inCart'] = 1;
    console.log(product_information);

    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    console.log(productNumbers);
   
    if (productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.getElementsByClassName("badge")[0].innerText = productNumbers + 1;
    } else {
        localStorage.setItem('cartNumbers', 1);
        document.getElementsByClassName("badge")[0].innerText = 1;
    }

    setItems(product_information);
    totalCost(product_information);
    // location.replace("./cart.html");
}

function setItems(product_information) {
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if (cartItems != null) {

        // When clicking a different item
        if(cartItems[product_information.product_id] == undefined) {
            cartItems = {
                ...cartItems,
                [product_information.product_id] : product_information
            }
        } 
        cartItems[product_information.product_id].inCart += 1 ;
   
    } else {
        product_information['inCart'] = 1;
        cartItems = {
            [product_information.product_id]: product_information
        }
    }

    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(product_information) {
    let totalCost = localStorage.getItem('totalCost');
    
    if (totalCost != null) {
        totalCost = parseInt(totalCost);
        localStorage.setItem('totalCost', totalCost + parseInt(product_information.price));
    } else {
        localStorage.setItem('totalCost', product_information.price);
    }
}

function deleteItemInCart(product_information) {
    let totalCost = localStorage.getItem('totalCost');
    
    if (totalCost != null) {
        totalCost = parseInt(totalCost);
        if (totalCost > 0) {
            localStorage.setItem('totalCost', totalCost - parseInt(product_information.price));
        }
        else {
            localStorage.setItem('totalCost', 0);
        }
        
    } else {
        localStorage.setItem('totalCost', product_information.price);
    }
}