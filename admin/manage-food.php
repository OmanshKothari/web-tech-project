<?php
include('partials/header.php')
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h2>Manage Food</h2>

        <!-- Button to add Food -->
        <div class='btn-container'><a href="add-food.php" class="btn-primary">Add Food</a></div>
        <br>
        <!-- Displaying Session message for adding food -->
        <div class="text-center">
            <?php
            if (isset($_SESSION['add_food'])) {
                echo "<h3 class='success'>" . $_SESSION['add_food'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['add_food']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            if (isset($_SESSION['delete'])) {
                $class = $_GET['class'];
                echo "<h3 class='$class'>" . $_SESSION['delete'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['delete']);
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
                <th>Description</th>
                <th>Price</th>
                <th>Image_name</th>
                <th>Category id</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th> <!-- This will have buttons like update, remove etc. -->
            </tr>
            <?php
            // SQL query to get all the rows from database
            $sql = "SELECT * FROM tb_food";
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
                    $description = $rows['description'];
                    $price = $rows['price'];
                    $image_name = $rows['image_name'];
                    $category_id = $rows['category_id'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];


                    // Display value in table
            ?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $image_name; ?></td>
                        <td><?php echo $category_id; ?></td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="#" class="btn-secondary">Update Food</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id ?>" class="btn-danger">Delete Food</a>
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