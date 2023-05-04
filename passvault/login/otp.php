<?php
include('C:\xampp\htdocs\passvault\server.php');
  if (!isset($_SESSION['email'])) {
  	header('location: ../login/login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassVault | Multifactor Authentication</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input[name = "email"] ~ label{
            top: 20px;
            color: var(--primary-light);
        }
    </style>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form name = "login" action="otp.php" method = 'post'>
                    <?php include('C:\xampp\htdocs\passvault\errors.php'); ?>
                    <h2>AUTHENTICATION</h2>
                    <div class="inputbox">
                        <!-- <ion-icon name="mail-outline"></ion-icon> -->
                        <label for="">E-mail</label>
                        <input type="email" name = 'email' value = <?php echo $_SESSION['email'];?> readonly>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                        <label for="">Enter OTP</label>
                        <input type="password" name = 'OTP' pattern = [0-9]{6} title = "Invalid OTP" required>
                    </div>
                    <button type="submit" class="btn" name="otp">LOGIN</button>
                </form>
            </div>
        </div>
    </section>
    <script src = "script.js"></script>
</body>
</html>