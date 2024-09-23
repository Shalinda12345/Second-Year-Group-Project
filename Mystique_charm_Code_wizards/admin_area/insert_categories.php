<?php
include("../includes/connect.php");
if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];

    // Select  data from Database
    $select_query = "Select * from `categories` where category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This category is present inside the database.')</script>";
    } else {
        $insert_query = "insert into `categories` (category_title) values ('$category_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('Category has been inserted successfully.')</script>";
        }
    }
}

?>

<div class="admin_add_main">
    <div>
        <h3 class="View_admin_segment01">Add Categories</h3>
    </div>

    <form action="" method="post" class="mb-2 mt-5">
        <div class="input-group w-90 mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="categories" aria-describedby="basic-addon1">
        </div>
        <div class="input-group w-10 mb-2">

            <input type="submit" class="admin_add_main_btn" name="insert_cat" value="Add Categories">

        </div>
    </form>
</div>