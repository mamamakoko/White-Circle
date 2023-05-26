<div class="header-container">
    <header class="header">
        <div class="empty"></div>
        <div class="logo">
            <img src="src/SystemData/imgs/page/logo.png" alt="white circle logo">
        </div>

        <div class="link">

            <!-- container for user profile that is logged in -->
            <div class="user-pic">
                <img src="src/SystemData/imgs/page/logo.png" alt="user profile picture">
            </div>
            <a href="./src/cart.php" style="text-decoration: none;"><i class="fa-solid fa-cart-shopping fa-2xl"></i></a>
            <a href="./src/logout.php" class="form-account">Log out</a>
        </div>
    </header>

    <!-- horizontal -->
    <div class="header-nav">
        <?php include('./src/SystemData/Include/Nav/nav.php'); ?>
    </div>
</div>