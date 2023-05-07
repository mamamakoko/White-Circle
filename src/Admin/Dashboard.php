<?php
// Count the number of records in the tables
$sql_accounts = "SELECT COUNT(*) as count FROM customers";
$sql_products = "SELECT COUNT(*) as count FROM products";
// $sql_orders = "SELECT COUNT(*) as count FROM orders";
$sql_categories = "SELECT COUNT(*) as count FROM categories";

$stmt_accounts = $dbh->query($sql_accounts);
$stmt_products = $dbh->query($sql_products);
// $stmt_orders = $dbh->query($sql_orders);
$stmt_categories = $dbh->query($sql_categories);

$result_accounts = $stmt_accounts->fetch(PDO::FETCH_ASSOC);
$result_products = $stmt_products->fetch(PDO::FETCH_ASSOC);
// $result_orders = $stmt_orders->fetch(PDO::FETCH_ASSOC);
$result_categories = $stmt_categories->fetch(PDO::FETCH_ASSOC);

// Display the results in the HTML markup
?>
<div class="bg">
    <div class="separator" style=" padding: 2%;">
        <div class="text">Dashboard</div>
    </div>
    <hr>
    <div class="separator">
        <div class="container-fluid ">
            <div class="row">
                <div class="column">
                    <div class="card">
                        <div class="circle">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="bx-Info">
                            <div class="label">
                                Accounts
                            </div>
                            <div class="count">
                                <?php echo $result_accounts['count']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="circle">
                            <i class="bx bx-box"></i>
                        </div>
                        <div class="bx-Info">
                            <div class="label">
                                Products
                            </div>
                            <div class="count">
                                <?php echo $result_products['count']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="circle">
                            <i class="bx bx-basket"></i>
                        </div>
                        <div class="bx-Info">
                            <div class="label">
                                Orders
                            </div>
                            <div class="count">
                                <?php
                                // echo $result_orders['count']; 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="circle">
                            <i class="bx bx-grid-alt"></i>
                        </div>
                        <div class="bx-Info">
                            <div class="label">
                                Category
                            </div>
                            <div class="count">
                                <?php echo $result_categories['count']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>