<div class="header-container">
    <header class="header">
        <div class="empty"></div>
        <div class="logo">
            <img src="src/SystemData/imgs/page/logo.png" alt="white circle logo">
        </div>

        <div class="link">
            <a href="./src/cart.php" style="text-decoration: none;"><i class="fa-solid fa-cart-shopping fa-2xl"></i></a>
            <a href="./src/login.php" class="form-account" style="text-decoration: none;">SIGN UP/LOG IN</a>
        </div>
    </header>

    <!-- horizontal -->
    <div class="header-nav" id="navbar">
        <?php include('./src/SystemData/Include/Nav/nav.php'); ?>
    </div>

    <script>
        window.onscroll = function() {
            myFunction()
        };

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
</div>