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
    <title>Passvault | Generate</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <div class="pwd-container">
            <h2 id="header">PASSWORD GENERATOR</h2>
            <div class="wrapper">
                <h2 id="password" class="button" onclick="copy_pwd(0)">************</h2>
                <img src="./assets/copy.svg" alt="" id="copy-img">
            </div>
            <div id="generate" class="button" onclick="generate_pwd()">
                <p>&nbsp&nbsp</p>
                <p>GENERATE</p>
                <img src="./assets/regenerate.svg" alt="">
            </div>
            <div class="settings-container">
                <div id="password-size">
                    <div>
                        <p>PASSWORD SIZE</p>
                        <p id="password-size-label">12</p>
                    </div>
                    <input type="range" min="4" max="16" value="12" class="slider" id="password-size-slider">
                    <div class="checkbox-container">
                        <div class="checkbox-wrapper">
                            <p>LETTERS</p>
                            <div class="checkbox" onclick="toggle_charset(event, 0)"></div>
                        </div>
                        <div class="checkbox-wrapper">
                            <p>NUMBERS</p>
                            <div class="checkbox" onclick="toggle_charset(event, 1)"></div>
                        </div>
                        <div class="checkbox-wrapper">
                            <p>SYMBOLS</p>
                            <div class="checkbox" onclick="toggle_charset(event, 2)"></div>
                        </div>
                        <div class="checkbox-wrapper">
                            <p>CASE</p>
                            <div class="checkbox" onclick="toggle_charset(event, 3)"></div>
                        </div>
                        <div class="checkbox-wrapper">
                            <p>DEVNAGRI</p>
                            <div class="checkbox" onclick="toggle_charset(event, 4)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <p id="save-button" class="button" onclick="copy_pwd(1)">COPY AND SAVE</p>
        </div>

        <div id="copy-alert">COPIED!</div>
    </div>

    <script src="script.js"></script>
    <!-- <script src = "../login/script.js"></script> -->
</body>
</html>
