<?php
session_start();
error_reporting(0);

include('./dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/style/ProductItems.css">
</head>

<body>
    <?php
    $proid = intval($_GET['proid']);
    $sql = "SELECT * FROM `products` where `products`.`Product_ID`=:proid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':proid', $proid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            ?>

        <?php }
    } ?>

    <?php include "./header.php"; ?>

    <header class="sad">
        <h1>
            <?php echo $result->Product_Name ?>
        </h1>
        <nav>
            <ul>
                <li><a href="#description">Description</a></li>
                <li><a href="#reviews">Reviews</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="product-image">
            <img src="./SystemData/imgs/<?php echo $result->Product_Path . '/' . $result->Product_Thumbnail; ?>"
                alt="Product Image">
        </div>

        <div class="product-details">
            <h2>
                <?php echo $result->Product_Name ?>
            </h2>
            <p class="price">
                ₱
                <?php echo $result->Product_Price ?>
            </p>
            <form action="#" method="post">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $result->Product_Stock ?>"
                    value="1">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
        <div class="product-description" id="description">
            <h3>Description</h3>
            <!-- Description -->
            <p class="description">
                <?php echo $result->Product_Description ?>
            </p>
        </div>
        <!-- // $sql = "SELECT DISTINCT customers.* FROM customers JOIN reviews ON reviews.Customer_ID =
        customers.Customer_ID WHERE reviews.Product_ID = :proid"; -->

        <div class="product-reviews" id="reviews">
            <h3>Reviews</h3>
            <ul>
                <?php $proid = intval($_GET['proid']);
                $sql = "SELECT * FROM reviews where `reviews`.`Product_ID`=:proid";
                $query = $dbh->prepare($sql);
                $query->bindParam(':proid', $proid, PDO::PARAM_INT);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                foreach ($results as $result) { ?>

                    <li>
                        <h4>
                            <?php echo $result->Customers_ID ?>
                        </h4>
                        <p>
                            <?php echo $result->product_reviews ?>
                        </p>
                    </li>

                <?php } ?>
            </ul>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Product Name</p>
    </footer>
</body>

</html>