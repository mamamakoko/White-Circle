<?php
// Update the product thumbnail
if (!empty($productThumbnail)) {
    // Get the existing product thumbnail and images
    $stmt = $dbh->prepare("SELECT `Product_Path`,`Product_Thumbnail` FROM `products` WHERE `Product_ID` = :productId");
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $existingThumbnail = $row['Product_Thumbnail'];
    $existingImagesPath = $row['Product_Path'];

    $thumbnail_extension = substr($productThumbnail, strlen($productThumbnail) - 4, strlen($productThumbnail));
    $imgnewname2 = md5($productThumbnail . time()) . $thumbnail_extension;

    // Check if the existing thumbnail is not empty
    if (!empty($existingThumbnail)) {
        // Delete the existing thumbnail
        unlink('./SystemData/imgs/' . $existingImagesPath . '/' . $existingThumbnail);
    }

    // Upload the new thumbnail
    move_uploaded_file($_FILES["product-thumbnail"]["tmp_name"], './SystemData/imgs/' . $existingImagesPath . "/" . $imgnewname2);
    $thumbnail = $imgnewname2;

    $stmt = $dbh->prepare("UPDATE products SET `Product_Thumbnail` = :imgnewname2 WHERE Product_ID = :productId");
    $stmt->bindParam(':imgnewname2', $imgnewname2, PDO::PARAM_STR);
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();

    $imagePath = 'path/to/image.jpg';
    echo '<img src="' . $imgnewname2 . '" alt="Image"> haha';
    echo "haha";
} else {
    // Use the existing thumbnail
    $thumbnail = $existingThumbnail;
}



// Update the product images
$imagesToDelete = [];
if (!empty($_FILES["product-image"]["name"][0])) {
    // Get the existing product images
    $stmt = $dbh->prepare("SELECT Product_Image FROM products_images WHERE Product_ID = :productId");
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $existingImages = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    foreach ($existingImages as $existingImage) {
        if (!in_array($existingImage, $_FILES["product-image"]["name"])) {
            // The existing image is not in the new images, mark it for deletion
            $imagesToDelete[] = $existingImage;
        }
    }

    // Delete the images marked for deletion
    foreach ($imagesToDelete as $imageToDelete) {
        unlink('./SystemData/imgs/' . $existingImagesPath . '/' . $imageToDelete);
        $stmt = $dbh->prepare("DELETE FROM products_images WHERE Product_ID = :productId AND Product_Image = :productImage");
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':productImage', $imageToDelete, PDO::PARAM_STR);
        $stmt->execute();
    }
    foreach ($_FILES["product-image"]["tmp_name"] as $key => $tmp_name) {
        $image_name = $_FILES["product-image"]["name"][$key];
        $image_tmp = $_FILES["product-image"]["tmp_name"][$key];
        $image_type = $_FILES["product-image"]["type"][$key];
        // Generate a new name for the image to avoid overwriting
        $image_extension = substr($image_name, strlen($image_name) - 4, strlen($image_name));
        $imgnewname1 = md5($image_name . time()) . $image_extension;

        // Upload the new image
        move_uploaded_file($image_tmp, './SystemData/imgs/' . $existingImagesPath . "/" . $imgnewname1);

        // Add the new image to the database
        $stmt = $dbh->prepare("INSERT INTO products_images (Product_ID, Product_Image) VALUES (:productId, :productImage)");
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':productImage', $imgnewname1, PDO::PARAM_STR);
        $stmt->execute();
    }

} else {
    // No new images were uploaded
}

// $stmt = $dbh->prepare("UPDATE products SET Product_Name = :productName, Categories_ID = :productCategories, Product_Price = :productPrice, Product_Weight = :productWeight, Product_Stock = :productStock, Product_Description = :productDescription, update_time = NOW() WHERE Product_ID = :productId");
// $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
// $stmt->bindParam(':productCategories', $productCategories, PDO::PARAM_STR);
// $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_STR);
// $stmt->bindParam(':productWeight', $productWeight, PDO::PARAM_STR);
// $stmt->bindParam(':productStock', $productStock, PDO::PARAM_INT);
// $stmt->bindParam(':productDescription', $productDescription, PDO::PARAM_STR);
// $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
// $stmt->execute();
echo "hhah";
echo $productThumbnail;
// Redirect to the product details page
// header('location:admin.php?page=Admin/plugins/Product/');
exit();
?>