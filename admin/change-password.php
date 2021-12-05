<?php
include('partials/header.php')
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h1>Change Password</h1>

        <div class="text-center">
            <?php
            if (isset($_SESSION['password'])) {
                $class = $_GET['class'];
                echo "<h3 class='$class'>".$_SESSION['password']."</h3>"; // Displaying Session Message
                unset($_SESSION['password']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>

        <form action="" method="POST">
            <table class="text-center">
                <tr>
                    <td>Current Password : </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Enter Current Password ">
                    </td>
                </tr>
                <tr>
                    <td>New Password : </td>
                    <td>
                        <input type="password" name="new_password" placeholder="Enter new password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm New Password : </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Change Password" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
include('partials/footer.php')
?>

<?php
// Process the value from Form and save it in the Database

// Check whether the button is clicked or not

if (isset($_POST['submit'])) {
    // Button Clicked
    $id = $_GET['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);
    
    // Confirm whether new_password and confirm_password are same
    
    if($new_password == $confirm_password){
         // Check whether the current password is correct
        $sql = "SELECT * FROM tb_admin WHERE id=$id AND password = '$current_password'";
        // echo $sql;
        $res = mysqli_query($conn, $sql);
        // Check for response
        if($res){
            $count = mysqli_num_rows($res);
            if($count == 1){
                // Admin exists and current password is correct
                // Query to update password
                $sql2 = "UPDATE tb_admin SET
                    password = '$new_password'
                    WHERE id=$id AND password = '$current_password';
                ";

                // Executing query to save Data
                $res2 = mysqli_query($conn, $sql2);

                if ($res2) {
                // Create a session variable to display the status of query execution
                $_SESSION['password'] = "Password Changed Successfully!";
                // REDIRECT PAGE to manage-admin
                header('location:' . SITEURL . 'admin/manage-admin.php?class=success');
                } else {
                // Create a session variable to display the status of query execution
                $_SESSION['password'] = "Failed to Change Password!";
                    // REDIRECT PAGE to same page
                header('location:' . SITEURL . 'admin/change-password.php?class=failure&id=' . $id);
            }
            }
            else{
                $_SESSION['password'] = "Invalid Password!";
                // REDIRECT PAGE to same page
                header('location:' . SITEURL . 'admin/change-password.php?class=failure&id=' . $id);
            }
    }
    }
    else{
        // echo "Damn it!!";
        $_SESSION['password'] = "New Password and Confirm Password must be Same!!!";
        // REDIRECT PAGE to same page
        header('location:' . SITEURL . 'admin/change-password.php?class=failure&id=' . $id);
    }

   
}

    
?>