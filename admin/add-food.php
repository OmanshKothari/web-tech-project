<?php
include('partials/header.php')
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h1>Add Food</h1>

        <div class="text-center">
            <?php
            if (isset($_SESSION['add_food'])) {
                echo "<h3 class='failure'>" . $_SESSION['add_food'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['add_food']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>

        <form id="#manage-form" action="" method="POST">
            <table class="text-center">
                <tr>
                    <td>Title : </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Food Title ">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Description : </td>
                    <td>
                        <textarea  rows="10" cols="60" name="description" placeholder="Enter Food Description "></textarea>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Price : </td>
                    <td>
                        <input type="number" name="price" placeholder="Enter Food Price" step="0.01">
                    </td>
                </tr>
                <tr>
                    <td>Image name : </td>
                    <td>
                        <input type="text" name="image_name" placeholder="Enter Food Image Name">
                    </td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td>Category ID : </td>
                    <td>
                        <input type="number" name="category_id" placeholder="Enter Food Category ID">
                    </td>
                </tr>
                <tr>
                    <td>Featured : </td>
                    <td>
                        <label for="featured">YES : </label><input type="radio" name="featured" value="YES">
                        <label for="featured">NO : </label><input type="radio" name="featured" value="NO">
                    </td>
                </tr>
                <tr>
                    <td>Active : </td>
                    <td>
                        <label for="active">YES : </label><input type="radio" name="active" value="YES">
                        <label for="active">NO : </label><input type="radio" name="active" value="NO">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-primary">
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
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_name = $_POST['image_name'];
    $category_id = $_POST['category_id'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // SQL query to save Data in Database

    $sql = "INSERT INTO tb_food SET
            title = '$title',
            description = '$description',
            price = '$price',
            image_name = '$image_name',
            category_id = '$category_id',
            featured = '$featured',
            active = '$active'
        ";

    // Executing query to save Data

    // Declaring variable to check whether it the query executes successfully

    $res = mysqli_query($conn, $sql);

    if ($res) {
        // Create a session variable to display the status of query execution
        $_SESSION['add_food'] = "Food Added Successfully!";
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-food.php');
    } else {
        // Create a session variable to display the status of query execution
        $_SESSION['add_category'] = "Failed to Add Food!";
        // REDIRECT PAGE to same page
        header('location:' . SITEURL . 'admin/add-food.php');
    }
}
?>