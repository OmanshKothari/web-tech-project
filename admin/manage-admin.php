<?php
include('partials/header.php');
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h1>Manage Admin</h1>
        <!-- Button to add admin -->
        <div class='btn-container'><a href=<?php echo  SITEURL . "admin/add-admin.php"?> class="btn-primary">Add Admin</a></div>
        <div class="text-center">
            <?php
            if (isset($_SESSION['add_admin'])) {
                echo "<h3 class='success'>" . $_SESSION['add_admin'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['add_admin']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            if (isset($_SESSION['delete'])) {
                $class = $_GET['class'];
                echo "<h3 class='$class'>" . $_SESSION['delete'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['delete']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            if (isset($_SESSION['update'])) {
                $class = $_GET['class'];
                echo "<h3 class='$class'>" . $_SESSION['update'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['update']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            if (isset($_SESSION['password'])) {
                $class = $_GET['class'];
                echo "<h3 class='$class'>".$_SESSION['password']."</h3>"; // Displaying Session Message
                unset($_SESSION['password']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>
        <br>
        <br>
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th> <!-- This will have buttons like update, remove etc. -->
            </tr>

            <?php
            // SQL query to get all the rows from database
            $sql = "SELECT * FROM tb_admin";
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
                    $full_name = $rows['full_name'];
                    $username = $rows['username'];


                    // Display value in table
            ?>
                    <tr>
                        <td><?php echo $sn;?></td>
                        <td><?php echo $full_name;?></td>
                        <td><?php echo $username;?></td>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/change-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                            <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                            <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                        </td>
                    </tr>
            <?php
                $sn++;
                }
            }
            else{
                // Database is empty
            }
            ?>
        </table>
    </div>
</div>
<?php
include('partials/footer.php');
?>