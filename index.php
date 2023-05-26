<?php
session_start();
error_reporting(0);

include('./src/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./asset/style/index.css">
    <link rel="stylesheet" href="./asset/style/header.css">
    <link rel="stylesheet" href="./asset/style/carousel.css">
    <link rel="stylesheet" href="./asset/style/item.css">
    <link rel="stylesheet" href="./asset/style/footer.css">
    <link rel="stylesheet" href="./asset/style/product.css">

    <!-- icons from fontawesome -->
    <script src="https://kit.fontawesome.com/2075c28e43.js" crossorigin="anonymous"></script>

    <title>White Circle</title>
</head>

<body>

    <?php include "./src/header.php"; ?>

    <!-- sliding images -->
    <div class="carousel">
        <button class="carousel-button prev"><i class="fa-solid fa-chevron-left" style="color: #f8f9fa;"></i></button>
        <div class="carousel-images">
            <img src="./src/SystemData/imgs/carousel/1.jpeg" alt="Image 1">
            <img src="./src/SystemData/imgs/carousel/2.jpeg" alt="Image 2">
            <img src="./src/SystemData/imgs/carousel/3.jpeg" alt="Image 3">
            <img src="./src/SystemData/imgs/carousel/4.jpeg" alt="Image 4">
            <img src="./src/SystemData/imgs/carousel/5.jpeg" alt="Image 5">
        </div>
        <button class="carousel-button next"><i class="fa-solid fa-chevron-right" style="color: #f8f9fa;"></i></button>
    </div>

    <!---------- sliding script ---------->
    <script>
        const carousel = document.querySelector('.carousel');
        const carouselImages = document.querySelector('.carousel-images');
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        let counter = 1;
        const size = carousel.clientWidth;

        carouselImages.style.transform = `translateX(-${size * counter}px)`;

        nextButton.addEventListener('click', () => {
            if (counter >= carouselImages.children.length - 1) {
                carouselImages.style.transition = "transform 0.4s ease-in-out";
                counter = 1;
                carouselImages.style.transform = `translateX(-${size * counter}px)`;
                return;
            }
            carouselImages.style.transition = "transform 0.4s ease-in-out";
            counter++;
            carouselImages.style.transform = `translateX(-${size * counter}px)`;
        });

        prevButton.addEventListener('click', () => {
            if (counter <= 0) return;
            carouselImages.style.transition = "transform 0.4s ease-in-out";
            counter--;
            carouselImages.style.transform = `translateX(-${size * counter}px)`;
        });

        carouselImages.addEventListener('transitionend', () => {
            if (carouselImages.children[counter].id === 'last-clone') {
                carouselImages.style.transition = "none";
                counter = carouselImages.children.length - 2;
                carouselImages.style.transform = `translateX(-${size * counter}px)`;
            }
            if (carouselImages.children[counter].id === 'first-clone') {
                carouselImages.style.transition = "transform 0.4s ease-in-out";
                counter = carouselImages.children.length - counter;
                carouselImages.style.transform = `translateX(-${size * counter}px)`;
            }
        });

        // Automatic sliding every 5 seconds
        setInterval(() => {
            if (counter >= carouselImages.children.length - 1) {
                carouselImages.style.transition = "none";
                counter = 1;
                carouselImages.style.transform = `translateX(-${size * counter}px)`;
                return;
            }
            carouselImages.style.transition = "transform 0.4s ease-in-out";
            counter++;
            carouselImages.style.transform = `translateX(-${size * counter}px)`;
        }, 5000);
    </script>

    <!-- used with quary to automatically organize the content -->
    <div class="item">
        <div class="item-image">
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
        </div>
    </div>

    <!---------- footer php ---------->
    <?php include "./src/footer.php"; ?>
</body>

</html>