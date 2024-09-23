<div>
    <h3 class="View_admin_segment01">All Payments</h3>
</div>
<table class="table table-bordered mt-5">
    <thead>
        <?php
        $get_payments = "select * from `user_payments`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);


        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No Payments Received yet</h2>";
        } else {
            echo "<tr>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Serial Number</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Invoice Number</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Amount</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Payment Mode</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Order Date</th>
        <th class='admin_vw_prd_th' style='padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;'>Delete</th>
    </tr>
</thead>
<tbody>";
            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $payment_id = $row_data['payment_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $payment_mode = $row_data['payment_mode'];
                $date = $row_data['date'];
                $number++;
                echo "<tr>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$number</td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$invoice_number</td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$amount</td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$payment_mode</td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'>$date</td>
        <td style='text-align: center; cursor:default; padding-top: 1%; padding-bottom:1%;'><a href='' <i class='fa-solid fa-trash text-dark'></i></a></td>
        </tr>";
            }
        }

        ?>

        </tbody>
</table>