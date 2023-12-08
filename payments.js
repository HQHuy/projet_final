const products = [
    { id: 1, name: 'South America', price: 10, quantity: 1 },
    { id: 2, name: 'Nashville', price: 20, quantity: 1 },
    { id: 3, name: 'Tokyo', price: 30, quantity: 1 }
];

function calculateTotalPrice() {
    return products.reduce((total, product) => total + product.price * product.quantity, 0);
}                                                          

function displayCart() {
    const cartContainer = document.querySelector('.cart');
    cartContainer.innerHTML = '';

    products.forEach(product => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        const imagePath = getImagePath(product.id);
        cartItem.innerHTML = `
            <img src="${imagePath}" alt="${product.name}" width="50">
            <span>${product.name}</span>
            <input type="number" value="${product.quantity}" min="1" onchange="updateQuantity(${product.id}, this.value)">
            <span>$${product.price * product.quantity}</span>
            <button onclick="removeFromCart(${product.id})">Remove</button>
        `;
        cartContainer.appendChild(cartItem);
    });

    const totalPriceElement = document.getElementById('total-price');
    totalPriceElement.textContent = `$${calculateTotalPrice()}`;
}

function getImagePath(productId) {
    switch (productId) {
        case 1:
            return 'pic/1-taylor-swift-the-eras-tour-poster-a-stunning-tribute-to-her-musical-journey-bui-chinh.jpg';
        case 2:
            return 'pic/il_fullxfull.4917278347_tbkk.avif';
        case 3:
            return 'pic/700x1000_18_.jpg';
        default:
            return 'pic/default.jpg';
    }
}
function updateQuantity(productId, newQuantity) {
    const product = products.find(p => p.id === productId);
    if (product) {
        product.quantity = parseInt(newQuantity, 10);
        displayCart();
    }
}

function removeFromCart(productId) {
    const index = products.findIndex(p => p.id === productId);
    if (index !== -1) {
        products.splice(index, 1);
        displayCart();
    }
}

function processPayment() {
    const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked');
    const agreeCheckbox = document.getElementById('agree');

    if (paymentMethod && agreeCheckbox.checked) {
        if (paymentMethod.value === 'momo') {
            showMomoPaymentModal();
        } else if (paymentMethod.value === 'visa') {
            showVisaPaymentModal();
        } else if (paymentMethod.value === 'paypal') {
            showPayPalPaymentModal();
        } else {
            showPaymentModal(paymentMethod.value);
        }
    } else {
        alert('Please select a payment method and agree to the terms.');
    }
}

function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "block";
}

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = "none";
}

function showSuccessMessage() {
    alert("Payment has been successful, thank you");
}

function showPaymentModal(paymentMethod) {
    const modalId = `${paymentMethod.toLowerCase()}-modal`;
    openModal(modalId);
}

function showMomoPaymentModal() {
    showPaymentModal('Momo');
}

function showVisaPaymentModal() {
    showPaymentModal('Visa');
}

function showPayPalPaymentModal() {
    showPaymentModal('PayPal');
}
 
window.onload = function () {
    displayCart();
};
