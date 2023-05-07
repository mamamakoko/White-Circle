<!DOCTYPE html>
<html>

<head>
    <title>Bag Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About Us</a></li>
                <li class="profile-btn"><a href="#"><img src="profile.png" alt="Profile"></a></li>
            </ul>
        </nav>
    </header>
    <div class="banner"></div>
    <main>
        <section class="categories">
            <h2>Categories</h2>
            <ul>
                <li><a href="#">Shoulder Bags</a></li>
                <li><a href="#">Backpacks</a></li>
                <li><a href="#">Totes</a></li>
                <li><a href="#">Clutches</a></li>
            </ul>
        </section>
        <section class="products">
            <h2>Shoulder Bags</h2>
            <div class="product-container">
                <div class="product">
                    <img src="product1.jpg" alt="Product 1">
                    <h3>Product 1</h3>
                    <p>Description of Product 1</p>
                    <span class="price">$20.00</span>
                    <button>Add to Cart</button>
                </div>
                <div class="product">
                    <img src="product1.jpg" alt="Product 2">
                    <h3>Product 2</h3>
                    <p>Description of Product 2</p>
                    <span class="price">$25.00</span>
                    <button>Add to Cart</button>
                </div>
                <div class="product">
                    <img src="product1.jpg" alt="Product 3">
                    <h3>Product 3</h3>
                    <p>Description of Product 3</p>
                    <span class="price">$30.00</span>
                    <button>Add to Cart</button>
                </div>
                <div class="product">
                    <img src="product1.jpg" alt="Product 4">
                    <h3>Product 4</h3>
                    <p>Description of Product 4</p>
                    <span class="price">$35.00</span>
                    <button>Add to Cart</button>
                </div>
            </div>
        </section>
    </main>
</body>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: sans-serif;
    }

    header {
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1;
    }

    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 70px;
    }

    nav ul {
        display: flex;
        align-items: center;
    }

    nav li {
        list-style: none;
        margin-right: 20px;
    }

    nav li:last-child {
        margin-right: 0;
    }

    nav a {
        color: #333;
        text-decoration: none;
        padding: 10px;
        transition: all 0.3s ease;
    }

    nav a:hover {
        color: #fff;
        background-color: #333;
    }

    .banner {
        background-image: url('https://via.placeholder.com/1200x300');
        background-size: cover;
        background-position: center;
        height: 300px;
    }

    .products {
        margin: 50px auto;
        max-width: 1200px;
    }


    .product-container {
        padding: 50px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        grid-gap: 30px;
    }

    .product {
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
    }

    .products h2 {
        font-size: 24px;
        color: #333;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .product img {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    .product h3 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .product p {
        font-size: 16px;
        color: #777;
        margin-bottom: 20px;
    }

    .product button {
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .product button:hover {
        background-color: #fff;
        color: #333;
    }

    .categories {
        position: fixed;
        top: 50%;
        transform: translateY(-50%);
        right: 0;
        background-color: #fff;
        padding: 20px;
        box-shadow: -5px 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }

    .categories h4 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .categories ul {
        list-style: none;
    }

    .categories li {
        margin-bottom: 10px;
    }

    .categories a {
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .categories a:hover {
        color: #fff;
        background-color: #333;
    }

    .profile-btn {
        position: fixed;
        bottom: 50px;
        right: 50px;
        background-color: #333;
        color: #fff;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        overflow: hidden;
    }


    .profile-btn a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        text-decoration: none;
        background-color: red;
        color: #fff;
        padding: 0;
        overflow: hidden;
    }

    .profile-btn img {
        width: 100%;
        transition: width 0.2s ease-in-out;
    }

    .profile-btn img:hover {
        width: 110%;
    }
</style>


</html>