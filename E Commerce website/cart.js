
function loadCartFromStorage() {
    const cartDataLocalStorage = JSON.parse(localStorage.getItem('cartData'));

    // Load data from localStorage
    if (cartDataLocalStorage && Array.isArray(cartDataLocalStorage)) {
        cart.clear();
        cartDataLocalStorage.forEach(([productName, quantity]) => {
            cart.set(productName, quantity);
        });
    }
}


// Function to display cart items on the cart.html page
function displayCartOnCartPage() {
    const cartPageContainer = $('#cart-page-container');
    cartPageContainer.html('');

    for (const [productName, quantity] of cart.entries()) {
        const product = products.find((p) => p.name === productName);
        if (product) {
            const cartItem = $('<div class="cart-item"></div>');
            cartItem.html(`
                <div class="row">
                    <div class="col-md-3">
                        <!-- Image column -->
                        <img src="${product.imageUrl}" alt="${product.name}" class="small-image">
                    </div>
                    <div class="col-md-9">
                        <!-- Description and buttons column -->
                        <div class="row">
                            <div class="col-md-8">
                                <p><b>Name:</b> ${product.name}</p>
                                <p><b>Quantity:</b> ${quantity}</p>
                                <p><b>Price:</b> ₹ ${(product.price * quantity).toFixed(2)}</p>
                            </div>
                            <div class="col-md-4">
                                <div class="btn-group">
                                    <button class="btn  btn-black text-white increase-quantity" data-product="${product.name}">Increase</button>
                                    <button class="btn  btn-black text-white decrease-quantity" data-product="${product.name}">Decrease</button>
                                    <button class="btn  btn-danger remove-from-cart" data-product="${product.name}">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);
            const hr = $('<hr class="my-4">');
            cartPageContainer.append(cartItem, hr);
        }
    }

    // Add a section for applying a coupon and displaying the total price
    const couponAndTotalSection = $('<div class="coupon-total-section mt-4"></div>');
    couponAndTotalSection.html(`
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Enter Coupon Code">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary apply-coupon-btn">Apply</button>
            </div>
            <div class="col-md-6 text-right">
                <p class="total-price-text"><b>Total Price:</b> ₹ ${calculateTotalPrice()}</p>
                <br>
                <button class="btn btn-primary checkout-btn">Checkout</button>
            </div>
        </div>
    `);
    cartPageContainer.append(couponAndTotalSection);
}




// Event listener to remove an item from the cart
$(document).on('click', '.remove-from-cart', function () {
    const productName = $(this).data('product');
    removeFromCart(productName);
});

// Event listener to increase the quantity of an item in the cart
$(document).on('click', '.increase-quantity', function () {
    const productName = $(this).data('product');
    increaseQuantity(productName);
});

// Event listener to decrease the quantity of an item in the cart
$(document).on('click', '.decrease-quantity', function () {
    const productName = $(this).data('product');
    decreaseQuantity(productName);
});

// Function to remove an item from the cart
function removeFromCart(productName) {
    if (cart.has(productName)) {
        cart.delete(productName);
        saveCartToStorage(); 
        displayCartOnCartPage(); // Update the cart display
    }
}

// Function to increase the quantity of an item in the cart
function increaseQuantity(productName) {
    if (cart.has(productName)) {
        cart.set(productName, cart.get(productName) + 1);
        saveCartToStorage(); 
        displayCartOnCartPage(); // Update the cart display
    }
}

// Function to decrease the quantity of an item in the cart
function decreaseQuantity(productName) {
    if (cart.has(productName)) {
        const currentQuantity = cart.get(productName);
        if (currentQuantity > 1) {
            cart.set(productName, currentQuantity - 1);
        } else {
            cart.delete(productName);
        }
        saveCartToStorage();
        displayCartOnCartPage(); // Update the cart display
    }
}

// Function to save cart data to sessionStorage
function saveCartToStorage() {
    const cartData = Array.from(cart.entries());
    localStorage.setItem('cartData', JSON.stringify(cartData));
}

// Load cart data from localStorage and sessionStorage and display it on page load
$(document).ready(() => {
    
    loadCartFromStorage();
    displayCartOnCartPage();
    
});


