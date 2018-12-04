function addQtt(){
    let quantity = document.getElementById('quantity-id');
    //console.log(quantity.value);
    let total = Number(quantity.value);
    total += 1;
    quantity.value = total;
}

function addQuantity(id){
    post('http://localhost:8080/php-web/cart/update', {product_id : id, quantity : 1});
    console.log('added');
}

function addtoCart(id){
    post('http://localhost:8080/php-web/cart/add', {product_id : id, quantity: 1});
}

function decreaseQtt(){
    let quantity = document.getElementById('quantity-id');
    //console.log(quantity.value);
    if(quantity.value > 1)
        quantity.value -= 1;
}

function decreaseQuantity(id){
    console.log('wat');
    post('http://localhost:8080/php-web/cart/update', {product_id : id, quantity : -1});
    console.log('updated');
}

// function addToCart(){
//     var xmlhttp = new XMLHttpRequest();
//     Console.log(document.URL);
//     xmlhttp.onreadystatechange = function(){
//         Console.log('ay');
//     }
//     xmlhttp.open('POST', '/Cart/Add', true);
//     xmlhttp.send();
// }

function removeItem(id){
    console.log(id);
    post('http://localhost:8080/php-web/cart/remove', {product_id : id});
    console.log('sent request');
}

/**
 * ref:https://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit
 * sends a request to the specified url from a form. this will change the window location.
 * @param {string} path the path to send the post request to
 * @param {object} params the paramiters to add to the url
 * @param {string} [method=post] the method to use on the form
 */

function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  
  $(function () {
    $('[data-toggle="popover"]').popover()
  })