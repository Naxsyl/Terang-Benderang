<?php
require_once "core/init.php";

if (isset($_POST["register"])) {
    if (registrasi($_POST, $conn) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<?php

// Mengecek apakah form login telah di-submit
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Menyiapkan dan menjalankan kueri untuk mengambil data user berdasarkan username
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Mengambil hasil kueri dalam bentuk asosiatif
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Mengecek apakah user ada dan password cocok
    if ($row && password_verify($password, $row["password"])) {
        $_SESSION["role"] = $row["role"];
        if ($row["role"] === 1) {
            header("Location: dashboard.php"); // Redirect ke dashboard.php
            exit();
        } elseif ($row["role"] === 0) {
            header("Location: index.php"); // Redirect ke index.php
            exit();
        }
    } else {
        $error = true; // Menandai adanya error
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Signup Form</title>
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <section class="wrapper">
        <div class="form signup">
            <header>Signup</header>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Full name" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="password" name="password2" placeholder="Konfirmasi Password" required />
                <div class="checkbox">
                    <input type="checkbox" id="signupCheck" />
                    <label for="signupCheck">I accept all terms & conditions</label>
                </div>
                <input type="submit" name="register" value="Signup" />
            </form>
        </div>

        <div class="form login">
            <header>Login</header>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <a href="#">Forgot password?</a>
                <input type="submit" name="login" value="Login" />
            </form>
        </div>

        <script>
            const wrapper = document.querySelector(".wrapper"),
                signupHeader = document.querySelector(".signup header"),
                loginHeader = document.querySelector(".login header");

            loginHeader.addEventListener("click", () => {
                wrapper.classList.add("active");
            });
            signupHeader.addEventListener("click", () => {
                wrapper.classList.remove("active");
            });
        </script>
    </section>
</body>

</html>