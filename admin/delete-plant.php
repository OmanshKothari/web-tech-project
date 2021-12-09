<?php
    include('../config/constants.php');

    if(!isset($_GET['id']) or !isset($_GET['image_name'])){
        $_SESSION['delete'] = "Unauthorized Access!!";
        header('location:' . SITEURL . 'admin/manage-plant.php?class=failure');
        die();
    }
    else{
        
    // 1. Get the id of the food to be deleted
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Delete image from the server

    $remove_path = '../images/plants/' . $image_name;
    $remove = unlink($remove_path);

    if($remove == False){
        $_SESSION['delete'] = "Image can not be deleted from Server!!";
        header('location:' . SITEURL . 'admin/manage-plant.php?class=failure');
        die();
    }

    // 2. Create a sql query to delete food
    $sql = "DELETE FROM tb_plant WHERE id = $id";
    // Executing query
    $res = mysqli_query($conn, $sql);
    // 3. Redirect to manage-food.php page with message("Success or Error")
    if($res){
        $_SESSION['delete'] = 'Plant Deleted Successfully!!!';
        // REDIRECT PAGE to manage-food
        header('location:' . SITEURL . 'admin/manage-plant.php?class=success');
    }
    else{
        $_SESSION['delete'] = 'Failed to Delete Plant!!!' . mysqli_error($conn);
        // REDIRECT PAGE to manage-food
        header('location:' . SITEURL . 'admin/manage-plant.php?class=failure');
    }
    }
?>