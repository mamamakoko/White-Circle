<div class="navigation">
    <h1 class="box-title">Products</h1>
    <button class="add-button" id="add-product-button" data-modal-index="1">+</button>
</div>

<?php
// Fetch data from the database
$sql = "SELECT * FROM `products`";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Category ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Weight</th>
            <th>Product Thumbnail</th>
            <th>Product Path</th>
            <th>Product Stock</th>
            <th>Product Description</th>
            <th>Create Time</th>
            <th>Update Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $result): ?>
            <tr>
                <td>
                    <?php echo $result->Product_ID ?>
                </td>
                <td>
                    <?php echo $result->Categories_ID ?>
                </td>
                <td>
                    <?php echo $result->Product_Name ?>
                </td>
                <td>
                    <?php echo $result->Product_Price ?>
                </td>
                <td>
                    <?php echo $result->Product_Weight ?>
                </td>
                <td style="width: 50px;">
                    <image style="width: 100%;"
                        src="./SystemData/imgs/<?php echo $result->Product_Path . '/' . $result->Product_Thumbnail; ?>" />
                </td>
                <td>
                    <?php echo $result->Product_Path ?>
                </td>
                <td>
                    <?php echo $result->Product_Stock ?>
                </td>
                <td>
                    <?php echo $result->Product_Description ?>
                </td>
                <td>
                    <?php echo $result->create_time ?>
                </td>
                <td>
                    <?php echo $result->update_time ?>
                </td>
                <td>
                    <!-- <button id="Edit-product-button" class="edit-pro-button">Edit</button> -->

                    <button id="Delete-product-button"
                        onclick="deleteProduct(<?php echo $result->Product_ID; ?>)">Delete</button>

                </td>
            </tr>

            <!-- <div class="modal2" id="product-modal">
                <div class=" modal-content">
                    <span class="close"></span>

                    <form id="edit-product-form" method="post" action="./functions.php">
                        <div style="display: flex;">
                            <input class="edit-product-input" type="number" placeholder="Product ID" name="productid"
                                value="<?php echo $result->Product_ID ?>"
                                style="width: 10%; padding: 0; text-align: center;" readonly>
                            <input class="edit-product-input" type="text" placeholder="Product Name" name="productname"
                                value="<?php echo $result->Product_Name ?>">
                        </div>
                        <div style="display: flex;">
                            <input class="edit-product-input" type="text" placeholder="Product Price" name="productprice"
                                value="<?php echo $result->Product_Price ?>">
                            <input class="edit-product-input" type="text" placeholder="Product Weight" name="productweight"
                                value="<?php echo $result->Product_Weight ?>">
                            <input class="edit-product-input" type="number" placeholder="Product Stock" name="productstock"
                                value="<?php echo $result->Product_Stock ?>">
                        </div>
                        <div style="display: flex;">
                            <input class="edit-product-input" type="text" placeholder="Product Thumbnail"
                                name="productthumbnail" value="<?php echo $result->Product_Thumbnail ?>">
                            <input class="edit-product-input" type="text" placeholder="Product Image" name="productimage"
                                value="<?php echo $result->Product_Image ?>">
                        </div>
                        <select multiple class="form-select" name="category-select"
                            style="height: auto; min-height: 50px; width: 100%;">
                            <?php
                            $product_id = $result->Product_ID;
                            $sql = "SELECT Categories_ID, Categories_Name FROM categories";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ); foreach ($results as $category) {
                                $selected = '';
                                if ($category->Categories_ID == $result->Categories_ID) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?= $category->Categories_ID ?>" <?= $selected ?>>
                                    <?= $category->Categories_Name ?>
                                </option>
                            <?php } ?>
                        </select>
                        <input class="edit-product-input" type="text" placeholder="Product Description"
                            name="productdescription" value="<?php echo $result->Product_Description ?>">

                        <button class="edit-product-button" type="submit" name="editproduct">Save Changes</button>
                    </form>

                </div>
            </div> -->


            <script src="./Admin/Admin.js"></script>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="modal" id="add-product-modal">
    <div class=" modal-content">
        <span class="close"></span>

        <form id="add-product-form" method="post" action="./functions.php" enctype="multipart/form-data">

            <input type="text" placeholder="Product Name" name="product-name">
            <select multiple class="form-select" name="category-select"
                style="height: auto; min-height: 50px; width: 100%;">
                <?php
                $sql = "SELECT Categories_ID, Categories_Name FROM categories";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                ?>
                <?php foreach ($results as $category): ?>
                    <option value="<?= $category->Categories_ID ?>">
                        <?= $category->Categories_Name ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div style="display: flex;">
                <input type="text" id="currency-input" placeholder="Product Price" name="product-price"
                    style="width: 33%; margin-right: 1%;">
                <input type="text" id="product-weight" name="product-weight" placeholder="Product Weight" required
                    style="width: 33%; margin-right: 1%;">
                <input type="number" id="product-stock" name="product-stock" placeholder="Product Stock" required
                    style="width: 33%;">
            </div>
            <input type="file" id="product-thumbnail" name="product-thumbnail" accept="image/*">
            <input type="file" id="product-image" name="product-image[]" accept="image/*" multiple>
            <textarea id="product-description" name="product-description" placeholder="Product Description"></textarea>


            <button type="submit" name="add-product-form">Add Product</button>
        </form>


    </div>
</div>

<script src="./Admin/Admin.js"></script>

<script>
    var currencyInput = document.getElementById("currency-input");
    currencyInput.addEventListener("input", function () {
        var rawValue = this.value.replace(/[^0-9]/g, "");
        var formattedValue = "$" + rawValue.substr(0, rawValue.length - 2) + "." + rawValue.substr(-2);
        this.value = formattedValue;
    });

    var weightInput = document.getElementById("product-weight");
    weightInput.addEventListener("input", function () {
        var rawValue = this.value.replace(/[^0-9]/g, "");
        var formattedValue = rawValue + "g";
        this.value = formattedValue;
    });

</script>