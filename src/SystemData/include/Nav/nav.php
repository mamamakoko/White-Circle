<ul>
    <li>
        <a href="./">
            <span class="links_name">All</span>
        </a>
    </li>
    <?php
    $sql = "SELECT * FROM `categories`";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $Categories_Name = htmlentities($result->Categories_Name);
            $Categories_ID = htmlentities($result->Categories_ID);
            $url = "./?page=src/SystemData/include/Cat/&cat012={$Categories_ID}";
            ?>
            <li>
                <a href="<?php echo $url ?>">
                    <span class="links_name">
                        <?php echo $Categories_Name ?>
                    </span>
                </a>
            </li>
            <?php
            $cnt++;
        }
    } else {
        echo "No categories found.";
    }

    ?>

</ul>