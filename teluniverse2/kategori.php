<?php
session_start();
include 'koneksi.php';

$kategori = $_GET['Kategori']; // Mendapatkan kategori dari URL parameter
// $kategori = 'sport';

$query = "SELECT * FROM event WHERE Kategori = '$kategori'";
$result = mysqli_query($conn, $query);

if ($result) {
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      // Ambil nilai kolom yang diinginkan
      $judul = $row['Judul_Event'];
      $deskripsi = $row['Deskripsi'];

      // Tampilkan data
      echo "Judul: " . $judul . "<br>";
      echo "Deskripsi: " . $deskripsi . "<br>";
      // ...
    }
  } else {
    echo "Data tidak ditemukan.";
  }
} else {
  echo "Error: " . mysqli_error($conn);
}
?>
