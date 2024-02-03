<?php
session_start();
include 'koneksi.php';

// $id = $_GET['id']; 
// echo $_SESSION['Id_User'];

// echo $id;

$id_user = $_SESSION['user_id']; // Mendapatkan ID User dari sesi
$id_event = $_GET['id']; // Mendapatkan ID Event dari form
// $no_tiket = 'dummy'; // Mendapatkan Nomor Tiket dari form

// echo $id_user, "\n";
// echo $id_event, "\n";
// echo $no_tiket;

// $_SESSION['user_id'] = $row['Id_User'];
// $_SESSION['id_event'] = $row['Username'];
// $_SESSION['no_tiket'] = $row['No_Tiket'];

// $query = ;
mysqli_query($conn, "INSERT INTO tiket (Id_User, Id_Event, No_Tiket) VALUES ($id_user, $id_event, '0')");

// if (mysqli_query($conn, $query)) {
//   echo "Data tiket berhasil ditambahkan.";
// } else {
//   echo "Error: " . mysqli_error($conn);
// }


?>





