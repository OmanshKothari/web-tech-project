<?php
ob_start();
include('config/constants.php');

if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
} else {
    header('location:' . SITEURL);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/my-style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Kirang+Haerang&family=Sunflower:wght@300&display=swap" rel="stylesheet">
    <title>Plants</title>
</head>

<body>
    <header>
        <h1>Hello Planthead!</h1>
        <nav class="menu-buttons">
            <a href="<?php echo SITEURL . '#cart'; ?>" class="btn-menu">Cart</a>
            <a href="<?php echo SITEURL . '#contact'; ?>" class="btn-menu">Contact</a>
            <a href="<?php echo SITEURL . '#about'; ?>" class="btn-menu">About</a>
            <a href="<?php echo SITEURL . '#home'; ?>" class="btn-menu">Home</a>
        </nav>
    </header>

    <div class="shop-menu">
        <ul class="menu-bar">
            <?php
            $sql = 'SELECT * FROM tb_category';
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            if ($count >= 1) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];

                    if ($id == $get_id) {
                        $selected = "class='active'";
                    } else {
                        $selected = '';
                    }

                    echo "<li><a " . $selected . " href='menu.php?id=" . $id . "'>" . $title . "</a></li>";
                }
            }
            ?>
        </ul>
        <div class="menu">
            <div class="box-container">
                <?php
                $sql = "SELECT * FROM tb_plant WHERE category_id = $get_id";
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);
                if ($count >= 1) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $title = $row['title'];
                        $price = $row['price'];
                        $id = $row['id'];
                        $image_name = $row['image_name'];

                        echo "<div class='box' style='background: url(" . '"images/plants/' . $image_name . '"' . ");
                        background-size: cover;
                        background-position: center;'>";
                        echo "<div class='content'>
                          <h2>" . $title . "</h2>
                          <p class='price'>₹" . $price . "</p>";
                        echo '<a href="add-to-cart.php?id=' . $id . '&p=' . "menu.php?id=" . $get_id . '" class="btn">add to cart</a>
                          <a href="detail.php?id=' . $id . '" class="btn">Details</a>
                          </div>
                          </div>';
                    }
                } else {
                    echo "<div><h1>No Plant in this category</h1></div>!!";
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    ob_start();
    include('footer.php');
    ?>