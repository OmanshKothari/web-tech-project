<!-- Here will be a script which will put the contact form data in database!! -->
<?php
ob_start();
include('config/constants.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact SET name='$username', email='$email', phone='$phone', description='$message'";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        header('location:' . SITEURL);
    } else {
        $_SESSION['contact-err'] = "<div>Sorry we seem to have an error contacting!!!</div>";
        header('location:' . SITEURL);
    }
}
?>