<div>
    <h3 class="View_admin_segment01">All Users</h3>
</div>
<table class="table table-bordered mt-5">
    <thead>
        <?php
        $get_payments = "select * from `user_table`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);


        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
        } else {
            echo "<tr>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Serial Number</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Username</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>User Email</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%;  width:30%; padding-bottom:2%; background-color:#e6e5e0;'>User Image</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>User Address</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>User Mobile</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Delete</th>
    </tr>
</thead>
<tbody>";
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $user_id = $row_data['user_id'];
                $username = $row_data['username'];
                $user_email = $row_data['user_email'];
                $user_image = $row_data['user_image'];
                $user_address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];
                $number++;
                echo "<tr>
        <td style='text-align: center; cursor:default;'><b>$number</b></td>
        <td style='text-align: center; cursor:default;'>$username</td>
        <td style='text-align: center; cursor:default;'>$user_email</td>
        <td style='text-align: center; cursor:default;'><img src='../users_area/user_images/$user_image' alt='$username' class='admin_vw_prd_imgs'/></td>
        <td style='text-align: center; cursor:default;'>$user_address</td>
        <td style='text-align: center; cursor:default;'>$user_mobile</td>
        <td style='text-align: center;'><a href='index.php?delete_user=$user_id' <i class='fa-solid fa-trash text-dark'></i></a></td>
        </tr>";
            }
        }

        ?>
        </tbody>
</table>