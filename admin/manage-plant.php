<?php
include('partials/header.php')
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h2>Manage Plants</h2>

        <!-- Button to add Food -->
        <div class='btn-container'><a href=<?php echo  SITEURL . "admin/add-plant.php"?> class="btn-primary">Add Plant</a></div>
        <br>
        <!-- Displaying Session message for adding food -->
        <div class="text-center">
            <?php
            if (isset($_SESSION['add_plant'])) {
                echo "<h3 class='success'>" . $_SESSION['add_plant'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['add_plant']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            if (isset($_SESSION['update'])) {
                echo $_SESSION['update']; // Displaying Session Message
                unset($_SESSION['update']);
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
                <th>Caring Instructions</th>
                <th>Toxicity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th> <!-- This will have buttons like update, remove etc. -->
            </tr>
            <?php
            // SQL query to get all the rows from database
            $sql = "SELECT * FROM tb_plant";
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
                    $caring_ins = $rows['caring_instructions'];
                    $toxicity = $rows['toxicity'];
                    $price = $rows['price'];
                    $image_name = $rows['image_name'];
                    $category_id = $rows['category_id'];

                    $sql2 = "SELECT title FROM tb_category WHERE id = $category_id";

                    $res2 = mysqli_query($conn, $sql2);
                    $count_category = mysqli_num_rows($res2);
                    if($count_category != 1){
                        $category = "No Category Available!!";
                    }
                    else{
                        $row2 = mysqli_fetch_assoc($res2);
                        $category = $row2['title'];
                    }
                    $featured = $rows['featured'];
                    $active = $rows['active'];


                    // Display value in table
            ?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo substr($description, 0, 50) . '...'; ?></td>
                        <td><?php echo substr($caring_ins, 0, 50) . '...'; ?></td>
                        <td><?php echo substr($toxicity, 0, 50) . '...'; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><img src="../images/plants/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" width="100px" height="100px"></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-plant.php?id=<?php echo $id ?>&image_name=<?php echo $image_name ?>" class="btn-secondary">Update Plant</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-plant.php?id=<?php echo $id ?>&image_name=<?php echo $image_name ?>" class="btn-danger">Delete Plant</a>
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