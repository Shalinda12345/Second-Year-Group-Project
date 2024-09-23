<?php

// including connect file
//include ('./includes/connect.php');

// getting products
function getproducts()
{
    global $con;

    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand() limit 0 ,6";
            $result_query = mysqli_query($con, $select_query);
            //$row=mysqli_fetch_assoc($result_query);
            //echo $row['product_title'];
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_id=$row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='index_card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price : $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }
}

// get all products
function get_all_products()
{
    global $con;

    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            //$row=mysqli_fetch_assoc($result_query);
            //echo $row['product_title'];
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_id=$row['product_keywords'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price : $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
            }
        }
    }
}

// getting unique categories
function get_unique_categories()
{
    global $con;
    //condition to check isset or not
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No Stock for this category</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            //$product_id=$row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price : $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}

// getting unique brands
function get_unique_brands()
{
    global $con;
    //condition to check isset or not
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>This Brand Available for Service</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            //$product_id=$row['product_keywords'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price : $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='#' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}

// Displaying Brands in sideNav
function getbrands()
{
    global $con;
    $select_brands = "Select * from `brands`";
    $result_brands = mysqli_query($con, $select_brands);
    //$row_data=mysqli_fetch_assoc($result_brands);
    //echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
                            <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                        </li>";
    }
}

// displaying categories in sidenav
function getcategories()
{
    global $con;
    $select_categories = "Select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);
    //$row_data=mysqli_fetch_assoc($result_brands);
    //echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
                            <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                        </li>";
    }
}


function getshampoo()
{
    global $con;
    $select_shampoo = "Select * from `categories` where category_title='Shampoo'";
    $result_shampoo = mysqli_query($con, $select_shampoo);
    if ($result_shampoo) {
        echo "<a href='display_all.php?category=1' class='nav-link text-light'>Shampoo</a> ";
    }
}

function getcream()
{
    global $con;
    $select_cream = "Select * from `categories` where category_title='Cream'";
    $result_cream = mysqli_query($con, $select_cream);
    if ($result_cream) {
        echo "<a href='display_all.php?category=2' class='nav-link text-light'>Cream</a> ";
    }
}

function getperfume()
{
    global $con;
    $select_perfume = "Select * from `categories` where category_title='Perfume'";
    $result_perfume = mysqli_query($con, $select_perfume);
    if ($result_perfume) {
        echo "<a href='display_all.php?category=3' class='nav-link text-light'>Perfume</a> ";
    }
}



// search product
function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No result Match for your Search</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Price : $product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}

// view details funtion
function view_details()
{
    global $con;

    //condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];

                $select_query = "select * from `products` where product_id=$product_id";
                $result_query = mysqli_query($con, $select_query);

                if ($result_query && mysqli_num_rows($result_query) > 0) {
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        //$product_id=$row['product_keywords'];
                        $product_image1 = $row['product_image1'];
                        $product_image2 = $row['product_image2'];
                        $product_image3 = $row['product_image3'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];

                        $select_brands = "SELECT brand_title FROM `brands` WHERE brand_id=$brand_id";
                        $result_brands = mysqli_query($con, $select_brands);

                        if ($product_id < 10) {
                            //$product_id = str_pad($product_id, 2, '0', STR_PAD_LEFT);
                            $product_id = "0" . "$product_id";
                        }else{
                            $product_id = $product_id;
                        }


                        if ($result_brands && mysqli_num_rows($result_brands) > 0) {
                            $brand_row = mysqli_fetch_assoc($result_brands);
                            $brand_name = $brand_row['brand_title'];

                            echo "<div class='card_proview_header1'>
                            <img src='./admin_area/product_images/$product_image1' class='card_view_img' alt='$product_title'>
                            <div class='card-body'>
                                <p class='product_name'>$product_title</p>
                                <p class='description'>$product_description</p>
                                <p class='product_price'>$product_price.00</p>
                                <p class='product_id'>$product_id</p>
                                <p class='brand_name'>$brand_name</p>
                                <a href='index.php?add_to_cart=$product_id' class='Add_Cart_btn'>Add to Cart</a>
                                <a href='index.php' class='Go_home_btn'>Home</a>
                        </div>
                    </div>
                        
                    <div>
                        <p class='bg_brand_name'>$brand_name</p>
                    </div>
                    
                    <div class='related_imgs'>
                        <div>
                        <!-- related image -->
                            <div class='row'>
                                 <div class='col-md-12'>
                                <h4 class='related_prod_header'>Related Images</h4>
                                  </div>
                                  <div class='col'>
                                  <img src='./admin_area/product_images/$product_image2' class='card-img-top'
                                    alt='$product_title'>
                                </div>
                                <div class='col'>
                                   <img src='./admin_area/product_images/$product_image3' class='card-img-top'
                                    alt='$product_title'>
                                     </div>
                                </div>
                         </div>
                    </div>";
                        } else {
                            echo "<p class='text-danger'>Brand not found.</p>";
                        }
                    }
                } else {
                    echo "<p class='text-danger'>Product not found.</p>";
                }
            }
        }
    }
}


// get ip address funtion
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;

// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_ip = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_ip";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ('$get_product_ip', '$get_ip_add', 0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('item is added to cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}

// function to get cart item numbers
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add' ";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add' ";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

//total price function
function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "select * from `products` where product_id='$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}


// get user order details
function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if ($row_count > 0) {
                        echo "<h3 class='text-center text-success'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    } else {
                        echo "<h3 class='text-center text-success'>You have zero pending orders</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
                    }
                }
            }
        }
    }
}
