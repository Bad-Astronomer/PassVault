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

function decrypt($encryption){
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
  
    $decryption_iv = random_bytes($iv_length);
    $decryption_key = "JoeyChandler";
    $decryption = openssl_decrypt ($encryption, $ciphering,
          $decryption_key, $options, $encryption_iv);
  
    return $decryption;
}

$db = mysqli_connect('localhost', 'root', '', 'passvault');
$query = "SELECT * FROM website WHERE master_nm = '".$_SESSION['username']."'";
$result = mysqli_query($db, $query);

$tags = array();
$passwords = array();

while ($row = mysqli_fetch_array($result)) {
  // Populate each array with the corresponding value from the row
  $tags[] = $row['website_usrnm'];
  $passwords[] = decrypt($row['website_pwd']);
}

echo '<script>';
echo 'var tags = ' . json_encode($tags) . ';';
echo 'var passwords = ' . json_encode($passwords) . ';';
echo '</script>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassVault | Vault</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="search-container">
        <div class="backbtn" onclick="window.location.href = '../home_main/home.php'">
            <p>^</p>
        </div>
        <div class="searchbar">
            <div class="search-text-container">
                <input id="search-password" type="text" placeholder="Search Your Vault">
            </div>
            <div class="search-icon-container">
                <img src="./assets/search-icon.svg">
            </div>
        </div>
    </div>

    <div class="vault-container">
        <div class="vaultbox">
            <div id="entrybox" class="entrybox">
                <h2 id="search-error">NO PASSWORDS FOUND</h2>
            </div>
        </div>

        <div class="options-container">
            <div class="options" id="edit-password" onclick="edit_password(event)">EDIT PASSWORD</div>
            <div class="options" id="add-password" onclick = "window.location.href = '../vault/addpass.php'">ADD PASSWORD</div>
        </div>
    </div>

    <div id="copy-alert">COPIED!</div>

    <script src = "../login/script.js"></script>
    <script src="script.js"></script>
</body>
</html>