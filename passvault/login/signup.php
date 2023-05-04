<?php
include('C:\xampp\htdocs\passvault\server.php') 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="signupform-box">
            <div class="form-value">
                <form name = "signup" action="signup.php" method="POST">
                    <?php include('C:\xampp\htdocs\passvault\errors.php');?>
                    <h2>SIGNUP</h2>
                    <div class="inputbox">
                        <!-- <ion-icon name="mail-outline"></ion-icon> -->
                        <!-- <label for="">Enter Full Name</label> -->
                        <input type="text" name="username" placeholder = "Enter Full Name" value="<?php echo $username; ?>" required>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="mail-outline"></ion-icon> -->
                        <!-- <label for="">E-mail</label> -->
                        <input type="email" name="email" placeholder = "Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title = "Enter Valid Email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                        <!-- <label for="">Password</label> -->
                        <input type="password" placeholder = "Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" title="Must contain at least one  number and one uppercase and lowercase letter, and 8 to 15 characters" name="password" required>
                    </div>
                    <div class="inputbox">
                        <!-- <ion-icon name="lock-closed-outline"></ion-icon> -->
                        <!-- <label for="">Confirm Password</label> -->
                        <input type="password" placeholder = "Confirm Password" name="confirmPassword" required>
                    </div>
                    <input type="hidden" id = "otp" name = 'OTP' value = "******" readonly>

                    <button type="submit" class="btn" name="reg_user">REGISTER</button>
                    <div class="register">
                        <p>Already Registered ? <a href="login.php">Login Now</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script> 
        let otp = ""
        for(let i = 0; i < 6; i++){
            otp += Math.floor(Math.random()*10);
        }
        console.log(otp);
        document.getElementById("otp").value = otp;
   </script>
    <script src = "script.js"></script>
</body>
</html>