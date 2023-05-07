<div class="navigation">
    <h1 class="box-title">Products Images</h1>

</div>

<?php
// Fetch data from the database
$sql = "SELECT * FROM `products_images`";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<table>
    <thead>
        <tr>
            <th>Product Images ID</th>
            <th>Product ID</th>
            <th>Product Image</th>
            <th>Create Time</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $result): ?>
            <tr>
                <td>
                    <?php echo $result->ProductImages_ID ?>
                </td>
                <td>
                    <?php echo $result->Product_ID ?>
                </td>
                <td style="width: 20%;">
                    <image style="width: 60%;" src="./SystemData/imgs/<?php echo $result->Product_Image ?>" />
                </td>
                <td>
                    <?php echo $result->create_time ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>