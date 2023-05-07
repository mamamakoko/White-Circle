<?php
session_start();
error_reporting(0);

include('./src/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bags Store</title>
    <!-- <link rel="stylesheet" href="index-styles.css" /> -->
</head>

<body>
    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Cart</a></li>
        </ul>
        <div class="profile-button">
            <a href="#">
                <img src="https://via.placeholder.com/50x50.png" alt="Profile" />
            </a>
        </div>
    </nav>

    <!-- Main content -->
    <main>
        <section class="hero">
            <h1>Welcome to Bags Store</h1>
            <p>Find your perfect bag for any occasion</p>
        </section>

        <section class="categories">
            <h2>Categories</h2>
            <?php include('./src/SystemData/Include/Nav/nav.php'); ?>
        </section>


        <section class="products">
            <h2>Featured Products</h2>
            <div class="product-container">
                <?php $page = isset($_GET['page']) ? $_GET['page'] : 'Home'; ?>
                <?php
                if (!file_exists($page . ".php") && !is_dir($page)) {
                    include '404.html';
                } else {
                    if (is_dir($page))
                        include $page . './index.php';
                    else
                        include $page . '.php';
                }
                ?>
                <!-- <div class="product">
                    <img src="https://via.placeholder.com/300x300.png" alt="Product" />
                    <h3 class="name">Product Name</h3>
                    <p class="price">$99.99</p>
                </div> -->
            </div>
        </section>

    </main>
    <!-- Footer -->
    <footer>
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
            <a href="#">Shipping Policy</a>
            <a href="#">Return Policy</a>
        </div>
        <p class="footer-text">&copy; 2023 Bags Store. All rights reserved.</p>
    </footer>

</body>
<style>
    /* General styles */

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 16px;
    }

    /* Navigation bar */
    nav {
        background-color: #333;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        height: 70px;
    }

    nav ul {
        display: flex;
        list-style: none;
    }

    nav ul li {
        list-style: none;
        margin-left: 20px;
    }

    nav ul li:first-child {
        margin-left: 0;
    }

    nav a {
        color: #999;
        text-decoration: none;
        padding: 10px;
        transition: all 0.3s ease;
    }

    nav ul li a:hover {
        color: #fff;

    }

    .hero {
        background-image: url("https://via.placeholder.com/800x400.png");
        background-size: cover;
        background-position: center;
        color: #fff;
        text-align: center;
        padding: 100px 0;
    }

    .hero h1 {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 24px;
        margin-bottom: 40px;
    }


    /* Categories section */
    .categories {
        margin: 40px 0;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .categories h2 {
        font-size: 24px;
        color: #333;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 40px;
    }

    .categories ul {
        list-style: none;
        display: flex;
        flex-wrap: wrap;
    }

    .categories li {
        margin-right: 20px;
        margin-bottom: 20px;
    }

    .categories a {
        color: #333;
        text-decoration: none;
        padding: 10px 20px;
        border: 2px solid #333;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .categories a:hover {
        background-color: #333;
        color: #fff;
    }

    /* Product display */
    .products {
        margin: 50px auto;
        max-width: 1200px;
    }

    .product-container {
        width: 100%;
        display: flex;
        margin: 0 auto;
        padding: 20px;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product {
        width: 23%;
        margin-bottom: 40px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        overflow: hidden;
    }

    .products h2 {
        font-size: 24px;
        color: #333;
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .product img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .product .name {
        font-size: 20px;
        font-weight: bold;
        margin-top: 10px;
        margin-bottom: 10px;
        color: #333;
    }

    .product a {
        text-decoration: none;
    }

    .name,
    .price {
        margin-left: 5px;
    }

    .product .price {
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
        transition: background-color 0.3s;
    }

    .product button:hover {
        background-color: #444;
    }

    /* User profile button */
    .profile-button {
        right: 20px;
    }

    .profile-button button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #333;
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 24px;
        transition: background-color 0.3s;
    }

    .profile-button button:hover {
        background-color: #444;
    }

    /* Footer */
    footer {
        background-color: #eee;
        padding: 20px;
        text-align: center;
        margin-top: 40px;
    }

    .footer-links {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: #333;
        text-decoration: none;
        margin-right: 10px;
    }

    .footer-links a:hover {
        text-decoration: underline;
    }

    .footer-text {
        font-size: 14px;
        color: #777;
    }

    @media screen and (max-width: 768px) {
        nav {
            flex-direction: column;
            align-items: flex-start;
        }

        nav ul {
            flex-direction: column;
        }

        nav ul li {
            margin-left: 0;
            margin-bottom: 10px;
        }

        .profile-button {
            margin-top: 10px;
        }
    }
</style>

</html>