 <?php
    include('partials/header.php');
 ?>
 <!-- Main Content Section Starts -->
    <div class="main-content  mc-bg wrapper">
        <div class="box-container">

            <?php
                if(isset($_SESSION['login-msg'])){
                    echo $_SESSION['login-msg'];
                    unset($_SESSION['login-msg']);
                }
            ?>

        <h1 id="customer_messages">Messages From Customers</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th> 
            </tr>

            <?php
            // SQL query to get all the rows from database
            $sql = "SELECT * FROM contact";
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

                    $id = $rows['idcontact'];
                    $full_name = $rows['name'];
                    $email = $rows['email'];
                    $phone = $rows['phone'];
                    $message = $rows['description'];


                    // Display value in table
            ?>
                    <tr>
                        <td><?php echo $sn;?></td>
                        <td><?php echo $full_name;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $phone;?></td>
                        <td><?php echo $message;?></td>
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
    
<?php
    include('partials/footer.php')
?>