<?php require_once "core/init.php" ?>

<?php
if (!isset($_SESSION["role"]) || $_SESSION["role"] != 1) {
    header("Location: login.php");
    exit();
}
// Get Product
$product =  getAllProducts($conn);
?>

<?php require_once "template/sidebar.php" ?>
<!-- Home -->

<section class="home">
    <div class="container">
        <div class="text">Halo, Admin</div>
        <div class="overview">
            <div class="title">
                <i class='bx bx-tachometer'></i>
                <span class="text">Dashboard</span>
            </div>
            <div class="boxes">
                <div class="box box1">
                    <i class="bx bx-package"></i>
                    <span class="text">Product</span>
                    <span class="number">50,120</span>
                </div>
                <div class="box box2">
                    <i class="bx bx-category"></i>
                    <span class="text">Category</span>
                    <span class="number">20,120</span>
                </div>
                <div class="box box3">
                    <i class="bx bx-user"></i>
                    <span class="text">User</span>
                    <span class="number">10,120</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "template/penutup.php" ?>