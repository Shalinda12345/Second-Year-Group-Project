<?php
include("../includes/connect.php");
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // Select  data from Database
    $select_query = "Select * from `brands` where brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This brand is present inside the database.')</script>";
    } else {
        $insert_query = "insert into `brands` (brand_title) values ('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been inserted successfully.')</script>";
        }
    }
}

?>
<div class="admin_add_main">
    <div>
        <h3 class="View_admin_segment01">Add Brand</h3>
    </div>

    <form action="" method="post" class="mb-2 mt-5">
        <div class="input-group w-90 mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brand_title" placeholder="Enter a new Brand" aria-label="brands" aria-describedby="basic-addon1">
        </div>
        <div>
            <input type="submit" class="admin_add_main_btn" name="insert_brand" name="insert_brand" value="Add Brand">
        </div>
    </form>
</div>