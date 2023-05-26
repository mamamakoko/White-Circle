<div class="bg">
    <div class="separator">
        <div class="text">
            <div class="cont-navigation">
                <p>Product</p>
                <button class="add-button" id="add-product-button" data-modal-index="1">+ Add</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="separator">
        <div class="data-container">

            <?php
            // Fetch data from the database
            $sql = "SELECT products.Product_ID, products.Categories_ID, categories.Categories_Name, products.Product_Name, products.Product_Price, products.Product_Weight, products.Product_Thumbnail, products.Product_Path, products.Product_Stock, products.create_time, products.update_time FROM `products` INNER JOIN `categories` ON products.Categories_ID = categories.Categories_ID";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <!-- <th>Category ID</th> -->
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Thumbnail</th>
                        <!-- <th>Product Path</th> -->
                        <th>Stock</th>
                        <!-- <th>Product Description</th> -->
                        <th>Create Time</th>
                        <th>Update Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php echo $result->Product_ID ?>
                            </td>
                            <!-- <td>
                                <?php
                                //  echo $result->Categories_ID
                                ?>
                            </td> -->
                            <td>
                                <?php echo $result->Categories_Name ?>
                            </td>
                            <td>
                                <?php echo $result->Product_Name ?>
                            </td>
                            <td style="white-space: nowrap">
                                ₱
                                <?php echo $result->Product_Price ?>
                            </td>
                            <td>
                                <?php echo $result->Product_Weight ?>g
                            </td>
                            <td style="width: 30px;">
                                <image style="width: 100%;"
                                    src="./SystemData/imgs/<?php echo $result->Product_Path . '/' . $result->Product_Thumbnail; ?>" />
                            </td>
                            <!-- <td>
                                <?php
                                //  echo $result->Product_Path
                                ?>
                            </td> -->
                            <td style="text-align: center;">
                                <?php echo $result->Product_Stock ?>
                            </td>
                            <!-- <td>
                                <?php
                                // echo $result->Product_Description
                                ?>
                            </td> -->
                            <td>
                                <?php echo $result->create_time ?>
                            </td>
                            <td>
                                <?php echo $result->update_time ?>
                            </td>
                            <td class="button-function">

                                <button class="edit-pro-button edit" data-id="<?php echo $result->Product_ID; ?>">Edit
                                </button>
                                <!-- <button class="delete-pro-button"
                                    onclick="deleteProduct(<?php echo $result->Product_ID; ?>)">Delete
                                </button> -->

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "add.php" ?>



<div id="edit-modal" class="modal">
    <div class="modal-content" id="modal-contents">
    </div>
</div>

<script>
    var isAddClicked = false;


    // delete the product
    function deleteProduct(id) {
        if (confirm("Are you sure you want to delete this Product?")) {
            window.location.href = "functions.php?actionpro=delete&id=" + id;
        }
    }
    //ajax.update function
    $(document).ready(function () {
        $('#add-product-button').click(function () {
            isAddClicked = true;
            $('#add-modal').modal('show');
        });

        $('.edit').click(function () {
            var id = $(this).data('id');
            isAddClicked = false;
            $.ajax({
                url: './Admin/plugins/Product/edit.php',
                type: 'post',
                data: { id: id },
                success: function (response) {
                    $('#modal-contents').html(response);
                    if (isAddClicked) {
                        $('#edit-modal').modal('hide');
                    } else {
                        $('#edit-modal').modal('show');
                    }
                }
            });
        });

        $("#close-modal").click(function () {
            modal.hide();
        });
    });
    // for modal animations
    document.querySelector(".close").addEventListener("click", function () {
        var modal = document.querySelector(".modal");
        var modalContent = document.querySelector(".modal-content");
        modalContent.classList.add("fadeOut");
        modal.classList.add("fadeOut");
        setTimeout(function () {
            modal.style.display = "none";
            modalContent.classList.remove("fadeOut");
            modal.classList.remove("fadeOut");
        }, 400); // 400ms is the duration of the animation
    });
</script>


<style>
    <?php
    include "Product.css";
    ?>
</style>