<?php
include('partials/header.php')
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h1>Add admin</h1>

        <div class="text-center">
            <?php
            if (isset($_SESSION['add_admin'])) {
                $class = $_GET['class'];
                echo "<h3 class='$class'>".$_SESSION['add_admin']."</h3>"; // Displaying Session Message
                unset($_SESSION['add_admin']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>

        <form action="" method="POST">
            <table class="text-center">
                <tr>
                    <td>Full Name : </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name ">
                    </td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your username" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password" minlength="8" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary">
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

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    // Encrypting password
    $password = md5($_POST['password']);

    // SQL query to save Data in Database

    $sql = "INSERT INTO tb_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

    // Executing query to save Data

    // Declaring variable to check whether it the query executes successfully

    $res = mysqli_query($conn, $sql);

    if ($res) {
        // Create a session variable to display the status of query execution
        $_SESSION['add_admin'] = "Admin Added Successfully!";
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-admin.php?class=success');
    } else {
        // Create a session variable to display the status of query execution
        $_SESSION['add_admin'] = "Failed to Add Admin!";
        // REDIRECT PAGE to same page
        header('location:' . SITEURL . 'admin/add-admin.php?class=failure');
    }
}
?>