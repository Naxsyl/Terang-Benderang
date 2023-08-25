<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Navbar -->
  <nav>
    <div class="container navbar">
      <div class="logo">
        <a href="#">Terang <b>Benderang</b></a>
      </div>
      <div class="menu">
        <a href="index.php">Home</a>
        <a href="product.php">Product</a>
        <a href="about-us.php">About Us</a>
        <a href="contact-us.php">Contact Us</a>

        <?php if (isset($_SESSION["role"])) : ?>
          <?php if (!isset($_SESSION["role"]) || $_SESSION["role"] == 1) : ?>
            <a href="dashboard.php">Dashboard</a>
          <?php endif; ?>
          <a href="logout.php">Logout</a>
        <?php else : ?>
          <a href="login.php">Login</a>
        <?php endif; ?>

      </div>
      <div class="btn-menu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </nav>