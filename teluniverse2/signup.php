<?php
session_start();
include 'koneksi.php';
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

                <form action="signupSystem.php" method="post">
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