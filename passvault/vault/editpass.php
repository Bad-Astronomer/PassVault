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
    <title>PassVault | Edit Password</title>
    <link rel="stylesheet" href="editpass.css">
</head>
<body>
    <section>
        <div class="signupform-box">
            <div class="form-value">
                <form name = "signup" action="editpass.php" method="POST">
                    <?php include('C:\xampp\htdocs\passvault\errors.php'); ?>
                    <h2>EDIT PASSWORD</h2>
                    <div class="inputbox">
                        <!-- <ion-icon name="mail-outline"></ion-icon> -->
                        <!-- <label for="">Name</label> -->
                        <input type="hidden" name="username" placeholder = "Name" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="mail-outline"></ion-icon> -->
                        <!-- <label for="">Enter Website/Software Name</label> -->
                        <input type="text" name="webname" id="web_name" placeholder = "Enter Website Name" pattern = "[A-Za-z]{2,}" title = "Invalid Name" value = "****" readonly>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                        <!-- <label for="">Password</label> -->
                        <input type="hidden" name="old_webpass" id="old_pass" value = "***" readonly>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                        <!-- <label for="">Password</label> -->
                        <input type="text" name="webpass" placeholder = "Enter Password" id="show_pass" value = "***" required>
                    </div>
                    <!-- <button type="submit" class="btn" onclick='pwd_maker()'>Show Password</button> -->
                    <button type="submit" class="btn" name="edit_pass">SAVE</button>
                    <button type="submit" class="btn" id = "deletepass" name="delete_pass">DELETE</button>
                </form>
            </div>
        </div>
    </section>
    <script src = "../login/script.js"></script>
    <script src="script.js"></script>

    <script>
        document.getElementById('web_name').value = localStorage.getItem('webname');
        document.getElementById('show_pass').value = localStorage.getItem('webpass');
        document.getElementById('old_pass').value = localStorage.getItem('webpass');
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>