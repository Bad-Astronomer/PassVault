<?php
  session_start(); 
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
    <title>Passvault | Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <h2 id="title">PROFILE</h2>
            <div class="photo-container">
                <img src="./assets/profile.svg" id="photo">
            </div>
            <div id="username"><?php echo $_SESSION['username']?></div>
            <div id="backupmail"><?php echo $_SESSION['email'] ?></div>
            <div id="changepwd" onclick="window.location.href = '../profile/changepass.php'">CHANGE MASTER PASSWORD</div>
            <div id="logout"><a href="index.php?logout='1'">LOGOUT</a></div>    
        </div>
    </div>
    <script src = "../login/script.js"></script>
</body>
</html>