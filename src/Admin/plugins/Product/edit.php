<?php
include "../../../dbcon.php";
$id = $_POST['id'];

$sql = "SELECT * FROM products WHERE Product_ID = :id";
$query = $dbh->prepare($sql);
$query->execute(array(':id' => $id));
$results = $query->fetchAll(PDO::FETCH_OBJ);

?>
<div class="division">
    <span class="modal_title">Edit</span>
    <span class="close" data-dismiss="modal">&times;</span>
</div>
<form id="edit-product-form" method="post" action="./functions.php" enctype="multipart/form-data">
    <?php foreach ($results as $result): ?>

        <input type="hidden" name="productid" value="<?php echo $result->Product_ID ?>" required>
        <div class="input-group">
            <input type="text" name="productname" value="<?php echo $result->Product_Name ?>" required>
            <label for="productname">Product Name</label>
        </div>

        <div class="input-group">
            <select class="form-select" name="category-select" required>
                <?php
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
            <label for="Category">Category</label>
        </div>

        <div style="display: flex;">
            <div style="width: 33%; margin-right: 1%;">
                <div class="input-group">
                    <input type="text" id="currencyinput" name="productprice" value="<?php echo $result->Product_Price ?>"
                        required>
                    <label for="productprice">Price</label>
                </div>
            </div>

            <div style="width: 33%; margin-right: 1%;">
                <div class="input-group">
                    <input type="text" id="productweight" name="productweight" value="<?php echo $result->Product_Weight ?>"
                        required>
                    <label for="productweight">Weight</label>
                </div>
            </div>

            <div style="width: 33%;">
                <div class="input-group">
                    <input type="number" min="0" name="productstock" value="<?php echo $result->Product_Stock ?>" required>
                    <label for="productstock">Stock</label>
                </div>
            </div>
        </div>

        <div style="display: flex; gap: 1%; margin-bottom: 5%;">
            <div class="input-group" style="width: 30%;">
                <input type="file" id="productthumbnail" name="product-thumbnail" accept="image/*"
                    onchange="previewThumbnail(event)">
                <img id="thumbnail-preview"
                    src="./SystemData/imgs/<?php echo $result->Product_Path . '/' . $result->Product_Thumbnail; ?>"
                    width="100%">
            </div>

            <div class="input-group" style="width: 70%;">
                <?php
                // Retrieve product images based on product ID
                $sql = "SELECT * FROM products_images JOIN products ON products_images.Product_ID = products.Product_ID WHERE products_images.Product_ID = :id ";
                $query = $dbh->prepare($sql);
                $query->execute(array(':id' => $id));
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                ?>
                <input type="file" id="productimage" name="product-image[]" accept="image/*" multiple
                    onchange="previewImages(event)">

                <div id="images-preview">
                    <?php foreach ($results as $result): ?>
                        <img src="./SystemData/imgs/<?php echo $result->Product_Path . '/' . $result->Product_Image; ?>">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="input-group">
            <textarea name="productdescription" required><?php echo $result->Product_Description ?></textarea>
            <label for="Product Description">Description</label>
        </div>

        <div style="width: 100%; text-align: center;">
            <button class="add-button" type="submit" name="edit-product-form">Save Changes</button>
        </div>
    <?php endforeach; ?>
</form>
<script>
    var currencyInput = document.getElementById("currencyinput");
    currencyInput.addEventListener("input", function () {
        var rawValue = this.value.replace(/[^0-9]/g, "");
        var formattedValue = "₱" + rawValue.substr(0, rawValue.length - 2) + "." + rawValue.substr(-2);
        this.value = formattedValue;
    });

    var weightInput = document.getElementById("productweight");
    weightInput.addEventListener("input", function () {
        var rawValue = this.value.replace(/[^0-9]/g, "");
        var formattedValue = rawValue + "g";
        this.value = formattedValue;
    });

    function previewThumbnail(event) {
        const thumbnailPreview = document.getElementById("thumbnail-preview");
        thumbnailPreview.src = URL.createObjectURL(event.target.files[0]);
    }

    function previewImages(event) {
        const imagesPreview = document.getElementById("images-preview");
        imagesPreview.innerHTML = "";
        for (let i = 0; i < event.target.files.length; i++) {
            const image = document.createElement("img");
            image.src = URL.createObjectURL(event.target.files[i]);
            imagesPreview.appendChild(image);
        }
    }

</script>