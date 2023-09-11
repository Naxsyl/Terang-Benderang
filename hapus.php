<?php require_once "core/init.php";
$id = $_GET["id"];
if (hapus($id)) {
    echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'product-dashboard.php';
        </script>
        ";
} else {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'product-dashboard.php';
            </script>
            ";
}
