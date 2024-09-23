<div>
    <h3 class="View_admin_segment01">All Orders</h3>
</div>
<table class="table table-bordered mt-5">
    <thead>
        <?php
        $get_orders="select * from `user_orders`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);
        

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
}else{
    echo "<tr>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Serial Number</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Due Amount</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Invoice Number</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Total Products</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Order Date</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Status</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Delete Option</th>
    </tr>
</thead>
<tbody>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo "<tr>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'><b>$number</b></td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$amount_due</td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$invoice_number</td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$total_products</td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$order_date</td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$order_status</td>
        <td style='text-align: center; padding-top: 1%; padding-bottom:1%;'><a href='' <i class='fa-solid fa-trash text-dark'></i></a></td>
        </tr>";
    }
}
        ?>      
    </tbody>
</table>