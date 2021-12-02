<?php
include('partials/header.php');
?>
<?php
// Get the id of the category

$id = $_GET['id'];

// SQL query to get the record of category

$sql = "SELECT * FROM tb_category WHERE id = $id";

// Execute the query

$res = mysqli_query($conn, $sql);

if ($res) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $rows = mysqli_fetch_assoc($res);
        $fullname = $rows['full_name'];
        $username = $rows['username'];
    } else {
        $_SESSION['update'] = '<div class="failure">Category not found in Database!!!</div>';
        header('location:' . SITEURL . 'admin/manage-categories.php');
    }
} else {
    $_SESSION['update'] = '<div class="failure">Category not found in Database!!!</div>';
    header('location:' . SITEURL . 'admin/manage-categories.php');
}
?>
