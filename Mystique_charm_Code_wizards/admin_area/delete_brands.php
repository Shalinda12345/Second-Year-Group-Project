<?php 
if(isset($_GET['delete_brands'])){
    $delete_brands=$_GET['delete_brands'];
    //echo $delete_brand;

    $delete_query="delete from `brands` where brand_id=$delete_brands";
    $result=mysqli_query($con, $delete_query);
    if($result){
        echo "<script>alert('Brand is been Deleted succesfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>