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

            <h2>Dashboard</h2>
            <div class="box col-4 text-center">
                <h3>5</h3>
                <br>
                <p>Categories</p>
            </div>
            <div class="box col-4 text-center">
                <h3>5</h3>
                <br>
                <p>Categories</p>
            </div>
            <div class="box col-4 text-center">
                <h3>5</h3>
                <br>
                <p>Categories</p>
            </div>
            <div class="box col-4 text-center">
                <h3>5</h3>
                <br>
                <p>Categories</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?php
    include('partials/footer.php')
?>