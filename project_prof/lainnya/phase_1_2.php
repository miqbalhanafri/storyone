<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';
// mengirim query ke functions.php
$theme = query("SELECT * FROM theme");

if ( isset($_POST["submit"]) ) {
	// var_dump($_POST); untuk nge-test

	// cek apakah data berhasil ditambahkan atau tidak
	if ( theme_ans($_POST) > 0 ) {
		echo "
			<script>
			alert('You have choose your theme');
			document.location.href = 'phase_1_3.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('Sorry, theme didn't saved!);
			document.location.href = 'phase_1_2.php';
			</script>
		";
	}

}

?>

<!DOCTYPE html>
<html>
<title>GIDLE - Storytelling</title>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-green w3-xxlarge" style="width:70px">
  <a href="menu.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> 
  <a href="phase_1_1.php" class="w3-bar-item w3-button"><i class="fas fa-dice-one"></i></a> 
  <a href="phase_2_1.php" class="w3-bar-item w3-button"><i class="fas fa-dice-two"></i></a> 
  <a href="phase_3_1.php" class="w3-bar-item w3-button"><i class="fas fa-dice-three"></i></a>
  <a href="phase_4_1.php" class="w3-bar-item w3-button"><i class="far fa-file-alt"></i></a>
  <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a> 
</div>

<div style="margin-left:70px">
<!-- Last Sidebar -->


<div class="w3-content w3-display-container" style="max-width:900px">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/icon_story.png" width="40px"> DigiStory</h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">
	
	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1>Phase 1 - Step 1 : Confirm the theme of  your digital storytelling</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>Require : xxxx</p></div>
	</div>
	
	<form class="w3-container w3-lime" action="" method="POST" enctype="multipart/form-data">

<!-- Tampilkan / Looping data tema dari database theme -->
<?php $i = 1; ?>	
<?php foreach ( $theme as $row ) : ?>
	  <p>
	  <input class="w3-check" type="radio" value="<?= $row["nama"]; ?>" name="nama" required>
	  <label><?= $row["nama"]; ?></label></p>
<?php $i++; ?>
<?php endforeach; ?>
<!-- Akhir looping -->

	  <button type="submit" name="submit" class="w3-button w3-section w3-green w3-ripple">Next</button>
	</form>
</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>

