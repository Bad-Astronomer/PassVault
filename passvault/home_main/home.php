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
    <title>PassVault | Home</title>
    <link rel="stylesheet" href="home-style.css">
</head>
<body>
    <div class="container">
        <div id="navbar">
            <div class="navbar-items" id="logo">
                <img src="./assets/lock.svg" alt="">
            </div>
            <div class="navbar-items" id="progress-bar"></div>
            <div class="navbar-items" id="profile" onclick="window.location.href = '../home_main/instruction.php'">INSTRUCTIONS</div>
            <div class="navbar-items" id="contact" onclick = "window.location.href = '../home_main/contact.php'">CONTACT US</div>
            <div class="navbar-items" id="logout"><a href="home.php?logout='1'">LOGOUT</a></div>
        </div>

        <div id="features-container">
            <div onclick="window.location.href = '../pwd_gen/index.php'" class="features">
                <p>Automatically generates customizable random passwords to create strong logins</p>
                <h2>Password Generator</h2>
            </div>
            <div onclick="window.location.href = '../vault/index.php'" class="features">
                <p>Securely store and access your passwords</p>
                <h2>Access Your PassVault</h2>
            </div>
            <div class="features" style= "color: rgba(255, 255, 255, 0.5)">
                <p>Your confidential documents, locked and accessible only to you!</p>
                <h2>DocVault | Coming Soon!!</h2>
            </div>
            <div onclick="window.location.href = '../profile/index.php'" class="features">
                <p>View and personalize your PassVault profile</p>
                <h2>Profile</h2>
            </div>

        </div>
    </div>

    <script src="home-script.js"></script>
</body>
</html>