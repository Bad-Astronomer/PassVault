<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'passvault');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['confirmPassword']);
  $OTP = mysqli_real_escape_string($db, $_POST['OTP']);

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username Already Exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email Already Exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = encrypt($password_1);
  	$query = "INSERT INTO user (username, email, pwd, OTP) 
  			  VALUES('$username', '$email', '$password', '$OTP')";
  	mysqli_query($db, $query);
    email($email, $OTP);
  	$_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
  	header('location: ../login/otp.php');
    echo $password;
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $OTP = mysqli_real_escape_string($db, $_POST['OTP']);
  // $md5_pass = $password;
  $md5_pass = encrypt($password);

  $query = "SELECT * FROM user WHERE email='$email' AND pwd='$md5_pass'";

  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) == 1) {
    email($email, $OTP);
    $otp_query = "UPDATE user SET OTP='$OTP' WHERE email='$email'";
    mysqli_query($db, $otp_query);
    $_SESSION['email'] = $email;
    $query1 = "SELECT username FROM user WHERE email='$email'";
    $result = mysqli_fetch_assoc(mysqli_query($db, $query1));
    $username = $result['username'];
    $_SESSION['username'] = $username;
    header('location: ../login/otp.php');
  }else {
    array_push($errors, "Wrong username/password combination");
  }
}


//Change Password
if (isset($_POST['change_pwd'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $newpass = mysqli_real_escape_string($db, $_POST['password']);
  $newpass_1 = mysqli_real_escape_string($db, $_POST['confirmPassword']);
  if ($newpass != $newpass_1) {
    array_push($errors, "The two passwords do not match");
  }
  $newpass = encrypt($newpass);
  $query = "UPDATE user SET pwd='$newpass' WHERE email='$email'";
  if (mysqli_query($db, $query)) {
    header('location: ../home_main/home.php');
  }
}


//multifactor: otp generation
if(isset($_POST['multifactor'])){
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $OTP = mysqli_real_escape_string($db, $_POST['OTP']);
  
  $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if($user){
    if($user['email'] === $email){
      
      email($email, $OTP);
      $query = "UPDATE user SET OTP='$OTP' WHERE email='$email'";
  	  mysqli_query($db, $query);
      $_SESSION['email'] = $email;
      header('location: ../multifactor/otp.php');
    }
  }
  else{
    array_push($errors, "Email does not exist");
  }
}

//otp authentication
if(isset($_POST['otp'])){
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $OTP = mysqli_real_escape_string($db, $_POST['OTP']);

  $query = "SELECT * FROM user WHERE email='$email' and OTP = '$OTP'";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) == 1) {
    $_SESSION['email'] = $email;
    $query1 = "SELECT username FROM user WHERE email='$email'";
    // mysqli_query($db, $query1);
    $result = mysqli_fetch_assoc(mysqli_query($db, $query1));
    $username = $result['username'];
    $_SESSION['username'] = $username;
    header('location: ../home_main/home.php');
  }else {
    array_push($errors, "Incorrect OTP");
  }
}

//Feedback
if (isset($_POST['feedback'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $ph_num = mysqli_real_escape_string($db, $_POST['ph_num']);
  $feedback = mysqli_real_escape_string($db, $_POST['feedback']);

  $query = "INSERT INTO feedback (username, email, ph_num, feedback) 
          VALUES('$username', '$email', '$ph_num', '$feedback')";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $_SESSION['email'] = $email;
  header('location: ../home_main/home.php');
}

//saving website passwords
if (isset($_POST['save_pass'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $webpass = mysqli_real_escape_string($db, $_POST['webpass']);
  $webname = mysqli_real_escape_string($db, $_POST['webname']);
  
  $webpass = encrypt($webpass);

  $query = "INSERT INTO website (website_usrnm, website_pwd, master_nm) 
          VALUES('$webname', '$webpass', '$username')";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $query1 = "SELECT email FROM user WHERE username='$username'";
  $result = mysqli_fetch_assoc(mysqli_query($db, $query1));
  $email = $result['email'];
  $_SESSION['email'] = $email;
  header('location: ../home_main/home.php');
}

//Edit website passwords
if (isset($_POST['edit_pass'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $webpass = mysqli_real_escape_string($db, $_POST['webpass']);
  $webname = mysqli_real_escape_string($db, $_POST['webname']);
  
  $webpass = encrypt($webpass);

  $query = "UPDATE website SET website_pwd='$webpass' WHERE website_usrnm='$webname'";
  if (mysqli_query($db, $query)) {
    header('location: ../vault/index.php');
  }
}

//Add website passwords
if (isset($_POST['add_pass'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $webpass = mysqli_real_escape_string($db, $_POST['webpass']);
  $webname = mysqli_real_escape_string($db, $_POST['webname']);
  
  $webpass = encrypt($webpass);

  $query = "INSERT INTO website (website_usrnm, website_pwd, master_nm) 
          VALUES('$webname', '$webpass', '$username')";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $query1 = "SELECT email FROM user WHERE username='$username'";
  $result = mysqli_fetch_assoc(mysqli_query($db, $query1));
  $email = $result['email'];
  $_SESSION['email'] = $email;
  header('location: ../vault/index.php');
}

//Delete website passwords
if (isset($_POST['delete_pass'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $webpass = mysqli_real_escape_string($db, $_POST['old_webpass']);
  $webname = mysqli_real_escape_string($db, $_POST['webname']);
  
  $webpass = encrypt($webpass);

  $query = "DELETE FROM website WHERE website_pwd='$webpass'";
  if (mysqli_query($db, $query)) {
    header('location: ../vault/index.php');
  }
}


//Encryption
function encrypt(&$simple_string){
  $ciphering = "AES-128-CTR";
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;

  $encryption_iv = '1234567891011121';
  $encryption_key = "JoeyChandler";
  $encryption = openssl_encrypt($simple_string, $ciphering,
      $encryption_key, $options, $encryption_iv);

  return $encryption;
}

function email(&$email, &$OTP){
  $url = "https://script.google.com/macros/s/AKfycbya0DWi0HfcTgb7wlOH-1hYTBUKyYG7sZKX8oNwulZEqFndNWpZr7P61Kt7zoGglp02kA/exec";
  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_POSTFIELDS => http_build_query([
      "recipient" => $email,
      "subject"   => "PassVault Authentication",
      "body"      => "Your OTP is for verfication is: $OTP"
      ])
    ]);
  curl_exec($ch);
}

?>
