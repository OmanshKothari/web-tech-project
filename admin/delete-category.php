<?php
    include('../config/constants.php');

    // 1. Get the id of the admin to be deleted
    $id = $_GET['id'];
    // 2. Create a sql query to delete admin
    $sql = "DELETE FROM tb_category WHERE id = $id";
    // Executing query
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    // 3. Redirect to manage-admin.php page with message("Success or Error")
    if($res){
        $_SESSION['delete'] = 'Category Deleted Successfully!';
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-categories.php');
    }
    else{
        $_SESSION['delete'] = 'Failed to Delete Category' . mysqli_error($conn);
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-categories.php');
    }
?>