<?php
    include('../config/constants.php');

    // 1. Get the id of the food to be deleted
    $id = $_GET['id'];
    // 2. Create a sql query to delete food
    $sql = "DELETE FROM tb_food WHERE id = $id";
    // Executing query
    $res = mysqli_query($conn, $sql);
    // 3. Redirect to manage-food.php page with message("Success or Error")
    if($res){
        $_SESSION['delete'] = 'Food Deleted Successfully!';
        // REDIRECT PAGE to manage-food
        header('location:' . SITEURL . 'admin/manage-food.php?class=success');
    }
    else{
        $_SESSION['delete'] = 'Failed to Delete Admin' . mysqli_error($conn);
        // REDIRECT PAGE to manage-food
        header('location:' . SITEURL . 'admin/manage-food.php?class=failure');
    }
?>