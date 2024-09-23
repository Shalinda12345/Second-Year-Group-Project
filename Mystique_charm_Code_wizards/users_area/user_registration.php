<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS File-->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- Registration Segment 01-->
    <div class="Reg_segment01">
        <div class="Registration">
            <h2 class="Reg_User">New User</h2>
            <h2 class="Reg_Registration">Registration</h2>
            <div>
                <div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- Username field -->
                        <div>
                            <label for="user_username" class="reg_lbl_user_username">Username*</label>
                            <input type="text" id="reg_txt_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="user_username">
                        </div>
                        <!-- Email field -->
                        <div>
                            <label for="user_email" class="reg_lbl_user_email">Email*</label>
                            <input type="email" id="reg_txt_email" class="form-control" placeholder="Enter your Email Address" autocomplete="off" required="required" name="user_email">
                        </div>
                        <!-- image field -->
                        <div>
                            <label for="user_image" class="reg_lbl_user_image">User Image</label>
                            <input type="file" id="reg_txt_image" class="form-control" required="required" name="user_image">
                        </div>
                        <!-- password field -->
                        <div>
                            <label for="user_password" class="reg_lbl_user_password">Password*</label>
                            <input type="password" id="reg_txt_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="user_password">
                        </div>
                        <!-- confirm password field -->
                        <div>
                            <label for="user_repassword" class="reg_lbl_user_repassword">Re-type Password*</label>
                            <input type="password" id="reg_txt_repassword" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_user_password">
                        </div>
                        <!-- Address field -->
                        <div>
                            <label for="user_address" class="reg_lbl_user_address">Address*</label>
                            <input type="text" id="reg_txt_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required" name="user_address">
                        </div>
                        <!-- contact field -->
                        <div>
                            <label for="user_contact" class="reg_lbl_user_contact">Contact*</label>
                            <input type="text" id="reg_txt_contact" class="form-control" placeholder="Enter your Contact" autocomplete="off" required="required" name="user_contact">
                        </div>
                        <div>
                            <input type="submit" class="reg_register_btn" value="Register" name="user_register">
                            <p class="reg_Login">Already have an Account? <a href="user_login.php" class="text-danger">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- php code -->
<?php

function validateUsername($username)
{
    return ctype_upper($username[0]);
}

if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // select query
    $select_query = "select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if (!validateUsername($user_username)) {
        echo "<script>alert('Username must start with a capital letter')</script>";
    } else {
        if ($rows_count > 0) {
            echo "<script>alert('Username already exists')</script>";
        } else if ($user_password != $conf_user_password) {
            echo "<script>alert('Password do not match')</script>";
        } elseif (strlen($user_password) < 8) {
            echo "<script>alert('Password must be at least 8 characters long')</script>";
        } else {
            // insert query
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");
            $insert_query = "insert into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) values ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
            $sql_execute = mysqli_query($con, $insert_query);
            if ($sql_execute) {
                echo "<script>alert('Data inserted successfully')</script>";
            } else {
                die(mysqli_error($con));
            }
        }
    }

    // selecting cart items
    $select_cart_items = "select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

?>