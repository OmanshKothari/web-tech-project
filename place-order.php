<?php
ob_start();
include('header.php');
include('user-login-check.php');
?>
<?php
if (!isset($_GET['id'])) {
    $_SESSION['place-order'] = "<div class='failure'>Unauthorized Access!!</div>";
    header('location:' . SITEURL);
    die();
} else {
    $plant_id = $_GET['id'];
    // Get all the record for the plant

    $sql = "SELECT * FROM tb_plant WHERE id = $plant_id";

    $res = mysqli_query($conn, $sql);

    $count_rows = mysqli_num_rows($res);

    if ($count_rows == 1) {
        $row = mysqli_fetch_assoc($res);

        // Getting the data

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $category_id = $row['category_id'];
    } else {
        $_SESSION['place-order'] = "<div class='failure'>Plant Not in Database!!</div>";
        header('location:' . SITEURL);
        die();
    }
}
?>
<!-- Main Content Section Starts -->
<div class="main-content  mc-bg wrapper">
    <div class="box-container">
        <h2>Place Your Order for <span><?php echo $title; ?></span></h2>

        <br>
        <!-- Displaying Session message for updating category -->
        <div class="text-center">
            <?php
            if (isset($_SESSION['place-order'])) {
                echo "<h3 class='success'>" . $_SESSION['place-order'] . "</h3>"; // Displaying Session Message
                unset($_SESSION['place-order']);
                // Removes the variable from the session variables so that message is displayed only once
            }
            ?>
        </div>
        <br>
        <br>
        <div id="current-image">
            <img id="current-image" src="images/plants/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>">
        </div>
        <form action="" enctype="multipart/form-data" method="post">
            <table class="text-center">
                <tr>
                    <th  colspan="2">Enter the Details</th>
                </tr>
                <tr>
                    <td>Plant Name : </td>
                    <td>
                        <?php echo $title; ?>
                        <input type="hidden" name="title" placeholder="Enter Food Title " value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Price : </td>
                    <td>
                        <?php echo $price ?>
                        <input type="hidden" name="price" value="<?php echo $price ?>">
                    </td>
                </tr>
                <tr>
                    <td>Quantity : </td>
                    <td>
                        <input type="number" name="qty" value="<?php echo 1 ?>">
                    </td>
                </tr>
                <tr>
                    <td>Name : </td>
                    <td>
                        <input type="text" name="customer_name" placeholder="Your Full Name" required>
                    </td>
                </tr>
                <tr>
                    <td>Phone : </td>
                    <td>
                        <input type="text" name="customer_contact" placeholder="Your Phone number" required>
                    </td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td>
                        <input type="email" name="customer_email" placeholder="Your Email ID" required>
                    </td>
                </tr>
                <tr>
                    <td>Address : </td>
                    <td>
                        <input type="text" name="customer_address" placeholder="Your Address here" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Place-Order" class="btn">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('footer.php'); ?>
<?php
if (isset($_POST['submit'])) {
    $plant_id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = (int)$qty * (int)$price;
    $order_date = date('Y/m/d');
    $status = 'ordered';
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];

    $sql3 = "INSERT INTO tb_order SET 
            plant = '$title',
            price = $price,
            qty = $qty,
            total = $total,
            order_date = '$order_date',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'";

    $res3 = mysqli_query($conn, $sql3);

    if ($res3) {
        $_SESSION['place-order'] = "<div class='success' id='order'>Order Placed Successfully!!</div>";
        header('location:' . SITEURL . '#order');
        die();
    } else {
        $_SESSION['place-order'] = "<div class='failure'>Error Placing Order!!" . mysqli_error($conn) . "</div>";
        header('location:#');
        die();
    }
}
?>