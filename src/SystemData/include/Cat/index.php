<?php
$category_id = $_GET['cat012'];
$sql = "SELECT * FROM `products` WHERE `Categories_ID` = ?";
$query = $dbh->prepare($sql);
$query->execute([$category_id]);
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        ?>

        <div class="product">
            <a href="./src/ProductItems.php?proid=<?php echo $result->Product_ID; ?>">
                <img src="./src/SystemData/imgs/<?php echo $result->Product_Path . '/' . $result->Product_Thumbnail; ?>">
                <h3 class="name">
                    <?php echo $result->Product_Name; ?>
                </h3>
                <p class=" price">
                    ₱
                    <?php echo $result->Product_Price; ?>
                </p>
            </a>
        </div>

        <?php $cnt = $cnt + 1;
    }
}

?>