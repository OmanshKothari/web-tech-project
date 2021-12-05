<?php
include('partials/header.php');
if(!isset($_GET['id']) and !isset($_POST['submit'])){
    $_SESSION['update'] = "<div class='failure'>Unauthorized access!!</div>";
    header('location:'.SITEURL.'admin/manage-categories.php');
    die();
}
else{
    $id = $_GET['id'];

    // SQL query to get the record of category

    $sql = "SELECT * FROM tb_category WHERE id = $id";

    // Execute the query

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $rows = mysqli_fetch_assoc($res);
            $title = $rows['title'];
            $current_image = $rows['image_name'];
            $featured = $rows['featured'];
            $active = $rows['active'];
        } else {
            $_SESSION['update'] = '<div class="failure">Category not found in Database!!!</div>';
            header('location:' . SITEURL . 'admin/manage-categories.php');
        }
    } else {
        $_SESSION['update'] = '<div class="failure">Category not found in Database!!!</div>';
        header('location:' . SITEURL . 'admin/manage-categories.php');
    }
}
?>


<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h2>Update Categories</h2>

        <br>
        <!-- Displaying Session message for updating category -->
        <div class="text-center">
            <?php
            if (isset($_SESSION['update_err'])) {
                echo "<h3 class='success'>" . $_SESSION['update_err'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['update_err']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>
        <br>
        <br>
        <form action="" enctype="multipart/form-data" method="post">
            <table class="text-center">
                <tr>
                    <td>Title : </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Food Title " value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <img id="current-image" src="../images/category/<?php echo $current_image; ?>" alt="<?php echo $current_image; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Select Image to Change Category Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured : </td>
                    <td>
                        <label for="featured">YES : </label><input <?php if ($featured == "YES") {
                                                                        echo "checked";
                                                                    } ?> type="radio" name="featured" value="YES">
                        <label for="featured">NO : </label><input <?php if ($featured == "NO") {
                                                                        echo "checked";
                                                                    } ?> type="radio" name="featured" value="NO">
                    </td>
                </tr>
                <tr>
                    <td>Active : </td>
                    <td>
                        <label for="active">YES : </label><input <?php if ($active == "YES") {
                                                                        echo "checked";
                                                                    } ?> type="radio" name="active" value="YES">
                        <label for="active">NO : </label><input <?php if ($active == "NO") {
                                                                    echo "checked";
                                                                } ?> type="radio" name="active" value="NO">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php
include('partials/footer.php');
?>

<?php
if (isset($_POST['submit'])) {
    // button clicked

    // Get all the new data
    $id = $_POST['id'];
    $current_image = $_POST['current_image'];
    $new_title = $_POST['title'];
    $new_featured = $_POST['featured'];
    $new_active = $_POST['active'];

    // Upload the image if new image is selected
    if ($_FILES['image']['name'] != '') {
        // New image is selected

        $ext = end(explode('.', $_FILES['image']['name']));
        $image_name = time() . '.' . $ext;
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = '../images/category/' . $image_name;

        $upload = move_uploaded_file($source_path, $destination_path);

        if ($upload == False) {
            // Error uploading image.
            $_SESSION['update'] = "<div class='failure'>Error Uploading Image to Database!!</div>";
            header('location:' . SITEURL . 'admin/manage-categories.php');
            die();
        }
        // Delete the image if new image is uploaded 
        $remove_path = '../images/category/' . $current_image;
        $remove = unlink($remove_path);

        if ($remove == False) {
            // Error uploading image.
            $_SESSION['update'] = "<div class='failure'>Error Deleting Previous Image to Database!!</div>";
            header('location:' . SITEURL . 'admin/manage-categories.php');
            die();
        }
    } else {
        // new image not selected
        $image_name = $current_image;
    }

    // Update the database
    $sql = "UPDATE tb_category SET image_name = '$image_name', title = '$new_title'
            , featured = '$new_featured', active = '$new_active' WHERE id = $id";

    $res = mysqli_query($conn, $sql);
    // Redirect with Session Message

    if($res){
        $_SESSION['update'] = "<div class='success'>Category Updated Successfully!!</div>";
        header('location:' . SITEURL . 'admin/manage-categories.php');    
    }
    else{
        $_SESSION['update'] = "<div class='failure'>Error Updating Category!!</div>";
        header('location:' . SITEURL . 'admin/manage-categories.php');    
    }
}
?>