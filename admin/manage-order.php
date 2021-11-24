<?php
include('partials/header.php')
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h2>Manage Orders</h2>
        <table id="tb-order">
            <tr>
                <th>S.No.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Customer Email</th>
                <th>Customer Address</th>
                <th>Actions</th> <!-- This will have buttons like update, remove etc. -->
            </tr>
            <?php
            // SQL query to get all the rows from database
            $sql = "SELECT * FROM tb_order";
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
                    $food = $rows['food'];
                    $price = $rows['price'];
                    $qty = $rows['qty'];
                    $order_date = $rows['order_date'];
                    $status = $rows['status'];
                    $total = $rows['total'];
                    $customer_name = $rows['customer_name'];
                    $customer_contact = $rows['customer_contact'];
                    $customer_email = $rows['customer_email'];
                    $customer_address = $rows['customer_address'];


                    // Display value in table
            ?>
                    <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $food; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $customer_contact; ?></td>
                        <td><?php echo $customer_email; ?></td>
                        <td><?php echo $customer_address; ?></td>
                        <td>
                            <a href="#" class="btn-secondary">Update Category</a>
                            <a href="#" class="btn-danger">Delete Category</a>
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