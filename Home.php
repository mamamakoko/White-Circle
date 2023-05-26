<?php
$sql = "SELECT * FROM products";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;

if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        if ($result->Product_Stock == 0) {
            ?>
            <div class="product">
                <!-- <a href="./src/ProductItems.php?proid=<?php echo $result->Product_ID; ?>" style="text-decoration: none; font-family: calibri; color: #1a1a1a;"> -->
                <img src="./src/SystemData/imgs/<?php echo $result->Product_Path . '/' . $result->Product_Thumbnail; ?>">
                <h3 class="name">
                    <?php echo $result->Product_Name; ?>
                </h3>
                <p class=" price">
                    ₱
                    <?php echo $result->Product_Price; ?>
                </p>
                <!-- </a> -->
            </div>
        <?php } else { ?>

            <div class="product">
                <a href="./src/ProductItems.php?proid=<?php echo $result->Product_ID; ?>"
                    style="text-decoration: none; font-family: calibri; color: #1a1a1a;">
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
            <!-- incrimentation -->
        <?php }
        $cnt = $cnt + 1;
    }
} ?>