<?php 
require 'functions.php';

if ( isset($_POST["register"]) ) {

	if ( registrasiadmin($_POST) > 0 ) {
		echo "<script>
				alert('Congratulation, you have registered now!');
		</script>";
	} else {
		echo mysqli_error($conn);
	}
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

	<h1>Register Admin</h1>
<?php if (isset($error)) : ?>
	<p style="color: red; font-style: italic;">Sorry, your password is incorrect</p>
<?php endif; ?>
	<p>
	<label for="username">Username</label>
	<input class="w3-input" type="text" style="width:100%" name="username" id="username" required>
	</p>
	<p>
	<label for="password">Password</label>
	<input class="w3-input" type="password" style="width:100%" name="password" id="password" required>
	</p>
	<p>
	<label for="password2">Confirm Password</label>
	<input class="w3-input" type="password" style="width:100%" name="password2" id="password2" required>
	</p>

	<p>
	<button type="submit" name="register" class="w3-button w3-section w3-green w3-ripple"> Register </button>
	</p>

	</form>

</div>

</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>
  
</body>
</html>






<!-- 
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>
<body>

<h1>Halaman Registrasi</h1>

<form action="" method="POST">
	<ul>
		<li>
			<label for="username">username :</label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">password :</label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<label for="password2">konfirmasi password :</label>
			<input type="password" name="password2" id="password2">
		</li>
		<li>
			<button type="submit" name="register">Register!</button>
		</li>
	</ul>
</form>

</body>
</html>-->