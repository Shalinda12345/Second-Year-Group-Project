<?php
include('../includes/connect.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $select_data = "select * from `user_orders` where order_id=$order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "insert into `user_payments` (order_id, invoice_number, amount, payment_mode) values ($order_id, $invoice_number, $amount, '$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo "<h3 class='text-center text-light'>Successfully completed payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders = "update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result = mysqli_query($con, $update_orders);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment Page</title>
    <!-- Bootstrap CSS Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        option[default] {
            display: none;
        }
    </style>
</head>

<body class="bg-secondary">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-outline my-4 text-center w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number; ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-center text-light">Amount :</label>
                <input type="text" class="form-outline my-4 text-center w-50 m-auto" name="amount" value="<?php echo $amount_due; ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" id="">
                    <option value="" default selected>Select Payment Method</option>
                    <option>Cash on Delivery</option>
                    <option disabled>Netbanking</option>
                    <option disabled>Paypal</option>
                    <option disabled>UPI</option>
                    <option disabled>Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>

</body>

</html>