document.addEventListener("DOMContentLoaded", function(){
    calculateTotalPrice()
});


function calculateTotalPrice() {
    let totalPrice = 0;
    const cartItems = document.querySelectorAll('.cart-item');
    cartItems.forEach((item) => {
        const price = parseInt(item.querySelector('.price h3').textContent.replace('₽', ''));
        const quantity = parseInt(item.querySelector('.qty-input').value);
        totalPrice += price * quantity;
    });
    document.getElementById('total_price').textContent = `Итог: ${totalPrice}₽`;
    document.getElementById('total').value = totalPrice;
}

const qtyInputs = document.querySelectorAll('.qty-input');
qtyInputs.forEach((input) => {
    input.addEventListener('input', calculateTotalPrice);


const qtyInputs = document.querySelectorAll('.qty-input');
const hiddenQtys = document.querySelectorAll('[id^="qty-"]');
qtyInputs.forEach((input, index) => {
        input.addEventListener('input', () => {
            hiddenQtys[index].value = input.value;
        });
    });
});
