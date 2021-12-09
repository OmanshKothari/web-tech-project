<?php
ob_start();
include('config/constants.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM tb_plant WHERE id = $id";

  $res = mysqli_query($conn, $sql);

  $count_rows = mysqli_num_rows($res);

  if ($count_rows == 1) {
    $row = mysqli_fetch_assoc($res);
    $title = $row['title'];
    $price = $row['price'];
    $cat_id = $row['category_id'];
    $image_name = $row['image_name'];
    $desc = $row['description'];
    $caring_inst = $row['caring_instructions'];
    $toxicity = $row['toxicity'];
  } else {
    $_SESSION["err-details"] = "<div>Details can not be found. Plant not found in database.</div>";
  }
} else {
  $_SESSION["err-details"] = "<div>Unauthorized Access!!!</div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/detail.css" />
  <link href="https://fonts.googleapis.com/css2?family=Kirang+Haerang&family=Sunflower:wght@300&display=swap" rel="stylesheet" />
  <title><?php echo $title; ?></title>
</head>

<body>
  <div class="screen">
    
      <div class="menu-buttons">
        <a href="<?php echo SITEURL . '/menu.php?id=' . $cat_id; ?>" class="buttons">Back to Menu</a>
        <button class="buttons">My cart</button>
      </div>
      <section class="main-item">
      <div class="firstHalf">
        <img class="plant" src=<?php echo "images/plants/" . $image_name ?> />
      </div>
      <div class="secondHalf">
        <p class="plant-name"><?php echo $title ?></p>
        <p class="Mrp">Mrp : <?php echo "₹" . $price; ?></p>
        <a href='place-order.php?id=<?php echo $id ; ?>' class="buttons1">Buy</a>
      </div>
    </section>

    <section>
      <div class="details">
        <br />
        <br>

        <p class="description">
          <?php echo $desc; ?>
        </p>

        <p class="Heading">Caring</p>

        <p class="description">
          <?php echo $caring_inst; ?>
        </p>

        <p class="Heading">Toxicity</p>

        <p class="description">
          <?php echo $toxicity; ?>
        </p>
      </div>
    </section>
    <!-- Footer Section Starts -->

    <section class="footer">
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
      </div>

      <div class="links">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#menu">menu</a>
        <a href="#contact">contact</a>
      </div>

      <div class="credit">created by <span>TEAM</span> | all rights reserved</div>
    </section>

    <!-- Footer Section Ends -->

    <!-- custom js file link -->
    <script src="js/script.js"></script>
  </div>
</body>

</html>