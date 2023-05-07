<div class="navigation">
    <span class="box-title">Category</span>
    <button class="add-button" id="add-category-button">+ Add</button>
</div>

<div class="modal" id="add-category-modal">
    <div class="modal-content">
        <span class="close"></span>

        <form id="add-category-form" method="post" action="./functions.php">

            <div class="input-group">
                <input type="text" name="categoryname" required>
                <label for="name">Category Name</label>
            </div>

            <button type="submit" name="addcategory">Add Category</button>
        </form>

    </div>
</div>

<?php
// Fetch data from the database
$sql = "SELECT * FROM categories";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Create Time</th>
            <th>Update Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $result): ?>
            <tr>
                <td>
                    <?php echo $result->Categories_ID ?>
                </td>
                <td>
                    <?php echo $result->Categories_Name ?>
                </td>
                <td>
                    <?php echo $result->create_time ?>
                </td>
                <td>
                    <?php echo $result->update_time ?>
                </td>
                <td>
                    <button id="Edit-category-button" class="edit-cat-button">Edit</button>
                    <!-- <button id="Delete-category-button"
                        onclick="deleteCategory(<?php echo $result->Categories_ID; ?>)">Delete</button> -->
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>


    <div class="modal2" id="category-modal">
        <div class="modal-content">
            <span class="close"></span>

            <form id="edit-category-form" method="post" action="./functions.php">
                <input class="edit-category-input" type="hidden" placeholder="Category ID" name="categoryid"
                    value="<?php echo trim(htmlentities($result->Categories_ID)); ?>" readonly />


                <div class="input-group">
                    <input class="edit-category-input" type="text" placeholder="Category Name" name="categoryname"
                        value="<?php echo trim(htmlentities($result->Categories_Name)); ?>" required />
                    <label for="name">Category Name</label>
                </div>


                <button class="edit-category-button" type="submit" name="editcategory">Save Changes</button>
            </form>
        </div>
    </div>


</table>
<script>
    var modals = document.querySelectorAll(".modal");
    var buttons = document.querySelectorAll(".add-button");

    buttons.forEach(function (button) {
        button.onclick = function () {
            modals.forEach(function (modal) {
                modal.style.display = "block";
            });
        };
    });

    window.onclick = function (event) {
        modals.forEach(function (modal) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    };

    var editcat = document.querySelectorAll(".edit-cat-button");
    var catModal = document.getElementById("category-modal");

    editcat.forEach(function (btn) {
        btn.addEventListener("click", function () {
            var categoryID = btn.parentElement.parentElement
                .querySelector("td:first-child")
                .textContent.trim();
            var categoryName = btn.parentElement.parentElement
                .querySelector("td:nth-child(2)")
                .textContent.trim();
            var categoryIDInput = catModal.querySelector("input[name=categoryid]");
            var categoryNameInput = catModal.querySelector("input[name=categoryname]");
            categoryIDInput.value = categoryID;
            categoryNameInput.value = categoryName;
            catModal.style.display = "block";
        });
    });

    var closeBtn = catModal.querySelector(".close");
    closeBtn.addEventListener("click", function () {
        catModal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target == catModal) {
            catModal.style.display = "none";
        }
    });

    function deleteCategory(id) {
        if (confirm("Are you sure you want to delete this category?")) {
            window.location.href = "functions.php?action=delete&id=" + id;
        }
    }
</script>

<style>
    .navigation {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1%;
    }

    .box-title {
        font-size: 24px;
        margin: 0;
    }

    .modal2,
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #f1f1f1;
        margin: auto;
        padding: 20px;
        width: 30%;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 5px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .close {
        color: black;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .close:hover {
        color: red;
        cursor: pointer;
    }

    .edit-category-button,
    #add-category-form button,
    .add-button {
        background-color: #344D61;
        border: none;
        padding: 5px 13px;
        border-radius: 50px;
        cursor: pointer;
        font-size: 15px;
        font-weight: bold;
        color: white;
    }


    .edit-cat-button {
        background-color: #344D61;
        border: none;
        padding: 5px 10px;
        border-radius: 50px;
        cursor: pointer;
        font-size: 13px;
        font-weight: bold;
        color: white;
        margin: 10px auto;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #2B2D42;
        color: white;
    }

    .button-function {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .data-container {
        background-color: #f1f1f1;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #888888;
        margin-top: 10px;
        overflow-x: auto;
    }

    .input-group {
        position: relative;
    }

    .input-group input {
        width: 100%;
        margin-bottom: 15px;
        padding: 0.8em;
        outline: none;
        border: 2px solid #2B2D42;
        background-color: transparent;
        border-radius: 5px;
        max-width: 100%;
    }



    .input-group label {
        position: absolute;
        left: 0;
        padding: 0.7em 0.2em;
        margin-left: 0.1em;
        pointer-events: none;
        transition: all 0.3s ease;
        color: #2B2D42;
    }

    .input-group :is(input:focus, input:valid)~label {
        transform: translateY(-50%)scale(.9);
        margin: 0em;
        padding: 0em 0.4em;
        margin-left: 0.1em;
        background-color: #f1f1f1ff;
    }

    .input-group :is(textarea:focus, textarea:valid)~label {
        transform: translateY(-50%)scale(.9);
        margin: 0em;
        padding: 0em 0.4em;
        margin-left: 0.1em;
        background-color: #f1f1f1ff;
    }

    .input-group :is(select:focus, select:valid)~label {
        transform: translateY(-50%)scale(.9);
        margin: 0em;
        padding: 0em 0.4em;
        margin-left: 0.1em;
        background-color: #f1f1f1ff;
    }
</style>