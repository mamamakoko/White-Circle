<div class="bg">
    <div class="separator">
        <div class="text">
            <div class="cont-navigation">
                <p>Customers</p>
            </div>
        </div>
    </div>

    <hr>
    <div class="separator">
        <div class="data-container">
            <?php
            // Fetch data from the database
            $sql = "SELECT * FROM `customers`";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <!-- <th>Password</th> -->
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Create Time</th>
                        <th>Update Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php echo $result->Customers_ID ?>
                            </td>
                            <td>
                                <?php echo $result->Customers_Email ?>
                            </td>
                            <!-- <td>
                                <?php
                                // echo $result->Customers_Password
                                ?>
                            </td> -->
                            <td>
                                <?php echo $result->Customers_FirstName ?>
                            </td>
                            <td>
                                <?php echo $result->Customers_LastName ?>
                            </td>
                            <td>
                                <?php echo $result->Customers_Phone ?>
                            </td>
                            <td>
                                <?php echo $result->create_time ?>
                            </td>
                            <td>
                                <?php echo $result->update_time ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<style>
    .separator {
        padding: 2%;
    }

    .data-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #888888;
        margin-top: 10px;
        overflow-x: auto;
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
        flex-direction: column;
        /* add this */
        align-items: center;
    }





    .edit-pro-button {
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

    .delete-pro-button {
        background-color: #e71d36;
        border: none;
        padding: 5px 10px;
        border-radius: 50px;
        cursor: pointer;
        font-size: 13px;
        font-weight: bold;
        color: white;
    }

    .delete-pro-button:hover {
        background-color: #b3121f;
    }

    /* Responsive layout for the table */
    @media only screen and (max-width: 600px) {
        table {
            font-size: 12px;
        }

        th,
        td {
            padding: 5px;
        }

        .edit-pro-button,
        .delete-pro-button {
            font-size: 12px;
            padding: 3px 5px;
            margin: 5px;
        }
    }
</style>

<script>

</script>