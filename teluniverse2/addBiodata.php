<?php
session_start();
include 'koneksi.php';

// Proses input data
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $sekolah_kampus = $_POST['sekolah_kampus'];
    $jurusan = $_POST['jurusan'];
    $instansi = $_POST['instansi'];
  
    // Query untuk memasukkan data ke dalam tabel "biodata"
    $query = "INSERT INTO biodata (fullname, username, email, gender, sekolah_kampus, jurusan, instansi) 
              VALUES ('$fullname', '$username', '$email', '$gender', '$sekolah_kampus', '$jurusan', '$instansi')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data biodata berhasil disimpan');</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan data biodata: " . mysqli_error($conn) . "');</script>";
    }
 

?>