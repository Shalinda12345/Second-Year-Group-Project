<div>
    <h3 class="View_admin_segment01">View Categories</h3>
</div>
<table class="table table-bordered mt-5 text-center">
    <thead>
        <tr>
            <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Serial Number</th>
            <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Category Title</th>
            <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Edit</th>
            <th class="admin_vw_prd_th" style="padding-top: 2%; padding-bottom:2%; background-color:#e6e5e0;">Delete</th>
        </tr>
    </thead>
    <tbody class="text-light">
        <?php
        $select_cat = "select * from `categories`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;

        ?>
            <tr>
                <td style="text-align: center; cursor:default;"><b><?php echo $number; ?></b></td>
                <td style="text-align: center; cursor:default;"><?php echo $category_title; ?></td>
                <td style="text-align: center;"><a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td style="text-align: center;"><a href='index.php?delete_category=<?php echo $category_id; ?>' type="button" class='text-dark' data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body" style="cursor: default;">
                <h4>Are you sure you want to delete this?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_categories" class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-primary"><a href='index.php?delete_category=<?php echo $category_id ?>' class="text-light text-decoration-none">Yes</a></button>
            </div>
        </div>
    </div>
</div>