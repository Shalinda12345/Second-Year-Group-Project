<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap CSS Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS File-->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <img class="login_logo" src="../images/Logo.png">
    <img class="Login_bg" src="../images/login_bg.jpeg">
    <div class="login_container">
        <h2 class="login_user">User</h2>
        <h2 class="login_login">Login</h2>
        <div>
            <div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Username field -->
                    <div>
                        <label for="user_username" class="username">Username</label>
                        <input type="text" id="login_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- password field -->
                    <div>
                        <label for="user_password" class="password">Password</label>
                        <input type="password" id="login_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!--login button-->
                    <div>
                        <input type="submit" value="Login" class="Login_btn" name="user_login">
                        <p class="login_account">Don't have an Account?</p>
                        <p class="login_register"><a href="user_registration.php" class="text-danger">Register</a></p>
                        <p class="admin_account">Are you an Admin? Then <a href="../admin_area/admin_login.php" class="text-danger"><b>Login Here</b></a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "select * from `user_table` where username='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();


    // cart item
    $select_query_cart = "select * from `cart_details` where ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            //echo "<script>alert('Logged in Successfully')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Logged in Successfully')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Logged in Successfully')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>