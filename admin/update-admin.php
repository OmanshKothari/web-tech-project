<?php
include('partials/header.php');
?>
<?php
// Get the id of the admin

$id = $_GET['id'];

// SQL query to get the record of admin

$sql = "SELECT * FROM tb_admin WHERE id = $id";

// Execute the query

$res = mysqli_query($conn, $sql);

if ($res) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $rows = mysqli_fetch_assoc($res);
        $fullname = $rows['full_name'];
        $username = $rows['username'];
    } else {
        $_SESSION['update'] = 'Admin not found in Database!!!';
        header('location:' . SITEURL . 'admin/manage-admin.php?class=failure');
    }
} else {
    $_SESSION['update'] = 'Admin not found in Database!!!';
    header('location:' . SITEURL . 'admin/manage-admin.php?class=failure');
}
?>

<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h2>Update Admin</h2>
        <br>
        <br>
        <div class="text-center">
            <?php
            if (isset($_SESSION['update'])) {
                $class = $_GET['class'];
                echo "<h3 class='$class'>" . $_SESSION['update'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['update']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>
        <br>
        <br>
        <form action="" method="POST">
            <table class="text-center">
                <tr>
                    <td>Full Name : </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $fullname ?>">
                    </td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="UPDATE" class="btn-secondary">
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


    // SQL query to save Data in Database

    $sql = "UPDATE tb_admin SET
            full_name = '$full_name',
            username = '$username'

            WHERE id = $id
            ";

    // Executing query to save Data

    // Declaring variable to check whether it the query executes successfully

    $res = mysqli_query($conn, $sql);

    if ($res) {
        // Create a session variable to display the status of query execution
        $_SESSION['update'] = "Admin Updated Successfully!";
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-admin.php?class=success');
    } else {
        // Create a session variable to display the status of query execution
        $_SESSION['update'] = "Failed to Update Admin!";
        // REDIRECT PAGE to same page
        header('location:' . SITEURL . 'admin/add-admin.php?class=failure');
    }
}
?>