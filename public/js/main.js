function addQuantity(){
    let quantity = document.getElementById('quantity-id');
    //console.log(quantity.value);
    let total = Number(quantity.value);
    total += 1;
    quantity.value = total;
}

function decreaseQuantity(){
    let quantity = document.getElementById('quantity-id');
    //console.log(quantity.value);
    if(quantity.value > 1)
        quantity.value -= 1;
}