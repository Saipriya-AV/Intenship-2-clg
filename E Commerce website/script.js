const cartNavItem = $('#cart-nav-item'); // The navigation item to trigger the hover effect
const cartPopover = $('#cart-popover');
const cart = new Map(); // Map to store cart items and their quantities
let isHovered = false; // Flag to track hover state


const products = [
    {
        id: 1,
        name: 'Snake Plant',
        description: 'An easy-to-care-for plant with tall, stiff leaves. Ideal for beginners.',
        price: 799,
        imageUrl: 'assets/img/snake-plant.jpg',
    },
    {
        id: 2,
        name: 'Spider Plant',
        description: 'Features long, arching leaves and is excellent at removing toxins from the air.',
        price: 699,
        imageUrl: 'assets/img/spider-plant.jpg',
    },
    {
        id: 3,
        name: 'Aloe Vera Plant',
        description: 'A succulent plant with soothing gel-filled leaves, great for skincare purposes.',
        price: 699,
        imageUrl: 'assets/img/aloe-vera.jpg',
    },
    {
        id: 4,
        name: 'Pothos Plant',
        description: 'A trailing plant with heart-shaped leaves, perfect for hanging baskets.',
        price: 799,
        imageUrl: 'assets/img/pothos.jpg',
    },
    {
        id: 5,
        name: 'Lavender Plant',
        description: 'A fragrant herb with purple flowers, commonly used for relaxation and aromatherapy.',
        price: 499,
        imageUrl: 'assets/img/lavender.jpg',
    },
    {
        id: 6,
        name: 'Peace Lily',
        description: 'Known for its air-purifying qualities and elegant white blooms.',
        price: 699,
        imageUrl: 'assets/img/peace-lily.jpg',
    },
    {
        id: 7,
        name: 'ZZ Plant',
        description: 'A low-maintenance, drought-tolerant plant with glossy green leaves.',
        price: 799,
        imageUrl: 'assets/img/zz-plant.jpeg',
    },
    {
        id: 8,
        name: 'Jade Plant',
        description: 'A popular succulent with small, round leaves and symbolic of good luck.',
        price: 699,
        imageUrl: 'assets/img/jade-plant.jpg',
    },
    {
        id: 9,
        name: 'Rubber Plant',
        description: 'A stylish, rubbery-leaved plant that is easy to grow and maintain.',
        price: 799,
        imageUrl: 'assets/img/rubber-plant.jpg',
    },
    {
        id: 10,
        name: 'Fiddle Leaf Fig',
        description: 'Known for its large, violin-shaped leaves and striking appearance.',
        price: 799,
        imageUrl: 'assets/img/fiddle-leaf-fig.jpg',
    },
    {
        id: 11,
        name: 'Succulent Mix',
        description: 'A collection of various charming succulent species in one pot.',
        price: 599,
        imageUrl: 'assets/img/succulent-mix.jpg',
    },
    {
        id: 12,
        name: 'Bamboo Palm',
        description: 'A lush, green palm plant that thrives indoors and adds a tropical touch.',
        price: 699,
        imageUrl: 'assets/img/bamboo-plant.jpg',
    },
 
];


const featured=[
    {
        id: 1,
        name: 'Snake Plant',
        description: 'An easy-to-care-for plant with tall, stiff leaves. Ideal for beginners.',
        price: 799,
        imageUrl: 'assets/img/snake-plant.jpg',
    },
    {
        id: 2,
        name: 'Spider Plant',
        description: 'Features long, arching leaves and is excellent at removing toxins from the air.',
        price: 699,
        imageUrl: 'assets/img/spider-plant.jpg',
    },
    {
        id: 3,
        name: 'Aloe Vera Plant',
        description: 'A succulent plant with soothing gel-filled leaves, great for skincare purposes.',
        price: 699,
        imageUrl: 'assets/img/aloe-vera.jpg',
    },
    {
        id: 4,
        name: 'Pothos Plant',
        description: 'A trailing plant with heart-shaped leaves, perfect for hanging baskets.',
        price: 799,
        imageUrl: 'assets/img/pothos.jpg',
    },
    {
        id: 5,
        name: 'Lavender Plant',
        description: 'A fragrant herb with purple flowers, commonly used for relaxation and aromatherapy.',
        price: 499,
        imageUrl: 'assets/img/lavender.jpg',
    },
    {
        id: 6,
        name: 'Peace Lily',
        description: 'Known for its air-purifying qualities and elegant white blooms.',
        price: 699,
        imageUrl: 'assets/img/peace-lily.jpg',
    },

]
// Function to update cart count

function updateCartCount() {
    const totalQuantity = [...cart.values()].reduce((total, quantity) => total + quantity, 0);
    $('#cart-count').text(totalQuantity);
}

// Function to calculate the total price of items in the cart
function calculateTotalPrice() {
    let totalPrice = 0;
    for (const [productName, quantity] of cart.entries()) {
        const product = products.find((p) => p.name === productName);
        if (product) {
            totalPrice += product.price * quantity;
        }
    }
    return totalPrice.toFixed(2);
}

// Function to create and display the cart popover
function displayCartPopover() {
    // Check if the cart is not empty and if the hover flag is set
    if (cart.size > 0 && isHovered) {
        // Clear previous items
        cartPopover.html('');

        for (const [productName, quantity] of cart.entries()) {
            const product = products.find((p) => p.name === productName);
            if (product) {
                const cartItem = $('<div class="cart-item"></div>');
                cartItem.html(`
                    <p><b>Name:</b> ${product.name}</p>
                    <p><b>Quantity:</b> ${quantity}</p>
                    <p><b>Price:</b> ₹ ${(product.price * quantity).toFixed(2)}</p>
                `);
                const hr = $('<hr>');
                cartPopover.append(cartItem, hr);
            }
        }

        // Add total price
        const totalItem = $('<div class="cart-item total-item"></div>');
        totalItem.html(`
            <p><b>Total: ₹ ${calculateTotalPrice()}</b></p>
        `);
        cartPopover.append(totalItem);

        // Calculate position and display the cart popover below the cart icon
        const cartNavOffset = cartNavItem.offset();
        cartPopover.css({
            top: cartNavOffset.top + cartNavItem.outerHeight(),
            left: cartNavOffset.left,
        });

        // Display the cart popover
        cartPopover.css('display', 'block');
    } else {
        // Hide the cart popover
        cartPopover.css('display', 'none');
    }
}

// Event listeners for hover-based cart display
cartNavItem.hover(
    () => {
        isHovered = true; // Set hover flag when entering
        displayCartPopover();
    },
    () => {
        isHovered = false; // Clear hover flag when leaving
        displayCartPopover();
    }
);

// Load all product details into product cards
$(document).ready(() => {
    const productList = $('#product-list');

    products.forEach((product) => {
        const productCard = $('<div class="col-md-4"></div>');

        productCard.html(`
            <div class="product-card">
                <img src="${product.imageUrl}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
                <span class="price">₹ ${product.price.toFixed(2)}</span>
                <br>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        `);

        productList.append(productCard);

        // Add event listener to each "Add to Cart" button for hover-based display
        productCard.hover(() => {
            // Mouse enter (hover) event
            const addToCartButton = productCard.find('.add-to-cart');
            addToCartButton.off('click').on('click', () => {
                const productName = product.name;
                if (cart.has(productName)) {
                    cart.set(productName, cart.get(productName) + 1); // Increment quantity
                } else {
                    cart.set(productName, 1); // Set quantity to 1 for new items
                }
                updateCartCount();
                saveCartToLocalStorage();
                saveCartToSessionStorage(); 
            });
        }, () => {
            // Mouse leave event (empty callback)
        });
    });
});


// Load featured-product details into product cards
$(document).ready(() => {
    const productList = $('#featured');

    featured.forEach((product) => {
        const productCard = $('<div class="col-md-4"></div>');

        productCard.html(`
            <div class="product-card">
                <img src="${product.imageUrl}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
                <span class="price">₹ ${product.price.toFixed(2)}</span>
                <br>
                <button class="add-to-cart">Add to Cart</button>
            </div>
        `);

        productList.append(productCard);

        // Add event listener to each "Add to Cart" button for hover-based display
        productCard.hover(() => {
            // Mouse enter (hover) event
            const addToCartButton = productCard.find('.add-to-cart');
            addToCartButton.off('click').on('click', () => {
                const productName = product.name;
                if (cart.has(productName)) {
                    cart.set(productName, cart.get(productName) + 1); // Increment quantity
                } else {
                    cart.set(productName, 1); // Set quantity to 1 for new items
                }
                updateCartCount();
                saveCartToLocalStorage();
                saveCartToSessionStorage(); 
            });
        }, () => {
            // Mouse leave event (empty callback)
        });
    });
});



// Function to save cart data to localStorage
function saveCartToLocalStorage() {
    const cartData = Array.from(cart.entries());
    localStorage.setItem('cartData', JSON.stringify(cartData));
}



// Load cart data from localStorage and sessionStorage and display it on page load
$(document).ready(() => {
    clearCartDataForNewSession(); 
    loadCartFromLocalStorage();
    loadCartFromSessionStorage();
    displayCartOnCartPage();
});
