<?php
    include('../config/constants.php');

    // 1. Get the id of the order to be deleted
    $id = $_GET['id'];
    // 2. Create a sql query to delete order
    $sql = "DELETE FROM tb_order WHERE id = $id";
    // Executing query
    $res = mysqli_query($conn, $sql);
    // 3. Redirect to manage-order.php page with message("Success or Error")
    if($res){
        $_SESSION['delete'] = 'Order Deleted Successfully!';
        // REDIRECT PAGE to manage-order
        header('location:' . SITEURL . 'admin/manage-order.php?class=success');
    }
    else{
        $_SESSION['delete'] = 'Failed to Delete Order' . mysqli_error($conn);
        // REDIRECT PAGE to manage-order
        header('location:' . SITEURL . 'admin/manage-order.php?class=failure');
    }
?>