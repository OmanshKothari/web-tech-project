<?php
include('partials/header.php')
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h2>Manage Categories</h2>

        <!-- Button to add Category -->
        <div class='btn-container'><a href=<?php echo  SITEURL . "admin/add-category.php"?> class="btn-primary">Add Category</a></div>
        <br>
        <!-- Displaying Session message for adding category -->
        <div class="text-center">
            <?php
            if (isset($_SESSION['add_category'])) {
                echo "<h3 class='success'>" . $_SESSION['add_category'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['add_category']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            if (isset($_SESSION['delete'])) {
                $class = $_GET['class'];
                echo "<h3 class='$class'>" . $_SESSION['delete'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['delete']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update']; // Displaying Session Message
                unset($_SESSION['update']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>
        <br>
        <br>
        <table>
            <tr>
                <th>S.No.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th> <!-- This will have buttons like update, remove etc. -->
            </tr>
            <?php
            // SQL query to get all the rows from database
            $sql = "SELECT * FROM tb_category";
            // Executing the query
            $res = mysqli_query($conn, $sql);
            // Counting the number of rows in database
            $count = mysqli_num_rows($res);

            // Create a Serial number variable
            $sn = 1;

            if ($count > 0) {
                // Meaning the database is not empty
                while ($rows = mysqli_fetch_assoc($res)) {
                    // using while loop to get records from database
                    // loop will run as long as we have rows in database

                    // Getting the data

                    $id = $rows['id'];
                    $title = $rows['title'];
                    $image_name = $rows['image_name'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];


                    // Display value in table
            ?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><img src="../images/category/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" width="100px" height="100px"></td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="#" class="btn-secondary">Update Category</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                        </td>
                    </tr>
            <?php
                    $sn++;
                }
            } else {
                // Database is empty
            }
            ?>
        </table>
    </div>
</div>
<?php
include('partials/footer.php')
?>