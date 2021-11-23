<?php
    // Starting the session --> session is like a variable whose values can be 
    // accessed anywhere within the site and it's value are stored as long as browser is open
    
    session_start();

    // Establishing Connection to he Database
    // Creating constants --> constants are named all uppercase
    define('SITEURL', 'http://localhost/nursery/');
    define('LOCALHOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', 'Omansh@123');
    define('DBNAME', 'nursery');

    $conn = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DBNAME) or die(mysqli_connect_error());
?>