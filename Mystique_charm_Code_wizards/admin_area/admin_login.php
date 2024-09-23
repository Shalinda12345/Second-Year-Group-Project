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
    <title>Admin Login</title>
    <!-- Bootstrap css Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS File-->
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <img class="login_logo" src="../images/Logo.png">

    <div class="admin_login_container">
        <h2 class="admin_login_user">Admin</h2>
        <h2 class="admin_login_login">Login</h2>

        <div>
            <div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="username" class="admin_username">Username</label>
                        <input type="text" id="admin_login_username" name="username" placeholder="Enter Your Username" require="required" class="form-control">
                    </div>
                    <div>
                        <label for="password" class="admin_password">Password</label>
                        <input type="password" id="admin_login_password" name="password" placeholder="Enter Your Password" require="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" value="Login" class="Login_btn" name="admin_login">
                        <p class="admin_login_account">Are you a User?</p>
                        <p class="admin_login_register"><a href="../users_area/user_login.php" class="text-white">Login Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>



<?php
if (isset($_POST['admin_login'])) {
    $admin_name = $_POST['username'];
    $admin_password = $_POST['password'];

    $select_query = "select * from `admin_table` where admin_name='$admin_name'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();



    if ($row_count > 0) {
        $_SESSION['username'] = $admin_name;
        if (password_verify($admin_password, $row_data['admin_password'])) {
            //echo "<script>alert('Logged in Successfully')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username'] = $admin_name;
                echo "<script>alert('Logged in Successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                echo "<script>alert('Invalid Credentials')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>