<?php require_once "core/init.php" ?>

<?php
if (!isset($_SESSION["role"]) || $_SESSION["role"] != 1) {
    header("Location: login.php");
    exit();
}
// Get Product
$product = getAllProducts($conn);
?>

<?php require_once "template/sidebar.php" ?>
<!-- Home -->

<section class="home">
    <div class="container">
        <div class="text">Product</div>
        <div class="tambah">
            <i class='bx bx-plus'></i>
            <a href="tambah-data.php">Tambah Data</a>
        </div>
        <table class="table" border="1" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Country</th>
                <th>deskripsi</th>
                <th>Image</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Tanggal Dibuat</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($product as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["name"]; ?></td>
                    <td><?= $row["country"]; ?></td>
                    <td><?= $row["description"]; ?></td>
                    <td>
                        <img src="<?= $row["image"]; ?>" alt="" width="100px">
                    </td>
                    <td><?= $row["stock"]; ?></td>
                    <td><?= $row["price"]; ?></td>
                    <td><?= $row["created_at"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</section>

<?php require_once "template/penutup.php" ?>