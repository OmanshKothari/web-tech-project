<!--
     Adding items to card 
    Step 1 : Get the id of plant via Get request
            YES => continue processing
            NO => redirect with Unauthorized Access message
    Step 2 : Validate the id
            YES => continue processing
            NO => Invalid id message
    Step 3 : Create and Execute sql query
-->
<?php
    ob_start();
    include('config/constants.php');
    if(isset($_GET['id']) and isset($_GET['p'])){
        $id = $_GET['id'];
        $redirect = $_GET['p'];

        $sql = "SELECT * FROM tb_plant WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        $count_row = mysqli_num_rows($res);
        if($count_row == 1){
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];

            $sql2 = "INSERT INTO tb_cart SET title='$title', price = $price, image_name='$image_name'";

            $res2 = mysqli_query($conn, $sql2);
            if($res2){
                header('location:'.SITEURL.$redirect . '#menu');
            }
            else{
                $_SESSION['err-cart'] = "<div>Error!!! Can not add item in cart.</div>";
                header('location:'.SITEURL.$redirect);
            }
        }
        else{
            $_SESSION['err-cart'] = "<div>Error!!! Plant not in database.</div>";
            header('location:'.SITEURL.$redirect);
        }
    }
    else{
        $_SESSION['err-cart'] = "<div>Unauthorized Access!!</div>";
        header('location:'.SITEURL.$redirect);
    }
?>