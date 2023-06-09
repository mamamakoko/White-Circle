<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../asset/style/cart.css">

    <title>Document</title>
</head>

<body>
    <h1>Shopping Cart</h1>

    <div class="cart-container">
        <!-- Cart items will be dynamically added here -->
        <h1>Lalagyan ng mga items</h1>
        <?php include "./cart-item.php"; ?>
    </div>

    <div id="cart-total">
        <h3>Total: $<span id="total-amount">0</span></h3>
        <button id="checkout-btn">Checkout</button>
    </div>

</body>

</html>