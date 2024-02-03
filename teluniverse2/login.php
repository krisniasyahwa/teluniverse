<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="up.css">
  <title>LOGIN</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">

                <form action="loginSystem.php" method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
                      
                    </div>
                    <button type="submit" name="login">Log in</button>
                    <div class="register">
                        <p>Don't have an account? <a href="#">Register</a></p>
                    </div>
                </form>

                
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>