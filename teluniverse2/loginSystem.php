<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Verifikasi email dan password apakah sudah ada di database
$query = mysqli_query($conn, "SELECT * FROM user WHERE Email = '$email'");

// Jika data Email ada di dalam database
if (mysqli_num_rows($query) > 0) {

  // Mengambil data row dari database
  $row = mysqli_fetch_assoc($query);

  // Melakukan verifikasi password
  if (password_verify($password, $row['Password'])) {

    // Email dan password cocok, buat sesi dan alihkan ke halaman utama sesuai role
    $_SESSION['user_id'] = $row['Id_User'];
    $_SESSION['username'] = $row['Username'];
    $_SESSION['role'] = $row['Role'];

    if ($row['Role'] == 'admin') {
      header("Location: admin.php");
    } else {
      header("Location: index.php");
    }
    exit();
  } else {
    echo "<script>alert('Password yang Anda masukkan salah.'); window.history.back();</script>";
  }

} else {
  echo "<script>alert('Email yang Anda masukkan salah.'); window.history.back();</script>";
}
?>
