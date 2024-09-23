<!-- Connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Website</title>
    <!-- Bootstrap CSS Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS File-->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first Child-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <img src="./images/Logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                        </li>";
                        } else {
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>

                    </ul>

                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-dark" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>


        <!-- calling cart function -->
        <?php
        cart();
        ?>

        <!-- Second child -->
        <nav class="profile_navbar">
            <ul class="navbar-nav">

                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <p class='welcome'>Welcome to Mystique Charm,</p>
                    <p class='guest'>Guest</p>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <p class='welcome'>Welcome to Mystique Charm,</p>
                    <a class='nav-link' href='./users_area/profile.php'><p class='guest'>" . $_SESSION['username'] . "</p></a>
                </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<a class='nav-link' href='./users_area/user_login.php'>
                    <button class='logout_btn'>Login</button>
                </a>";
                } else {
                    echo "<a class='nav-link' href='./users_area/logout.php'>
                    <button class='logout_btn'>Logout</button>
                    </a>";
                }
                ?>
            </ul>
        </nav>

        <!--Image-->
        <div class="index_bg_img">
            <img src="./images/index_bg_img.png" alt="background_image" class="index_bg_image">
        </div>

        <div class="index_heading">
            <p class="line_one">A beauty that never</p>
            <p class="line_two">Fades.</p>
        </div>

        <!-- Segment 01-->
        <div class="segment01">
            <a href="display_all.php">
                <h3 class="Seg01_heading1">Shop by Categories</h3>
            </a>
            <p class="Seg01_heading2">Explore as you desire.</p>

            <!--Divider-->
            <hr class="Divider">


            <!-- Category Grid -->
            <div class="row">
                <div class="column">
                    <img src="./images/index_cat_01.jpg" alt="" class="index_category_img_1">
                    <button class="index_category_btn_1">
                        <?php
                        getcream();
                        ?>
                    </button>
                </div>
                <div class="column">
                    <img src="./images/index_cat_02.jpg" alt="" class="index_category_img_2">
                    <button class="index_category_btn_2">

                        <?php
                        getshampoo();
                        ?>
                    </button>
                    <img src="./images/index_cat_03.jpg" alt="" class="index_category_img_3">
                    <button class="index_category_btn_3">
                        <?php
                        getperfume();
                        ?>
                    </button>
                </div>
            </div>
        </div>


        <!-- Segment 02-->
        <div class="segment02">
            <h3 class="Seg02_heading1">Our Products</h3>
            <p class="Seg02_heading2">The endless space of beauty.</p>

            <!--Divider-->
            <hr class="Divider1">

            <!-- Fourth Child-->
            <div class="row px-1">
                <div class="col-md-10">
                    <!-- Products-->
                    <div class="row px-3">
                        <!-- Fetching Products -->
                        <?php
                        // Calling Function
                        getproducts();
                        get_unique_categories();
                        get_unique_brands();
                        // $ip = getIPAddress();
                        // echo 'User Real IP Address - ' . $ip;
                        ?>
                        <!-- row end -->
                    </div>
                    <!-- col end -->
                </div>
            </div>


            <!-- Last Child -->
            <?php
            include("./includes/footer.php");
            ?>

            <!-- Bootstrap JS Link-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>