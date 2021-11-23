<?php
include('partials/header.php')
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h1>Add Category</h1>

        <div class="text-center">
            <?php
            if (isset($_SESSION['add_category'])) {
                echo "<h3>" . $_SESSION['add_category'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['add_category']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>

        <form action="" method="POST">
            <table class="text-center">
                <tr>
                    <td>Title : </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Food Title ">
                    </td>
                </tr>
                <tr>
                    <td>Image name : </td>
                    <td>
                        <input type="text" name="image_name" placeholder="Enter Food Image Name">
                    </td>
                </tr>
                <tr>
                    <td>Featured : </td>
                    <td>
                        <label for="featured-yes">YES : </label><input type="checkbox" name="featured" value="YES">
                        <label for="featured-no">NO : </label><input type="checkbox" name="featured" value="NO">
                    </td>
                </tr>
                <tr>
                    <td>Active : </td>
                    <td>
                        <label for="active-yes">YES : </label><input type="checkbox" name="active" value="YES">
                        <label for="active-no">NO : </label><input type="checkbox" name="active" value="NO">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">
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

    $title = $_POST['title'];
    $image_name = $_POST['image_name'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // SQL query to save Data in Database

    $sql = "INSERT INTO tb_category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
        ";

    // Executing query to save Data

    // Declaring variable to check whether it the query executes successfully

    $res = mysqli_query($conn, $sql);

    if ($res) {
        // Create a session variable to display the status of query execution
        $_SESSION['add_category'] = "Category Added Successfully!";
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-categories.php');
    } else {
        // Create a session variable to display the status of query execution
        $_SESSION['add_category'] = "Failed to Add Category!";
        // REDIRECT PAGE to same page
        header('location:' . SITEURL . 'admin/add-category.php');
    }
}
?>