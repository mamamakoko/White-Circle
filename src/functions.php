<?php
session_start();
error_reporting(0);

include('./dbcon.php');

// code for adding Category 

if (isset($_POST['addcategory'])) {
    $categoryname = trim(filter_var($_POST['categoryname'], FILTER_SANITIZE_STRING));

    $sql = "INSERT INTO categories (Categories_Name) VALUES (:categoryname)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':categoryname', $categoryname, PDO::PARAM_STR);
    $query->execute();

    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        // $_SESSION['msgCategory'] = "Category added successfully";
        echo "'Record successfully added.";
        header('location:admin.php?page=Admin/plugins/Others/');
    } else {
        // $_SESSION['errorCategory'] = "Category adding failed";
        echo "'Record failed.";
        header('location:admin.php?page=Admin/plugins/Others/');
    }
}
// editing
if (isset($_POST['editcategory'])) {
    $categoryId = filter_var($_POST['categoryid'], FILTER_SANITIZE_NUMBER_INT);
    $categoryName = filter_var($_POST['categoryname'], FILTER_SANITIZE_STRING);

    $sql = "UPDATE categories SET Categories_Name = :categoryName, update_time = NOW() WHERE Categories_ID = :categoryId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':categoryName', $categoryName, PDO::PARAM_STR);
    $query->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
    $query->execute();

    header('location:admin.php?page=Admin/plugins/Others/');
    exit();
}

// code for deleting

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $categoryId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "DELETE FROM categories WHERE Categories_ID = :categoryId";
    $query = $dbh->prepare($sql);
    $query->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
    $query->execute();

    header('location:admin.php');
    exit();
}

// ###############################################--Product--###############################################


// Check if the form was submitted
if (isset($_POST['add-product-form'])) {
    // Get form data
    $productName = trim(filter_var($_POST['product-name'], FILTER_SANITIZE_STRING));
    $productCategories = isset($_POST['category-select']) ? filter_var($_POST['category-select'], FILTER_SANITIZE_NUMBER_INT) : '';
    $productPrice = trim(filter_var($_POST['product-price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $productWeight = trim(filter_var($_POST['product-weight'], FILTER_SANITIZE_STRING));
    $productStock = trim(filter_var($_POST['product-stock'], FILTER_SANITIZE_NUMBER_INT));
    $productDescription = trim(filter_var($_POST['product-description'], FILTER_SANITIZE_STRING));
    $productImage = $_FILES["product-image"]["name"];
    $productThumbnail = $_FILES["product-thumbnail"]["name"];

    $thumbnail_extension = substr($productThumbnail, strlen($productThumbnail) - 4, strlen($productThumbnail));
    $image_extension = substr($productImage, strlen($productImage) - 4, strlen($productImage));

    $imgnewname2 = md5($productThumbnail . time()) . $thumbnail_extension;

    $parent_dir = "./SystemData/imgs/";
    $num = 1;
    $dir_name = $productName . $num;

    while (file_exists($parent_dir . $dir_name)) {
        $num++;
        $dir_name = $productName . $num;
        break;
    }

    if (!file_exists($parent_dir . $dir_name)) {
        mkdir($parent_dir . $dir_name, 0777, true);

        move_uploaded_file($_FILES["product-thumbnail"]["tmp_name"], $parent_dir . $dir_name . "/" . $imgnewname2);

        // SQL command to insert a new product into the database
        $sql = "INSERT INTO products (Product_Name, Categories_ID, Product_Price, Product_Weight, Product_Path, Product_Stock, Product_Description, Product_Thumbnail) 
            VALUES (:productName, :productCategories, :productPrice, :productWeight, :dir_name, :productStock, :productDescription, :thumbnail)";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
        $stmt->bindParam(':productCategories', $productCategories, PDO::PARAM_STR);
        $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_STR);
        $stmt->bindParam(':productWeight', $productWeight, PDO::PARAM_STR);
        $stmt->bindParam(':dir_name', $dir_name, PDO::PARAM_STR);
        $stmt->bindParam(':productStock', $productStock, PDO::PARAM_STR);
        $stmt->bindParam(':productDescription', $productDescription, PDO::PARAM_STR);
        $stmt->bindParam(':thumbnail', $imgnewname2, PDO::PARAM_STR);
        $stmt->execute();
        $lastInsertId = $dbh->lastInsertId();

        foreach ($_FILES["product-image"]["tmp_name"] as $key => $image_name) {
            $extension = pathinfo($_FILES["product-image"]["name"][$key], PATHINFO_EXTENSION);
            $new_name = md5($_FILES["product-image"]["name"][$key] . time()) . '.' . $extension;
            $result = move_uploaded_file($_FILES["product-image"]["tmp_name"][$key], $parent_dir . $dir_name . "/" . $new_name);

            $productImages = $new_name;

            $sql = "INSERT INTO products_images (Product_ID, Product_Image) VALUES (:productID, :productImages)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':productID', $lastInsertId, PDO::PARAM_INT);
            $stmt->bindParam(':productImages', $productImages, PDO::PARAM_STR);
            $stmt->execute();

        }

        if ($lastInsertId) {
            echo "Product added successfully";
            header('location:admin.php?page=Admin/plugins/Product/');
        } else {
            echo "An error occurred while adding the product";
            header('location:admin.php?page=Admin/plugins/Product/');
        }

    } else {
        echo "Directory already exists";
    }

}

// code for deleting

if (isset($_GET['actionpro']) && $_GET['actionpro'] === 'delete' && isset($_GET['id'])) {
    $ProductID = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Get the product path from the database
    $sql = "SELECT Product_Path FROM products WHERE Product_ID = :ProductID";
    $query = $dbh->prepare($sql);
    $query->bindParam(':ProductID', $ProductID, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $Product_Path = $result['Product_Path'];

    // Delete product images from the database
    $sql = "DELETE FROM `products_images` WHERE `Product_ID` = :ProductID";
    $query = $dbh->prepare($sql);
    $query->bindParam(':ProductID', $ProductID, PDO::PARAM_INT);
    $query->execute();

    // Delete product from the database
    $sql = "DELETE FROM `products` WHERE `Product_ID` = :ProductID";
    $query = $dbh->prepare($sql);
    $query->bindParam(':ProductID', $ProductID, PDO::PARAM_INT);
    $query->execute();

    // Delete product folder
    $parent_dir = "./SystemData/imgs/";
    $dir_name = $Product_Path;
    $dir_path = $parent_dir . $dir_name;
    if (is_dir($dir_path)) {
        $files = glob($dir_path . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        rmdir($dir_path);
    }

    header('location:admin.php?page=Admin/plugins/Product/');
    exit();
}

// code for updating a product
if (isset($_POST['edit-product-form'])) {
    $productId = trim(filter_var($_POST['productid'], FILTER_SANITIZE_STRING));
    $productName = trim(filter_var($_POST['productname'], FILTER_SANITIZE_STRING));
    $productCategories = isset($_POST['category-select']) ? filter_var($_POST['category-select'], FILTER_SANITIZE_NUMBER_INT) : '';
    $productPrice = trim(filter_var($_POST['productprice'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $productWeight = trim(filter_var($_POST['productweight'], FILTER_SANITIZE_STRING));
    $productStock = trim(filter_var($_POST['productstock'], FILTER_SANITIZE_NUMBER_INT));
    $productDescription = trim(filter_var($_POST['productdescription'], FILTER_SANITIZE_STRING));
    $productImage = $_FILES["product-image"]["name"];
    $productThumbnail = $_FILES["product-thumbnail"]["name"];




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
    }
    $stmt = $dbh->prepare("UPDATE products SET Product_Name = :productName, Categories_ID = :productCategories, Product_Price = :productPrice, Product_Weight = :productWeight, Product_Stock = :productStock, Product_Description = :productDescription, update_time = NOW() WHERE Product_ID = :productId");
    $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
    $stmt->bindParam(':productCategories', $productCategories, PDO::PARAM_STR);
    $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_STR);
    $stmt->bindParam(':productWeight', $productWeight, PDO::PARAM_STR);
    $stmt->bindParam(':productStock', $productStock, PDO::PARAM_INT);
    $stmt->bindParam(':productDescription', $productDescription, PDO::PARAM_STR);
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
    // Redirect to the product details page
    header('location:admin.php?page=Admin/plugins/Product/');
    exit();
}

// signUp function

if (isset($_POST['signUpForm'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO customers (Customers_FirstName, Customers_LastName, Customers_Phone, Customers_Email, Customers_Password) VALUES (:firstName, :lastName, :phoneNumber, :email, :password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $query->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo "Registration successful!";
        header('location:login.php');
    } else {
        echo "Registration failed.";
        // Redirect the user back to the signup page or display an error message
        // For example, header('location: signup.php?error=RegistrationFailed');
    }
}

// login form
if (isset($_POST['logInForm'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM customers WHERE Customers_Email = :email AND Customers_Password = :password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            echo "login successful!";
            header('location:../');
        }
    } else {
        echo "login failed.";
    }
}

?>