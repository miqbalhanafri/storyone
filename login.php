<?php 
// cek apakah tombol submit sudah di tekan atau belum
// if ( isset($_POST["submit"])) {
// 	// cek username dan password
// 	if ( $_POST["username"] == "admin" && $_POST["password"] == "123" ) {
// 	// jika benar redirect ke halaman admin
// 	header("Location: menu.php");
// 	exit;
// 	} else {
// 	// jika salah, tampilkan pesan kesalahan
// 	$error = true;
// 	}
// }

session_start();
require 'functions.php';

// set cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}

	
}

if ( isset($_SESSION["login"]) ) {
	header("Location: menu.php");
	exit;
}


if ( isset($_POST["login"])) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if ( mysqli_num_rows($result) === 1 ) {
		
		// cek password
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;
			

			$_SESSION["userId"] = $row["id"];
				
			// cek remember me
			if ( isset($_POST["remember"]) ) {
				//buat cookie
				setcookie('login', 'true', time() + 60 );
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}

			header("Location: menu.php");
			exit;
		}

	}

	// jika cek username ada error kesini
	$error = true;
}



 ?>

<!DOCTYPE html>
<html>
<title>GIDLE - Storytelling</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="shortcut icon" href="images/favicon.png">
<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body {
  background-image: url('images/background_hijau.png');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
<body class="w3-text-white">

<div class="w3-content w3-display-container" style="max-width:900px;">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/icon_story.png" width="40px"> RDST reflect with DST <br>數位敘事反思平台</h1></a>
</header>

<div class="w3-container w3-margin-top w3-mobile">

	<form action="" method="POST" class="w3-container w3-large w3-lime">

	<h1>Log in (登入)</h1> 
	<p style="font-size: 30px;">使用者名字範例：第X組_姓名，或第X組_姓名_組長</p>
<?php if (isset($error)) : ?>
	<p style="color: red; font-style: italic;">Sorry, your password is incorrect</p>
<?php endif; ?>
	<p>
	<label for="username">Username (使用者名字)</label>
	<input class="w3-input" type="text" style="width:100%" name="username" id="username" required>
	</p>
	<p>
	<label for="password">Password (密碼)</label>
	<input class="w3-input" type="password" style="width:100%" name="password" id="password" required>
	</p>

	<p>
	<input class="w3-check" type="checkbox" checked="checked" name="remember">
	<label>Stay logged in (保持登入)</label></p>

	<p>
	<button type="submit" name="login" class="w3-button w3-section w3-green w3-ripple"> Log in (登入)</button>
	</p>
	<p>Not a member yet? 尚未是成員? <a href="registration.php">Register 註冊</a>.</p>


	</form>

</div>

</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>
  
</body>
</html>

