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
        <link rel="stylesheet" href="css\SignUp.css">
        <link href="https://fonts.googleapis.com/css2?family=Kirang+Haerang&family=Sunflower:wght@300&display=swap" rel="stylesheet">
        <title>Nursery Site</title>
    </head>
     <body>
         <div class="bg-image"></div>
            <div class="form">
                <form action="" method="post">
                    <h3>Sign Up</h3>
                    <input type="text" name="name" placeholder="Full Name" required><br>
                    <input type="text" name="username" placeholder="Enter a Username" required><br>
                    <input type="email" name="email" placeholder="email" required><br>
                    <input type="password" name="password" placeholder="password" required><br>
                    <input type="text" name="phone" placeholder="phone number" required><br>
                    <input type="submit" name="submit" id="submit" value="Go"><br>
                    <div class="login">Already have an account ?  <a href="LogIn.html">LogIn</a></div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
if(isset($_POST['submit'])){
    // submit button clicked
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Create SQL query
    $sql = "INSERT user SET name = '$name',
            email = '$email',
            phone = '$phone',
             username = '$username',
             password = '$password'";

    // Execute Query 

    $res = mysqli_query($conn, $sql);

    if($res){
            // USER CONFIRMED
            $_SESSION['login-msg'] = "<div class='success'>You Signed Up Successfully!!</div>";
            $_SESSION['user'] = $username;
            // Redirect to home page
            header('location:'.SITEURL.'index.php');
        }
        else{
            // INVALID LOGIN
            $_SESSION['login-msg'] = "<div class='failure'>Error Signing Up!!</div>";
            // Redirect to same page
            header('location:'.SITEURL);
        }
    }
?>