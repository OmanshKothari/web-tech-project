<?php
    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name'])){
        // 1. Get the id of the admin to be deleted
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Delete image form the Database
    $path = '../images/category/' . $image_name;

    $del_image = unlink($path);
    if($del_image == False){
        $_SESSION['delete'] = 'Failed to Delete Category Image from the Database. Aborting operation!!' . mysqli_error($conn);
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-categories.php?class=failure');
        die();
    }
    // 2. Create a sql query to delete admin
    $sql = "DELETE FROM tb_category WHERE id = $id";
    // Executing query
    $res = mysqli_query($conn, $sql);
    // 3. Redirect to manage-admin.php page with message("Success or Error")
    if($res){
        $_SESSION['delete'] = 'Category Deleted Successfully!';
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-categories.php?class=success');
    }
    else{
        $_SESSION['delete'] = 'Failed to Delete Category' . mysqli_error($conn);
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-categories.php?class=failure');
    }
    }
    else{
        $_SESSION['delete'] = 'Failed to Delete Category' . mysqli_error($conn);
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-categories.php?class=failure');
    }
?>