<?php
include('../config/constants.php');
include('login-check.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Panel</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <!-- Menu Section Starts -->
    <div class="menu text-center">
        <div class="wrapper m-bg">
            <div class="links">
                <a href="index.php">Home</a>
                <span class="material-icons">admin_panel_settings</span>
                <a href=<?php echo  SITEURL . "admin/manage-admin.php"?>>Admin</a>
                <a href=<?php echo  SITEURL . "admin/manage-categories.php"?>>categories</a>
                <a href=<?php echo  SITEURL . "admin/manage-food.php"?>>food</a>
                <a href=<?php echo  SITEURL . "admin/manage-order.php"?>>order</a>
                <a href=<?php echo  SITEURL . "admin/logout.php"?>>Log Out</a>
            </div>
        </div>
    </div>