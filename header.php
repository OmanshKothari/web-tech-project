<?php
$servername = "localhost";
$username = "root";
$password = "Omansh@123";
$dbname = "nursery";

// making connection 
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Can not establish connection" . mysqli_connect_error());
}
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
  <link rel="stylesheet" href="css/style.css" />
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
      <a href="#home">home</a>
      <a href="#about">about</a>
      <a href="#menu">menu</a>
      <a href="#products">products</a>
      <a href="#review">review</a>
      <a href="#contact">contact us</a>
      <a href="#blogs">blogs</a>
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
      <div class="cart-item">
        <span class="fas fa-times"> </span>
        <img src="images/logo.png" alt="item-1" />
        <div class="content">
          <h3>cart-item-1</h3>
          <div class="price">$15.99/-</div>
        </div>
      </div>
      <div class="cart-item">
        <span class="fas fa-times"> </span>
        <img src="images/logo.png" alt="item-2" />
        <div class="content">
          <h3>cart-item-2</h3>
          <div class="price">$15.99/-</div>
        </div>
      </div>
      <div class="cart-item">
        <span class="fas fa-times"> </span>
        <img src="images/logo.png" alt="item-3" />
        <div class="content">
          <h3>cart-item-3</h3>
          <div class="price">$15.99/-</div>
        </div>
      </div>
      <a href="#" class="btn">Checkout Now</a>
    </div>
  </header>
  <!-- header section ends -->
