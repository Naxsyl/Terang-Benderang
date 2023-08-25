<?php require_once "core/init.php" ?>

<?php
if (!isset($_SESSION["role"]) || $_SESSION["role"] != 1) {
  header("Location: login.php");
  exit();
}
if (isset($_POST['submit'])) {

  $file_name = $_FILES['image']['name'];
  $file_size = $_FILES['image']['size'];
  $file_tmp = $_FILES['image']['tmp_name'];
  $file_type = $_FILES['image']['type'];
  $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

  $extensions = array("jpeg", "jpg", "png", "gif");

  if (in_array($file_ext, $extensions) === false) {
    echo "<script>alert('Extension not allowed, please choose a JPEG or PNG file.')</script>";
  }

  if ($file_size > 2097152) {
    echo "<script>alert('File size must be excately 2 MB')</script>";
  }

  $file_name = time() . '_' . $file_name;
  move_uploaded_file($file_tmp, "upload/" . $file_name);
  $file_name = "upload/" . $file_name;
  $sql = "INSERT INTO product (name, country, description, image, stock, price)
          VALUES
          (:name, :country, :description, :image, :stock, :price)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':country', $_POST['country']);
  $stmt->bindParam(':description', $_POST['description']);
  $stmt->bindParam(':image', $file_name);
  $stmt->bindParam(':stock', $_POST['stock']);
  $stmt->bindParam(':price', $_POST['price']);
  $stmt->execute();

  echo "<script>alert('Data Berhasil Ditambahkan!')</script>";

  header("Location: product-dashboard.php");
}

?>

<?php require_once "template/sidebar.php" ?>
<section class="home">
  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data" class="styled-form">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter name" required>
      </div>
      <div class="form-group">
        <label for="country">Country</label>
        <input type="text" id="country" name="country" placeholder="Enter country" required>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5" placeholder="Enter description"></textarea>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" required>
      </div>
      <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" placeholder="Enter stock" required>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" placeholder="Enter price" required>
      </div>
      <button type="submit" name="submit" class="styled-button">Save</button>
    </form>
  </div>
</section>

<?php require_once "template/penutup.php" ?>