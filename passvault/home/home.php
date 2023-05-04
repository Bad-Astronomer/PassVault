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
        <div id="page1">
            <div id="navbar-container">
                <div id="navbar">
                    <div class="navbar-items" id="logo" onclick = "window.location.href = '#page1'">
                        <img src="./assets/lock.svg" alt="">
                    </div>
                    <div class="navbar-items" id="progress-bar"></div>
                    <div class="navbar-items" id="about" onclick = "window.location.href = '#about-section'">ABOUT</div>
                    <div class="navbar-items" id="login" onclick = "window.location.href = '../login/login.php'">LOGIN</div>
                    <div class="navbar-items" id="get-started" onclick = "window.location.href = '../login/signup.php'">GET STARTED</div>
                </div>
            </div>
    
            <div id="header-container">
                <h2 id="header" data-value="PASSVAULT" onload="hack(event)">PASSVAULT</h2>
            </div>
        </div>

        <div id="page2">
            <div id="about-section">
                <h2>ABOUT</h2>

                <div id="expandable">
                    <div class="expandable-items" onclick = "expand_faq(event)">
                        <h2>WHAT IS PASSVAULT ?</h2>

                        <p>Our application aims to solve the above problem by creating a one-stop destination for generating, storing, and managing passwords which are unique and secure. They will be stored in an encrypted hidden file and can only be accessed through a Master Login. It will have various other functionalities.</p>
                        
                    </div>
                    <div class="expandable-items" onclick = "expand_faq(event)">
                        <h2>WHY USE PASSVAULT ?</h2>

                        <p>In the modern world, we have accounts on multiple platforms which require password authentication. It is difficult to create and remember so many passwords.<br><br>
                        It is always advised that the passwords should be mutually exclusive and unique so the possibility of getting hacked and having our data breached are lesser, considering that some of the information we put out is sensitive and confidential.
                        <br><br>
                        It is difficult to create and remember so many passwords.
                        </p>

                    </div>
                    <div class="expandable-items" id="list" onclick="expand_faq(event)">
                        <h2>WHAT DOES PASSVAULT FEATURE ?</h2>
                        <p>
                            • &nbsp&nbsp Generating secure and random passwords<br>
                            • &nbsp&nbsp Auto-filling information<br>
                            • &nbsp&nbsp A single main login called the Master Login to access to all the passwords<br>
                            • &nbsp&nbsp User has to remember only one password<br>
                            • &nbsp&nbsp Storing the passwords and personal information in a database<br>
                            • &nbsp&nbsp Multi-factor authentication in case one forgets the master login credentials<br>
                            • &nbsp&nbsp Encrypting the passwords using cryptography<br>
                        </p>
                    </div>
                    <div class="expandable-items" onclick = "expand_faq(event)">
                        <h2>HOW TO CREATE AN ACCOUNT ?</h2>
                        <p>
                            Click on "Get Started", which you will find in the navigation bar at the top of screen
                            <br>
                            You will be redirected to a Sign Up page where you will have to put in your details
                            <br>
                            Once you fill in the details, click on Sign Up
                            <br>
                            Your account has been created!
                            <br>
                            Note: This will be your Master Login, you will have to remember the login credentials to access all your passwords
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="home-script.js"></script>
</body>
</html>