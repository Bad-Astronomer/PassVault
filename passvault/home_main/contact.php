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
    <title>PassVault | Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="signupform-box">
            <div class="form-value">
                <form name = "signup" action="contact.php" method="POST">
                    <?php include('C:\xampp\htdocs\passvault\errors.php');?>
                    <h2>CONTACT US</h2>
                    <div class="inputbox">
                        <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>
                    <div class="inputbox">
                        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" readonly>
                    </div>
                    <div class="inputbox">
                        <input type="text" placeholder = "MOBILE NUMBER" pattern="[0-9]{10}" title="Invalid Contact Number" name="ph_num" required>
                    </div>
                    <div class="inputbox">
                        <input type="text" placeholder = "ENTER FEEDBACK/QUERY" name="feedback" required>
                    </div>

                    <button type="submit" class="btn" name="contact_us">SUBMIT</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>