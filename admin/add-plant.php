<?php

use function PHPSTORM_META\type;

include('partials/header.php')
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h1>Add Plant</h1>

        <div class="text-center">
            <?php
            if (isset($_SESSION['add_plant'])) {
                echo "<h3 class='failure'>" . $_SESSION['add_plant'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['add_plant']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>

        <form id="#manage-form" action="" method="POST" enctype="multipart/form-data">
            <table class="text-center">
                <tr>
                    <td>Title : </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Plant Name " required>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Description : </td>
                    <td>
                        <textarea rows="10" cols="60" name="description" placeholder="Enter Plant Description " required></textarea>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Price : </td>
                    <td>
                        <input type="number" name="price" placeholder="Enter Plant Price" step="0.01" required>
                    </td>
                </tr>
                <tr>
                    <td>Image name : </td>
                    <td>
                        <input type="file" name="image_name" required>
                    </td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td>Category ID : </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM tb_category";

                        $res = mysqli_query($conn, $sql);

                        $count_rows = mysqli_num_rows($res);
                        echo "<select name='category_id'>";
                        if ($count_rows >= 1) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];

                                echo "<option value='" . $id . "'>" . $title . "</option>";
                            }
                        } else {
                            echo "<option value=0>No Categories Available</option>";
                        }
                        echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Featured : </td>
                    <td>
                        <label for="featured">YES : </label><input type="radio" name="featured" value="YES">
                        <label for="featured">NO : </label><input type="radio" name="featured" value="NO" checked>


                    </td>
                </tr>
                <tr>
                    <td>Active : </td>
                    <td>
                        <label for="active">YES : </label><input type="radio" name="active" value="YES">
                        <label for="active">NO : </label><input type="radio" name="active" value="NO" checked>
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
    $category_id = $_POST['category_id'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];


    if ($_FILES['image_name']['name'] == '') {
        $_SESSION['add-plant'] = "Image not selected!!";
        header('location:' . SITEURL . 'admin/add-plant.php');
        die();
    } 
    else {
        $image_name = $_FILES['image_name']['name'];
        $tmp = explode('.', $image_name);
        $ext = end($tmp);
        $image_name = time() . '.' . $ext;
        $source_path = $_FILES['image_name']['tmp_name'];
        $destination_path = '../images/plants/' . $image_name;

        $upload = move_uploaded_file($source_path, $destination_path);

        if ($upload == False) {
            $_SESSION['add-plant'] = "Error Uploading Image in Database!!!";
            header('location:' . SITEURL . 'admin/add-plant.php');
            die();
        }
    }

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
        $_SESSION['add_plant'] = "Plant Added Successfully!";
        // REDIRECT PAGE to manage-admin
        header('location:' . SITEURL . 'admin/manage-plant.php');
    } else {
        // Create a session variable to display the status of query execution
        $_SESSION['add_plant'] = "Failed to Add Plant!";
        // REDIRECT PAGE to same page
        header('location:' . SITEURL . 'admin/add-plant.php');
    }
}
?>