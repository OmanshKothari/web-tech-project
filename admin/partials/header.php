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
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <!-- Menu Section Starts -->
    <div class="menu text-center">
        <div class="wrapper m-bg">
            <div class="links">
                <a href="index.php">Home</a>
                <a href="manage-admin.php">Admin</a>
                <a href="manage-categories.php">categories</a>
                <a href="manage-food.php">food</a>
                <a href="manage-order.php">order</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>