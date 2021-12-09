<?php 
    // Check whether user is logged in or not
    if(!isset($_SESSION['admin'])){
        echo "USER NOT LOGGED IN";
        // if not logged in
        $_SESSION['err-login'] = "<div class='failure'>Please Log in to access Admin Panel.</div>";
        // Redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }
?>