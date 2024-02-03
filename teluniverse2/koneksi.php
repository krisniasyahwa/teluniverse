<?php
$server   = "localhost";
$database = "telu";
$username = "root";
$password = "";

//$conn sebagai alamat koneksi
$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>