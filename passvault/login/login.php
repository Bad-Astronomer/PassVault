<?php
include('C:\xampp\htdocs\passvault\server.php') 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form name = "login" action="login.php" method = 'post'>
                    <?php include('C:\xampp\htdocs\passvault\errors.php'); ?>
                    <h2>LOGIN</h2>
                    <div class="inputbox">
                        <!-- <ion-icon name="mail-outline"></ion-icon> -->
                        <!-- <label for="">E-mail</label> -->
                        <input type="email" name = 'email' placeholder = "Enter Email" title="Invalid Email" required>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                        <!-- <label for="">Password</label> -->
                        <input type="password" placeholder = "Password" name = 'password' required>
                    </div>
                    <input type="hidden" id = "otp" name = 'OTP' value = "******" readonly>
                    <div class="forget">
                        <label for=""><a href="../multifactor/multifactor.php">Forgot Password?</a></label>
                    </div>
                    <button type="submit" class="btn" name="login_user">LOGIN</button>
                    <div class="register">
                        <p>Don't have an account? <a href="signup.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src = "script.js"></script>
    <script> 
        let otp = ""
        for(let i = 0; i < 6; i++){
            otp += Math.floor(Math.random()*10);
        }
        console.log(otp);
        document.getElementById("otp").value = otp;
   </script>
   
</body>
</html>