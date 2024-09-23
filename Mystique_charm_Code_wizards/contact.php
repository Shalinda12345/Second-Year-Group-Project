
<!-- Connect file -->
<?php
include ('includes/connect.php');
include ('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Website</title>
    <!-- Bootstrap CSS Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS File-->
    <link rel="stylesheet" href="style.css">

    <style>       
    .container {
        max-width: 600px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin: auto;
    }
    input[type=text], input[type=email], textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
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
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
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
                            <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
                        </li>

                    </ul>

                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

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


        <div class="container">
        <h2>Contact Us</h2>
        <form action="" method="post">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your first name.." required>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email.." required>

            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="Subject.." required>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write something.." style="height:200px" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
        
        </div>

        <!-- Last Child -->
        <?php
        include("./includes/footer.php");
        ?>


    </div>

    <!-- Bootstrap JS Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>