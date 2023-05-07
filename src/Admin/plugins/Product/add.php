<!-- Modal for adding product -->
<div id="add-modal" class="modal">
    <div class="modal-content">
        <div class="division">
            <span class="modal_title">Product</span>
            <span id="close-modal" class="close">&times;</span>
        </div>

        <form id="add-product-form" method="post" action="./functions.php" enctype="multipart/form-data">

            <div class="input-group">
                <input type="text" name="product-name" autocomplete="off" required>
                <label for="name">Product Name</label>
            </div>

            <div class="input-group">
                <select class="form-select" name="category-select" required>
                    <?php
                    $sql = "SELECT Categories_ID, Categories_Name FROM categories";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    ?>
                    <option value=""></option>
                    <?php foreach ($results as $category): ?>
                        <option value="<?= $category->Categories_ID ?>">
                            <?= $category->Categories_Name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="Category">Category</label>
            </div>

            <div style="display: flex;">
                <div style="width: 33%; margin-right: 1%; ">
                    <div class="input-group">
                        <input type="text" id="currency-input" name="product-price" required>
                        <label for="Product Price">Price</label>
                    </div>
                </div>

                <div style="width: 33%; margin-right: 1%; ">
                    <div class="input-group">
                        <input type="text" id="product-weight" name="product-weight" required>
                        <label for="Product Weight">Weight</label>
                    </div>
                </div>

                <div style="width: 33%;">
                    <div class="input-group">
                        <input type="number" min="0" id="product-stock" name="product-stock" required>
                        <label for="Product Stock">Stock</label>
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 1%; margin-bottom: 5%;">
                <div class="input-group" style="width: 30%;">
                    <input type="file" id="product-thumbnail" name="product-thumbnail" accept="image/*" required>
                    <img id="img" width="100%">
                </div>

                <div class="input-group" style="width: 70%;">
                    <input type="file" id="product-image" name="product-image[]" accept="image/*" multiple required>
                    <div id="imgs"></div>
                </div>
            </div>

            <div class="input-group">
                <textarea type="text" id="product-description" name="product-description" required></textarea>
                <label for="Product Description">Description</label>
            </div>

            <div style="width: 100%; text-align: center;"> <button class="add-button" type="submit"
                    name="add-product-form">Add Product</button></div>

        </form>


    </div>
</div>
<script>
    var modals = document.getElementById("add-modal");
    var buttons = document.getElementById("add-product-button");
    var closes = document.getElementsByClassName("close")[0];


    buttons.onclick = function () {
        modals.style.display = "block";
    };

    closes.onclick = function () {
        modals.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target == modals) {
            modals.style.display = "none";
        }
    };



    var currencyInput = document.getElementById("currency-input");
    currencyInput.addEventListener("input", function () {
        var rawValue = this.value.replace(/[^0-9]/g, "");
        var formattedValue = "₱" + rawValue.substr(0, rawValue.length - 2) + "." + rawValue.substr(-2);
        this.value = formattedValue;
    });

    var weightInput = document.getElementById("product-weight");
    weightInput.addEventListener("input", function () {
        var rawValue = this.value.replace(/[^0-9]/g, "");
        var formattedValue = rawValue + "g";
        this.value = formattedValue;
    });

    let img = document.getElementById("img");
    let productInput = document.getElementById("product-thumbnail");

    productInput.onchange = (e) => {
        if (productInput.files[0])
            img.src = URL.createObjectURL(productInput.files[0]);
    }

    const fileInput = document.getElementById("product-image");
    const images = document.getElementById("imgs");

    fileInput.addEventListener('change', (event) => {

        const imageFiles = event.target.files;

        images.innerHTML = '';

        if (imageFiles.length > 0) {
            for (const imageFile of imageFiles) {
                const reader = new FileReader();

                reader.readAsDataURL(imageFile);

                reader.addEventListener('load', () => {
                    images.innerHTML += `  
                    <div class="image_box">
                        <img src="${reader.result}" alt="">
                    </div>`;
                });

            }
        } else {
            images.innerHTML = '';
        }

    });

</script>