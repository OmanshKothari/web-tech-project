<?php
include('partials/header.php');
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h1>Add Category</h1>

        <div class="text-center">
            <?php
            if (isset($_SESSION['add_category'])) {
                echo "<h3 class='failure'>" . $_SESSION['add_category'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['add_category']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            if (isset($_SESSION['upload'])) {
                echo $_SESSION['upload'] ; // Displaying Session Message
                unset($_SESSION['upload']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>
            <!-- ADD Category Form starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="text-center">
                <tr>
                    <td>Title : </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Food Title " required>
                    </td>
                </tr>
                <tr>
                    <td>Select Image : </td>
                    <td>
                        <input type="file" name="image" required>
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
    
    // Check Whether the image is selected or not and set the value for image name
    if(isset($_FILES['image']['name'])){
        // Upload the image
        // To upload the image we need Source path, Destination path
        
        $image_name = $_FILES['image']['name'];
        
        // Auto Rename image
        // Get the extension of image like .jpg/.png etc
        $ext = end(explode('.', $image_name));
        
        $image_name = time() . '.' . $ext;

        $source = $_FILES['image']['tmp_name'];
        
        $destination = "../images/category/" . $image_name;
        
        $upload = move_uploaded_file($source, $destination);
        
        // Check for upload verification and if the image is not uploaded tehn we will stop the process and redirect with error message 

        if($upload == False){
            $_SESSION['upload'] = "<div class='failure'>Failed to Upload Image.</div>";
            header('location'.SITEURL.'admin/add-category.php');
            die();
        }
    }
    else{
        // Do not upload
        $image_name = "No image selected.";
    }
    
    if(isset($_POST['featured'])){
        $featured = $_POST['featured'];
    }
    else{
        $featured = "NO";
    }
    
    if(isset($_POST['active'])){
        $active = $_POST['active'];
    }
    else{
        $active = "NO";
    }
    
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