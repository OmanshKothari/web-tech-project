<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login : Plant Mart</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="bg-image">
        <div class="filter-blur"></div>
    </div>
    <div class="login">
        <h1>Login</h1>

        <?php
            if(isset($_SESSION['err-login'])){
                echo $_SESSION['err-login'];
                unset($_SESSION['err-login']);
            }
        ?>

        <form action="" method="POST">
            <input type="text" name="username" placeholder="Enter Username" autocomplete="off">
            <input type="password" name="password" placeholder="Enter Password">

            <input type="submit" name="submit" value="Login" id="submit">
        </form>
    </div>
</body>

</html>

<?php
    if(isset($_POST['submit'])){
        // submit button clicked
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // Create SQL query
        $sql = "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'";

        // Execute Query 

        $res = mysqli_query($conn, $sql);

        if($res){
            $count = mysqli_num_rows($res);
            if($count == 1){
                // USER CONFIRMED
                $_SESSION['login-msg'] = "<div class='success'>You Logged in Successfully!!</div>";
                $_SESSION['user'] = $username;
                // Redirect to home page
                header('location:'.SITEURL.'admin/index.php');
            }
            else{
                // INVALID LOGIN
                $_SESSION['err-login'] = "<div class='failure'>Invalid Username or Password</div>";
                // Redirect to same page
                header('location:'.SITEURL.'admin/login.php');
            }
        }

    }
?>