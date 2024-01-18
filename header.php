<?php
session_start();
include 'db.php';

if (isset($_SESSION['user'])) {
    $data = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Scrap and creatives</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="index.php" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">Creative</span>ScrapYard</h1>
            </a>
        </div>
        <div class="col-lg-5 col-6 text-left">
            <!--  <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
-->
        </div>
        <div class="col-lg-4 col-6 text-right">

            <?php

            if (isset($data)) {

                echo '<h6 style="text-transform:capitalize;">Welcome ' . $data['name'];
                echo '<br>';
                echo '<a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';


            } else {
                echo ' <a style="color:red" href="login.php" class="btn border">
                Login

            </a>';


            }

            ?>

            <a href="login-valid.php">
                <button type="button" class="btn btn-warning rounded-btn">+ Sell Product</button>

            </a>

        </div>

    </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-0 d-none d-lg-block">

                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">

                </nav>
            </div>
            <div class="col-lg-12">

                <?php
                if (!isset($hide_menu)) {
                    ?>
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="" class="text-decoration-none d-block d-lg-none">
                            <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                    class="text-primary font-weight-bold border px-3 mr-1">s</span>Scrap</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php" class="nav-item nav-link active">Home</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Creative</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <?php

                                        $q = "select * from product_cat where type='creative'";
                                        $res = mysqli_query($conn, $q);
                                        while ($data = mysqli_fetch_array($res)) {
                                            ?>

                                            <a href="products-category.php?id=<?php echo $data['cat_id']; ?>"
                                                class="dropdown-item"><?php echo $data['cat_name']; ?></a>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Scrap</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <?php

                                        $q = "select * from product_cat where type='scrap'";
                                        $res = mysqli_query($conn, $q);
                                        while ($data = mysqli_fetch_array($res)) {
                                            ?>

                                            <a href="products-category.php?id=<?php echo $data['cat_id']; ?>"
                                                class="dropdown-item"><?php echo $data['cat_name']; ?></a>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <a href="shop.php" class="nav-item nav-link">Shop</a>
                                <!--  <a href="#" class="nav-item nav-link">Shop Detail</a>-->
                                <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div> -->
                                <a href="contact.php" class="nav-item nav-link">Contact</a>
                                <a href="order.php" class="nav-item nav-link">Order Detail</a>
                            </div>
                            <div class="col-lg-3 col-6 text-right">

                                <?php
                                $total = 0;
                                if (isset($_SESSION['user'])) {
                                    $data = $_SESSION['user'];
                                    $user_id = $data['user_id'];

                                    $q1 = "select * from wish where user_id='$user_id'";
                                    $res1 = mysqli_query($conn, $q1);
                                    $total = mysqli_num_rows($res1);
                                }

                                ?>
                                <a href="wish.php" class="btn border">
                                    <i class="fas fa-heart text-primary"></i>
                                    <span class="badge">
                                        <?php echo $total; ?>
                                    </span>
                                </a>


                                <?php
                                $total = 0;
                                if (isset($_SESSION['user'])) {
                                    $data = $_SESSION['user'];
                                    $user_id = $data['user_id'];

                                    $q2 = "select * from cart where user_id='$user_id'";
                                    $res2 = mysqli_query($conn, $q2);
                                    $total = mysqli_num_rows($res2);
                                }

                                ?>
                                <a href="cart.php" class="btn border">
                                    <i class="fas fa-shopping-cart text-primary"></i>
                                    <span class="badge">
                                        <?php echo $total; ?>
                                    </span>
                                </a>

                            </div>


                        </div>

                    </nav>
                    <?php
                }
                ?>