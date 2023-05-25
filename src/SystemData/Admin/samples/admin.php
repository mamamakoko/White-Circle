<?php
session_start();
error_reporting(0);

include('./dbcon.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bag Store Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Bag Store Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reports</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-shopping-bag"></i> Orders
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-boxes"></i> Products
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-users"></i> Customers
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-chart-bar"></i> Reports
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Sales Overview</h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-header">Today's Sales</div>
                                    <div class="card-body">
                                        <h5 class="card-title">$5,234</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-header">This Week's Sales</div>
                                    <div class="card-body">
                                        <h5 class="card-title">$22,645</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card text-white bg-danger mb-3">
                                    <div class="card-header">This Month's Sales</div>
                                    <div class="card-body">
                                        <h5 class="card-title">$94,762</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Top Products</h5>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Sales</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Leather Tote Bag</td>
                                                    <td>345</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Nylon Backpack</td>
                                                    <td>234</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Crossbody Satchel</td>
                                                    <td>165</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Recent Orders</h5>
                                        <ul class="list-group">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                Order #3456
                                                <span class="badge badge-primary badge-pill">$45.99</span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                Order #3455
                                                <span class="badge badge-primary badge-pill">$78.50</span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                Order #3454
                                                <span class="badge badge-primary badge-pill">$21.00</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>











<!-- <!DOCTYPE html>

                                        <html>

                                        <head>
                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                            <link rel="stylesheet" href="./Admin/Admin.css">
                                            <script src="./Admin/Admin.js"></script>
                                            <title>admin monitoring input</title>
                                        </head>

                                        <body>
                                            <div class="box">
                                                <?php
                                                //  include './Admin/Category.php';
                                                ?>
                                            </div>
                                            <div class="box">
                                                <?php
                                                //  include './Admin/ProductImage.php';
                                                ?>
                                            </div>
                                            <div class="box" style="width: 100%; height: 100%;">
                                                <?php
                                                //  include './Admin/Product.php'; 
                                                ?>
                                            </div>
                                        </body>

                                        </html> -->