// Sample cart items
const cartItems = [
    {
        id: 1,
        name: 'Product 1',
        price: 10,
        image: 'product1.jpg'
    },
    {
        id: 2,
        name: 'Product 2',
        price: 15,
        image: 'product2.jpg'
    },
    {
        id: 3,
        name: 'Product 3',
        price: 20,
        image: 'product3.jpg'
    }
];

// Get the cart items container
const cartContainer = document.getElementById('cart-items');

// Iterate through cart items and create HTML elements
cartItems.forEach(item => {
    const cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');

    const image = document.createElement('img');
    image.src = item.image;
    cartItem.appendChild(image);

    const itemName = document.createElement('h4');
    itemName.textContent = item.name;
    cartItem.appendChild(itemName);

    const itemPrice = document.createElement('p');
    itemPrice.textContent = `$${item.price}`;
    cartItem.appendChild(itemPrice);

    cartContainer.appendChild(cartItem);
});

// Calculate and display the total amount
const totalAmountElement = document.getElementById('total-amount');
const totalAmount = cartItems.reduce((total, item) => total + item.price, 0);
totalAmountElement.textContent = totalAmount.toFixed(2);
