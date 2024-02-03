<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Pengecekan jika ada kolom yang kosong
if (empty($username) || empty($email) || empty($password)) {
    echo "<script>alert('Silakan lengkapi semua kolom data.'); window.history.back();</script>";
} else {
    // Pengecekan jika email atau username sudah ada
    $query = mysqli_query($conn, "SELECT * FROM user WHERE Email = '$email' OR Username = '$username'");
    if (mysqli_num_rows($query) > 0) {
        echo "<script>alert('Email atau username sudah terdaftar. Silakan gunakan email atau username lain.'); window.history.back();</script>";
    } else {
        // Melakukan hash terhadap password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO user (Email, Password, Username, Role) VALUES ('$email', '$hashedPassword', '$username', 'user')");
        echo "<script>alert('Data berhasil ditambahkan.'); window.location='login.php';</script>";
    }
}
?>
