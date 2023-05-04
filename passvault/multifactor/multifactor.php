<?php
include('C:\xampp\htdocs\passvault\server.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassVault | Multifactor Authentication</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form name = "login" action="multifactor.php" method = 'post'>
                    <?php include('C:\xampp\htdocs\passvault\errors.php'); ?>
                    <h2>AUTHENTICATION</h2>
                    <div class="inputbox">
                        <!-- <ion-icon name="mail-outline"></ion-icon> -->
                        <label for="">E-mail</label>
                        <input type="email" name = 'email' title="Invalid Email" required>
                    </div>
                    <input type="hidden" id = "otp" name = 'OTP' value = "******" readonly>
                    <button type="submit" class="btn" name="multifactor">SEND OTP</button>
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
    <script src = "../login/script.js"></script>
</body>
</html>