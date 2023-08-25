<?php
function getAllProducts($conn)
{
    $sql = "SELECT * FROM product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function registrasi($data, $conn)
{
    try {
        $username = strtolower(stripslashes($data["username"]));
        $password = $data["password"];
        $password2 = $data["password2"];

        // Cek username sudah ada atau belum
        $stmt = $conn->prepare("SELECT username FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->fetch()) {
            echo "<script>
                    alert('Username sudah terdaftar');
                </script>";
            return false;
        }

        // Cek konfirmasi password
        if ($password != $password2) {
            echo "<script>
                    alert('Konfirmasi Password Tidak Sesuai!');
                </script>";
            return false;
        }

        // Enkripsi password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Tambahkan user baru ke database
        $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->execute();

        return $stmt->rowCount();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// function cek_status($nama)
// {
//     global $conn;
//     $nama = strtolower(stripslashes($nama["username"]));
//     $query = "SELECT role FROM user WHERE username='$nama'";
//     $result = mysqli_query($conn, $query);
//     $status = mysqli_fetch_assoc($result)['status'];
//     die($status);
//     return $status;
// }

function cek_status($nama)
{
    global $conn;

    $nama = strtolower(stripslashes($nama["username"]));
    $query = "SELECT role FROM user WHERE username = :nama";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
    $stmt->execute();

    $status = $stmt->fetch(PDO::FETCH_ASSOC)['role'];
    return $status;
}
