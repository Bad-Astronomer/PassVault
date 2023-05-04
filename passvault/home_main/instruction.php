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
    <title>PassVault | Instructions</title>
    <link rel="stylesheet" href="instruction.css">
</head>
<body>
    <div class="backbtn" onclick="window.location.href = '../home_main/home.php'">
        <p>^</p>
    </div>
    <div class="container">
        <div class="header">INSTRUCTIONS</div>
        <div class="box">
            <div class="title">PASSWORD GENERATOR</div>
            <div class="screenshot">
                <img src="./assets/pwd_gen.jpg" alt="" onclick="window.location.href = '#'">
            </div>
            <div class="content">
                <ul>
                    <li>This is where you can generate random, strong passwords.</li>
                    <li>Choose the password length using the scroll bar.</li>
                    <li>Select the various customizations that have been provided; at least one must be selected.</li>
                    <li>Once a password of your liking has been generated, click on <b>"Copy and Save"</b>.</li>
                    <li>You will be redirected to a new page where you have to enter the website details.</li>
                    <li>The password is successfully stored in your passvault.</li>
                </ul>
            </div>
        </div>
        <div class="box">
            <div class="title">PASSVAULT</div>
            <div class="screenshot">
                <img src="./assets/vault.jpg" alt="" onclick="window.location.href = '#'">
            </div>
            <div class="content">
                <ul>
                    <li>Here, you will find all your saved passwords.</li>
                    <li>You can manually search for a particular website's password in the search bar.</li>
                    <li>Once you click an entry, the password gets copied to the clipboard.</li>
                    <li>You can edit an existing password by clicking on <b>"Edit Password"</b>, which redirectes you to a new page where you have to fill in the required details.</li>
                </ul>
            </div>
            <div class="screenshot">
                <img src="./assets/editpwd.jpg" alt="" onclick="window.location.href = '#'">
            </div>
            <div class="content">
                <ul>    
                    <li>Similarly, you can also add a new password for a website manually without using our Password Generator, by clicking on <b>"Add Password"</b>.</li>
                </ul>
            </div>
            <div class="screenshot">
                <img src="./assets/addpwd.jpg" alt="" onclick="window.location.href = '#'">
            </div>
        </div>
        <div class="box">
            <div class="title">PROFILE</div>
            <div class="screenshot">
                <img src="./assets/profile.png" alt="" onclick="window.location.href = '#'">
            </div>
            <div class="content">
                <ul>
                    <li>In the profile, your Username and Master Login E-Mail will be displayed.</li>
                    <li>An option to Change the Master Password has been provided in this section.</li>
                    <li>When you click the <b>"Change Master Password"</b> button, you will be redirected to a new page.</li>
                    <li>On this page, you need to fill in the new password and confirm it.</li>
                    <li>Your Master Login Password will hence get updated.</li>
                    <li>You can also <b>"Log Out"</b> through he Profile Page.</li>
                </ul>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('contextmenu', (e) => e.preventDefault());

        function ctrlShiftKey(e, keyCode) {
        return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
        }

        document.onkeydown = (e) => {
        // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
        if (
            event.keyCode === 123 ||
            ctrlShiftKey(e, 'I') ||
            ctrlShiftKey(e, 'J') ||
            ctrlShiftKey(e, 'C') ||
            (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
        )
            return false;
        }; 
    </script>
</body>
</html>