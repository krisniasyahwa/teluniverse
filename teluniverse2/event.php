<?php
session_start();
include 'koneksi.php';

$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$waktu = $_POST['waktu'];
$tempat = $_POST['tempat'];

$namaFile = $_FILES['poster']['name']; // Nama file yang diunggah
$tmpFile = $_FILES['poster']['tmp_name']; // Lokasi file sementara pada server

$tujuanFile = 'img/Poster/' . $namaFile; // Tentukan direktori tujuan file

// Pindahkan file ke direktori tujuan
if (move_uploaded_file($tmpFile, $tujuanFile)) {
  // File berhasil diunggah, lakukan penyimpanan data ke database

  $query = "INSERT INTO event (Judul_Event, Kategori, Deskripsi, Poster, Waktu, Tempat) VALUES ('$judul', '$kategori', '$deskripsi', '$tujuanFile', '$waktu', '$tempat')";

  if (mysqli_query($conn, $query)) {
    echo "Data berhasil ditambahkan.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else {
  echo "File gagal diunggah.";
}
?>
