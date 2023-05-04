<?php
include('C:\xampp\htdocs\passvault\server.php');
  if (!isset($_SESSION['email'])) {
  	header('location: ../login/login.php');
  }
  if (!isset($_SESSION['username'])) {
    header('location: ../login/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header('location: ../login/login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassVault | Change Master Password</title>
    <link rel="stylesheet" href="changepass.css">
</head>
<body>
    <section>
        <div class="signupform-box">
            <div class="form-value">
                <form name = "signup" action="changepass.php" method="POST">
                    <?php include('C:\xampp\htdocs\passvault\errors.php'); ?>
                    <h2>CHANGE MASTER PASSWORD</h2>
                    <div class="inputbox">
                        <!-- <ion-icon name="mail-outline"></ion-icon> -->
                        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" readonly>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                        <input type="password" placeholder = "Enter New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" title="Must contain at least one  number and one uppercase and lowercase letter, and 8 to 15 characters" name="password" required>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                        <input type="password" placeholder = "Confirm New Password" name="confirmPassword" required>
                    </div>
                    <button type="submit" class="btn" name="change_pwd">CHANGE PASSWORD</button>
                </form>
            </div>
        </div>
    </section>
    <script src = "../login/script.js"></script>
</body>
</html>