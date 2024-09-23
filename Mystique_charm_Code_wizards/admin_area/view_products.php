<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <!-- Bootstrap CSS Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS File-->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h3 class="View_admin_segment01">View Products</h3>
    </div>

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Product ID</th>
                <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Product Title</th>
                <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Product Image</th>
                <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Price (LKR)</th>
                <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Quantity Sold</th>
                <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Status</th>
                <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Edit</th>
                <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get_products = "select * from `products`";
            $result = mysqli_query($con, $get_products);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
            ?>
                <tr>
                    <td style="text-align: center; cursor:default;"><b><?php echo $number; ?></b></td>
                    <td style="text-align: center; width:20%; cursor:default;"><?php echo  $product_title; ?></td>
                    <td style="text-align: center; width: 30%; cursor:default;"><img src='./product_images/<?php echo  $product_image1; ?>' class="admin_vw_prd_imgs"></td>
                    <td style="text-align: center; cursor:default;"><?php echo  $product_price; ?></td>
                    <td style="text-align: center; cursor:default;">
                        <?php
                        $get_count = "select * from `orders_pending` where product_id=$product_id";
                        $result_count = mysqli_query($con, $get_count);
                        $rows_count = mysqli_num_rows($result_count);
                        echo $rows_count;
                        ?>
                    </td>
                    <td style="text-align: center;cursor:default;"><?php echo $status ?></td>
                    <td style="text-align: center;"><a href='index.php?edit_products=<?php echo $product_id; ?>#edit_products' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td style="text-align: center;"><a href='index.php?delete_product=<?php echo $product_id; ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</body>

</html>