<?php
  ob_start();
  include('config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!-- font awesome cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- custom css file link  -->
  <link rel="stylesheet" href="css/my-style.css" />
  <link rel="stylesheet" href="css/plant-grid.css">
</head>

<body>
  <!-- header section starts -->
  <header class="header">
    <!-- Site logo here -->
    <a href="#" class="logo">
      <img src="images/logo.png" alt="Logo" width="100px" height="100px" />
    </a>
    <!-- navbar starts here -->
    <nav class="navbar">
      <a href="<?php echo SITEURL ?>#home">home</a>
      <a href="<?php echo SITEURL ?>#about">about</a>
      <a href="<?php echo SITEURL ?>#menu">Products</a>
      <a href="<?php echo SITEURL ?>#contact">contact us</a>
      <a href="<?php echo SITEURL ?>LogIn.php">Login</a>
      <a href="<?php echo SITEURL ?>user-logout.php">LogOut</a>
    </nav>

    <!-- icons here-->
    <div class="icons">
      <div class="fas fa-search" id="search-btn"></div>
      <div class="fas fa-shopping-cart" id="cart-btn"></div>
      <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <!-- Search Form Starts here -->

    <div class="search-form">
      <input type="search" id="search-box" placeholder="search here.." />
      <label for="search-box" class="fas fa-search"></label>
    </div>
    <!-- cart-items-container starts here -->

    <div class="cart-items-container">
      <!-- SQL query to get all card items -->
      <?php 
        $sql = "SELECT * FROM tb_cart";
        $res = mysqli_query($conn, $sql);
        $count_rows = mysqli_num_rows($res);
        if($count_rows >= 1){
          while($row=mysqli_fetch_assoc($res)){
            $id = $row['idtb_cart'];
            $title = $row['title'];
            $price = $row['price'];
            $img_name = $row['image_name'];
          
            echo "<div class='cart-item'>";
            echo "<a href='delete-cart-item.php?id=". $id ."&p=". 'index' ."'<span class='fas fa-times'> </span></a>";
            echo "<img src='images/plants/". $img_name ."' alt='item-1' />";
            echo "<div class='content'>";
            echo "<h3>". $title ."</h3>";
            echo "<div class='price'>₹". $price ."/-</div>";
            echo "</div>";
            echo "</div>";
          }
        }
      ?>
    </div>
  </header>
  <!-- header section ends -->
