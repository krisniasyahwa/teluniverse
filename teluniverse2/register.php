<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php';

// Validasi input sebelum memproses signup
if (isset($_POST['signup'])) {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Cek apakah semua field telah diisi
  if (empty($email) || empty($username) || empty($password)) {
    echo "<script>
      alert('Semua field harus diisi!');
      window.history.back();
      </script>";
    exit; // Menghentikan eksekusi script selanjutnya
  }

  // Cek apakah email yang dimasukkan valid
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
      alert('Email yang dimasukkan tidak valid!');
      window.history.back();
      </script>";
    exit;
  }

  // Cek apakah email sudah digunakan sebelumnya
  $checkQuery = "SELECT * FROM user WHERE email = ?";
  $checkStmt = mysqli_prepare($conn, $checkQuery);
  mysqli_stmt_bind_param($checkStmt, "s", $email);
  mysqli_stmt_execute($checkStmt);
  $checkResult = mysqli_stmt_get_result($checkStmt);

  if (mysqli_num_rows($checkResult) > 0) {
    echo "<script>
      alert('Email sudah digunakan!');
      window.history.back();
      </script>";
    exit;
  }

  // Hash password menggunakan bcrypt
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  // Query untuk menyimpan data user ke database
  $query = "INSERT INTO user (username, password, role, email) VALUES (?, ?, 0, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $email);
  $hasil = mysqli_stmt_execute($stmt);

  if ($hasil) {
    echo "<script>
      alert('Data berhasil disimpan!');
      document.location.href='../frontend/login.php';
      </script>";
  } else {
    echo "<script>
      alert('Terjadi kesalahan saat menyimpan data!');
      window.history.back();
      </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="up.css">
  <title>SIGN UP</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="signup.php" method="post">
                    <h2>Sign up</h2>
                    <div class="inputbox">
                        <input type="text" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="username" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
                      
                    </div>
                   <!--- <input type="submit" value="signup" style="button"> -->
                    <button type="submit" name="signup" class="btn btn-dark">Sign up</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html> 