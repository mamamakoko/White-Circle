<div class="navigation">
    <h1 class="box-title">Category</h1>
    <button class="add-button" id="add-category-button">+</button>
</div>

<div class="modal" id="add-category-modal">
    <div class="modal-content">
        <span class="close"></span>

        <form id="add-category-form" method="post" action="./functions.php">
            <input type="text" placeholder="Add Category" name="categoryname" required>
            <button type="submit" name="addcategory">Add Category</button>
        </form>

    </div>
</div>

<script src="./Admin/Admin.js"></script>

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
            <script src="./Admin/Admin.js"></script>
        <?php endforeach; ?>
    </tbody>


    <div class="modal2" id="category-modal">
        <div class="modal-content">
            <span class="close"></span>

            <form id="edit-category-form" method="post" action="./functions.php">
                <div style="display: flex;">
                    <input style="width: 10%; padding: 0; text-align: center;" class="edit-category-input" type="number"
                        placeholder="Category ID" name="categoryid"
                        value="<?php echo trim(htmlentities($result->Categories_ID)); ?>" readonly />

                    <input class="edit-category-input" type="text" placeholder="Category Name" name="categoryname"
                        value="<?php echo trim(htmlentities($result->Categories_Name)); ?>" required />
                </div>
                <button class="edit-category-button" type="submit" name="editcategory">Save Changes</button>
            </form>
        </div>
    </div>


</table>