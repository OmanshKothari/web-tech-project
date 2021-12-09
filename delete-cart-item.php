<?php
    ob_start();
    include('config/constants.php');
    if(isset($_GET['id']) and isset($_GET['p'])){
        $id = $_GET['id'];
        $redirect = $_GET['p'] . '.php';
        $sql = "SELECT * FROM tb_cart WHERE idtb_cart=$id";

        $res = mysqli_query($conn, $sql);

        $count_row = mysqli_num_rows($res);
        if($count_row == 1){
            $sql2 = "DELETE FROM tb_cart WHERE idtb_cart=$id";
            $res2 = mysqli_query($conn, $sql2);
            if($res2){
                header('location:'.SITEURL.$redirect);
            }
            else{
                $_SESSION['err-cart'] = "<div>Error!!! Can not delete item from cart.</div>";
                header('location:'.SITEURL.$redirect);
            }
        }
        else{
            $_SESSION['err-cart'] = "<div>Error!!! cart item not in database.</div>";
            header('location:'.SITEURL.$redirect);
        }
    }
    else{
        $_SESSION['err-cart'] = "<div>Unauthorized Access!!</div>";
        header('location:'.SITEURL.$redirect);
    }
?>