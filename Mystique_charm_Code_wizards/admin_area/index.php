<!-- Connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap css Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS File-->
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <!-- Navbar-->
    <div class="container-admin_index">
        <!-- First Child-->
        <nav class="navbar navbar-expand-lg align-center">
            <div class="container-fluid">
                <img src="../images/Logo.png" alt="" class="logo">

                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<p class='Adminheader'>Welcome Guest</p>";
                } else {
                    echo "<p class='Adminheader'>Welcome <b>" . $_SESSION['username'] . "</b></p>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<p class='nav-item'>
                    <a class='nav-link' href='../users_area/user_login.php'>Login</a>
                </p>";
                } else {
                    echo "<p class='nav-item'>
                    <a class='nav-link' href='../admin_area/admin_login.php'><button class='logout_btn_admin'>Logout</button></a>
                </p>";
                }
                ?>
            </div>
        </nav>

        <!-- Segment 01-->
        <div class="Index_segment_01">
            <a href="index.php"><h3 class="Admin">ADMIN</h3></a>
            <h3 class="Dashboard">Dashboard</h3>
        </div>

        <!--Above the image-->
        <div class="Background_extend">
            <span class="dot"></span>
            <p class="active">Active</p>
        </div>

        <!-- Admi functionality buttons-->
        <div>
            <img src="../images/Admin_image.jpg" class="admin_image">

            <!--wording-->
            <p class="admin_wording">Control<br>your own<br><b>Business</b></p>
        </div>

        <div>
            <table class="admin_btn">
                <tr>
                    <td style="padding: 15px;"><button class="btn1"><a href="insert_product.php" style="color: #282828;">Add Products</a></button></td>
                    <td style="padding: 15px;"><button class="btn1"><a href="index.php?view_products#view_products" style="color: #282828;">View Products</a></button></td>
                    <td style="padding: 15px;"><button class="btn1"><a href="index.php?list_orders#list_orders" style="color: #282828;">All Orders</a></button></td>
                </tr>
                <tr>
                    <td style="padding: 15px;"><button class="btn1"><a href="index.php?insert_category#insert_category" style="color: #282828;">Add Categories</a></button></td>
                    <td style="padding: 15px;"><button class="btn1"><a href="index.php?view_categories#view_categories" style="color: #282828;">View Categories</a></button></td>
                    <td style="padding: 15px;"><button class="btn1"><a href="index.php?list_payments#list_payments" style="color: #282828;">All Payments</a></button></td>
                </tr>
                <tr>
                    <td style="padding: 15px;"><button class="btn1"><a href="index.php?insert_brands#insert_brands" style="color: #282828;">Add Brand</a></button></td>
                    <td style="padding: 15px;"><button class="btn1"><a href="index.php?view_brands#view_brands" style="color: #282828;">View Brands</a></button></td>
                    <td style="padding: 15px;"><button class="btn1"><a href="index.php?list_users#list_users" style="color: #282828;">All Users</a></button></td>
                </tr>
            </table>
        </div>

    </div>

    <!-- Fourth Child -->
    <div class="contain">

        <?php
        if (isset($_GET['insert_category'])) {
            echo '<div id="insert_category">';
            include('insert_categories.php');
            echo '</div>';
        }
        if (isset($_GET['insert_brands'])) {
            echo '<div id="insert_brands">';
            include('insert_brands.php');
            echo '</div>';
        }
        if (isset($_GET['view_products'])) {
            echo '<div id="view_products">';
            include('view_products.php');
            echo '</div>';
        }
        if (isset($_GET['edit_products'])) {
            echo '<div id="edit_products">';
            include('edit_products.php');
            echo '</div>';
        }
        if (isset($_GET['delete_product'])) {
            include('delete_product.php');
        }
        if (isset($_GET['delete_user'])) {
            include('delete_user.php');
        }
        if (isset($_GET['view_categories'])) {
            echo '<div id="view_categories">';
            include('view_categories.php');
            echo '</div>';
        }
        if (isset($_GET['view_brands'])) {
            echo '<div id="view_brands">';
            include('view_brands.php');
            echo '</div>';
        }
        if (isset($_GET['edit_category'])) {
            include('edit_category.php');
        }
        if (isset($_GET['edit_brands'])) {
            include('edit_brands.php');
        }
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        }
        if (isset($_GET['delete_brands'])) {
            include('delete_brands.php');
        }
        if (isset($_GET['list_orders'])) {
            echo '<div id="list_orders">';
            include('list_orders.php');
            echo '</div>';
        }
        if (isset($_GET['list_payments'])) {
            echo '<div id="list_payments">';
            include('list_payments.php');
            echo '</div>';
        }
        if (isset($_GET['list_users'])) {
            echo '<div id="list_users">';
            include('list_users.php');
            echo '</div>';
        }

        ?>
    </div>


    <!-- footer -->
    <?php
    include("../includes/footer.php");
    ?>


    <!-- Bootstrap js Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>