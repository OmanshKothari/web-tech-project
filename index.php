<?php include('header.php'); ?>

<!-- home section starts -->

<section class="home" id="home">
  <div class="content">
    <h3>Gardeners don’t get old, they go to pot</h3>
    <p>
      Do not let excuses steal your fun of planting. Order a plant exclusive for you and Bloom the happiness in your heart.
    </p>
    <a href="#menu" class="btn">Get Yours Now</a>
    <a href="signup.php" class="btn">Sign Up</a>
  </div>
</section>

<!-- home section ends -->
<?php
if (isset($_SESSION['place-order'])) {
  echo $_SESSION['place-order'];
  unset($_SESSION['place-order']);
}
?>
<?php
if (isset($_SESSION['login-msg'])) {
  echo $_SESSION['login-msg'];
  unset($_SESSION['login-msg']);
}
?>
<!-- about section starts -->

<section class="about" id="about">
  <h1 class="heading"><span>About</span> Us</h1>
  <div class="row-about">
    <div class="image"><img src="img/about.jpg" alt="About Image"></div>
    <div class="content">
      <h3>Our Goal</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste pariatur mollitia nisi velit ullam cupiditate, minus nostrum illo laboriosam facere voluptatem veritatis similique blanditiis? Nemo.</p>
    </div>
  </div>
  <div class="row-about reverse">
    <div class="image"><img src="img/about2.jpg" alt="About Image"></div>
    <div class="content">
      <h3>Our Exotic Plants</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid quam possimus ad, ipsum laudantium neque quasi tempora, itaque laboriosam necessitatibus assumenda commodi deserunt accusamus dolorum.</p>
    </div>
  </div>
</section>

<!-- about section ends -->

<!-- menu section starts -->

<div class="big-container">
  <section class="menu" id="menu">

    <h1 class="heading">our <span>Plants</span></h1>
    <div class="box-container">
      <?php
      $sql = "SELECT * FROM tb_plant WHERE featured ='YES' AND active = 'YES'";
      $res = mysqli_query($conn, $sql);
      $count_rows = mysqli_num_rows($res);
      if ($count_rows > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $image_name = $row['image_name'];
          $title = $row['title'];
          $price = $row['price'];

          echo "<div class='box' 
        style='background: url(" . '"images/plants/' . $image_name . '"' . ");
               background-size: cover;
               background-position: center;'>";
          echo "<div class='content'>
        <h2>" . $title . "</h2>
        <p class='price'>₹" . $price . "</p>";
          echo '<a href="add-to-cart.php?id=' . $id . '&p=' . "index.php" . '" class="btn">add to cart</a>
        <a href="detail.php?id=' . $id . '" class="btn">Details</a>
      </div>
    </div>';
        }
      } else {
        echo "<div class='failure'>No Plants in Stock!!!😭</div>";
      } ?>
    </div>
    <a href="menu.php?id=20" class="btn" id="button">Explore All Plants</a>
  </section>
</div>

<!-- menu section ends -->

<!-- Contact Section Starts -->

<section class="contact" id="contact">
  <h1 class="heading"><span>Contact</span> us</h1>
  <?php
  if (isset($_SESSION['contact-err'])) {
    echo $_SESSION['contact-err'];
    unset($_SESSION['contact-err']);
  }
  ?>
  <div class="row-about">
    <div class="image"><img src="img/about3.jpg" alt="About Image"></div>
    <div class="content">
      <h3>Lets Have a little chit-chat</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur molestiae, quibusdam veritatis maiores esse beatae, facilis error maxime sit deserunt, pariatur rerum sapiente fugit culpa?</p>
    </div>
  </div>
  <div class="row">
    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3424.7943114070977!2d77.11616511510903!3d30.864433281591374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f839442ab0b5b%3A0x6d5230f107c2117a!2sShoolini%20University!5e0!3m2!1sen!2sin!4v1637576617788!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    <form action="contact.php" method="POST">
      <h3>get in touch</h3>
      <div class="inputBox">
        <span class="fas fa-user"></span>
        <input type="text" name="username" placeholder="name" required>
      </div>
      <div class="inputBox">
        <span class="fas fa-envelope"></span>
        <input type="email" name="email" placeholder="email" required>
      </div>
      <div class="inputBox">
        <span class="fas fa-phone"></span>
        <input type="number" name="phone" required placeholder="number" maxlength="10" minlength="10">
      </div>
      <div class="inputBox">
        <span class="far fa-comment-dots"></span>
        <input type="text" name="message" required placeholder="Your message here...">
      </div>
      <input type="submit" name="submit" value="contact now" class="btn">
    </form>
  </div>
</section>

<!-- Contact Section Ends -->

<?php include('footer.php'); ?>