<?php
session_start();

include('./dbcon.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="Admin/plugins/Admin-manual-css/Admin.css" rel="stylesheet">
    <link href="Admin/plugins/Admin-manual-css/Dashboard.css" rel="stylesheet">
    <link rel="icon" href="./SystemData/page/logo.png" />
    <title>White Circle</title>
</head>

<body>

    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <?php include('Admin/inc/sideNav.php') ?>
    <section class="home-section">
        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'Admin/Dashboard'; ?>

        <?php
        if (!file_exists($page . ".php") && !is_dir($page)) {
            include 'Admin/404.html';
        } else {
            if (is_dir($page))
                include $page . './index.php';
            else
                include $page . '.php';
        }
        ?>
        <br>
        <?php include('Admin/inc/footer.php') ?>

    </section>

    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function () {
            loader.style.display = "none";
        })
    </script>
</body>

</html>