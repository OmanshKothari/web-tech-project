<?php 
    // Check whether user is logged in or not
    if(!isset($_SESSION['user'])){
        echo "USER NOT LOGGED IN";
        // if not logged in
        $_SESSION['err-login'] = "<div class='failure'>Please Log in to Place any order.</div>";
        // Redirect to login page
        header('location:'.SITEURL.'LogIn.php');
    }
?>