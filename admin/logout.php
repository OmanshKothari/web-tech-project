<?php
    include('../config/constants.php');
    // Destroy the session [delete all the session variables]
    session_destroy();
    // Redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>