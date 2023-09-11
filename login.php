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

    $role = login($conn, $username, $password);

    if ($role !== false) {
        // Login berhasil
        $_SESSION["role"] = $role;
        if ($role === 1) {
            header("Location: dashboard.php");
            exit();
        } elseif ($role === 0) {
            header("Location: index.php");
            exit();
        }
    } else {
        $error = true;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <section class="wrapper">
        <div class="form signup">
            <header>Signup</header>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Full name" required />
                <div class="password-container">
                    <input type="password" name="password" id="password" placeholder="Password" required />
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>
                <div class="password-container">
                    <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" required />
                    <i class="fas fa-eye" id="togglePassword2"></i>
                </div>
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
                <div class="password-container">
                    <input type="password" name="password" id="passwordLogin" placeholder="Password" required />
                    <i class="fas fa-eye" id="togglePasswordLogin"></i>
                </div>
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
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");
            const togglePassword2 = document.querySelector("#togglePassword2");
            const password2 = document.querySelector("#password2");
            const togglePasswordLogin = document.querySelector("#togglePasswordLogin");
            const passwordLogin = document.querySelector("#passwordLogin");

            togglePassword.addEventListener("click", function() {
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

                // Ganti ikon mata sesuai dengan status password
                if (type === "password") {
                    togglePassword.classList.remove("fa-eye-slash");
                    togglePassword.classList.add("fa-eye");
                } else {
                    togglePassword.classList.remove("fa-eye");
                    togglePassword.classList.add("fa-eye-slash");
                }
            });
            togglePassword2.addEventListener("click", function() {
                const type = password2.getAttribute("type") === "password" ? "text" : "password";
                password2.setAttribute("type", type);

                // Ganti ikon mata sesuai dengan status password
                if (type === "password") {
                    togglePassword2.classList.remove("fa-eye-slash");
                    togglePassword2.classList.add("fa-eye");
                } else {
                    togglePassword2.classList.remove("fa-eye");
                    togglePassword2.classList.add("fa-eye-slash");
                }
            });
            togglePasswordLogin.addEventListener("click", function() {
                const type = passwordLogin.getAttribute("type") === "password" ? "text" : "password";
                passwordLogin.setAttribute("type", type);

                // Ganti ikon mata sesuai dengan status password
                if (type === "password") {
                    togglePasswordLogin.classList.remove("fa-eye-slash");
                    togglePasswordLogin.classList.add("fa-eye");
                } else {
                    togglePasswordLogin.classList.remove("fa-eye");
                    togglePasswordLogin.classList.add("fa-eye-slash");
                }
            });
        </script>
    </section>
</body>

</html>