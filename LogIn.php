<?php
ob_start();
include('config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/admin-login.css">
        <link href="https://fonts.googleapis.com/css2?family=Kirang+Haerang&family=Sunflower:wght@300&display=swap" rel="stylesheet">
        <title>Nursery Site</title>
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
                <input type="text" name="username" placeholder="Enter Username" autocomplete="off" maxlength="20">
                <input type="password" name="password" placeholder="Enter Password" minlength="8" maxlength="20">
    
                <input type="submit" name="submit" value="Login" id="submit">
                <label for="sign-up">Do not have an account? </label><a href="signup.php">Sign Up</a>
                <a href="<?php echo SITEURL ?>">Go back home</a>
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
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

        // Execute Query 

        $res = mysqli_query($conn, $sql);

        if($res){
            $count = mysqli_num_rows($res);
            if($count == 1){
                // USER CONFIRMED
                $_SESSION['login-msg'] = "<div class='success'>You Logged in Successfully!!</div>";
                $_SESSION['user'] = $username;
                // Redirect to home page
                header('location:'.SITEURL);
            }
            else{
                // INVALID LOGIN
                $_SESSION['err-login'] = "<div class='failure'>Invalid Username or Password</div>";
                // Redirect to same page
                header('location:'.SITEURL.'LogIn.php');
            }
        }

    }
?>