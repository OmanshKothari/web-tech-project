<?php
ob_start();
include('partials/header.php');
?>
<?php
if(!isset($_GET['id']) OR !isset($_GET['image_name'])){
    $_SESSION['update'] = "<div class='failure'>Unauthorized Access!!</div>";
    header('location:' . SITEURL . 'admin/manage-plant.php');
    die();
}
else{
    $plant_id = $_GET['id'];
    $current_plant_image = $_GET['image_name'];

    // Get all the record for the plant

    $sql = "SELECT * FROM tb_food WHERE id = $plant_id";

    $res = mysqli_query($conn, $sql);

    $count_rows = mysqli_num_rows($res);

    if($count_rows == 1){
        $row = mysqli_fetch_assoc($res);

        // Getting the data

        $title = $row['title'];
        $desc = $row['description'];
        $price = $row['price'];
        $category_id = $row['category_id'];
        $featured = $row['featured'];
        $active = $row['active'];

    }
    else{
        $_SESSION['update'] = "<div class='failure'>Plant Not in Database!!</div>";
        header('location:' . SITEURL . 'admin/manage-plant.php');
        die();
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
                    <td>Description : </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $desc; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price : </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price ?>">
                    </td>
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
                                if($category_id == $id){
                                    $selected = "selected";
                                }
                                else{
                                    $selected = '';
                                }
                                echo "<option value='" . $id . "'" . $selected . ">" . $title . "</option>";
                            }
                        } else {
                            echo "<option value=0>No Categories Available</option>";
                        }
                        echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <img id="current-image" src="../images/plants/<?php echo $current_plant_image; ?>" alt="<?php echo $current_image; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Select Image to Change Plant Image: </td>
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
                        <input type="hidden" name="id" value="<?php echo $plant_id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_plant_image; ?>">
                        <input type="submit" name="submit" value="Update Plant" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>
<?php
if(isset($_POST['submit'])){
    $plant_id = $_POST['id'];
    $current_plant_image = $_POST['current_image'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    if(isset($_FILES['image']['name'])){
        if($_FILES['image']['name'] != ''){
            $tmp = explode('.', $_FILES['image']['name']);
            $ext = end($tmp);
            $image_name = time() . '.' . $ext;

            // Delete previous image

            $remove_path = '../images/plants/' . $current_plant_image;
            $remove = unlink($remove_path);

            // Check if removed

            if($remove == False){
                $_SESSION['update'] = "<div class='failure'>Failed to delete image from the database!!</div>";
                header('location:' . SITEURL . 'admin/manage-plant.php');
                die();
            }

            // Upload Image
            
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = '../images/plants/' . $image_name;

            $upload = move_uploaded_file($source_path, $destination_path);

            // Check if Uploaded

            if($upload == False){
                $_SESSION['update'] = "<div class='failure'>Failed to upload image!!</div>";
                header('location:' . SITEURL . 'admin/manage-plant.php');
                die();
            }
        }
        else{
            $image_name = $current_plant_image;
        }

        $sql3 = "UPDATE tb_food SET 
                title = '$title',
                description = '$desc',
                price = $price,
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
                WHERE id = $plant_id";
        
        $res3 = mysqli_query($conn, $sql3);

        if($res3){
            $_SESSION['update'] = "<div class='success'>Plant Updated Successfully!!</div>";
            header('location:' . SITEURL . 'admin/manage-plant.php');
            die();
        }
        else{
            $_SESSION['update'] = "<div class='failure'>Error Updating Plant</div>";
            header('location:' . SITEURL . 'admin/manage-plant.php');
            die();
        }
    }
}
?>