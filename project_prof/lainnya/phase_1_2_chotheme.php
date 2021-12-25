<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
 
// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"]; 
$theme = query("SELECT * FROM theme WHERE user = '$userid' ORDER BY id ASC");



// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
  // var_dump($_POST); untuk nge-test

  // cek apakah data berhasil diubah atau tidak
  if ( pilihtheme($_POST) > 0 ) {
    echo "
      <script>
      alert('Your theme has been changed!');
      document.location.href = 'phase_1_2_chotheme.php';
      </script>
    ";
  } else {
    echo "
      <script>
      alert('Sorry, your theme didn't changed!');
      document.location.href = 'phase_1_2_chotheme.php';
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

<!-- Mulai form GET -->	
<form action="" method="POST" enctype="multipart/form-data">
	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1>Phase 1 - Step 1 : Confirm the theme of your digital storytelling</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>Please add some theme of your storytelling (at least 3 theme), pick one and then submit your best theme to explore</p></div>
	</div>

<!-- Looping for the div table -->
<?php $i = 1; ?>	
<?php foreach ( $theme as $row ) : ?>
<!-- Looping for change colour div -->
<?php if ( $i % 2 == 0 ) : ?>
<div class="w3-row w3-light-green">
<?php else : ?>
<div class="w3-row w3-lime">	
<?php endif; ?>
<!-- End div -->

	  <div class="w3-col w3-container w3-threequarter"><p>
	  	<input type="checkbox" class="w3-check" name="pilih" value="<?= $row["pilih"]+1; ?>" <?php if ($row["pilih"]==1) { echo 'checked'; } ?>> &nbsp &nbsp <label><?= $row["nama"]; ?></label>
	  	<input type="hidden" name="nama" value="<?= $row["nama"]; ?>">
	  	<input type="hidden" name="user" value="<?= $row["user"]; ?>">
	  	<input type="text" name="id" value="<?= $row["id"]; ?>">
	  </p>

	  </div>


<!--
	<div class="container">
        <div class="comment">
            <input type="hidden" name="id" value="<?= $dataku["id"]; ?>">
            <input class="textinput" type="text" name="nama" value="<?= $dataku["nama"]; ?>">
            <input type="hidden" name="user" value="<?= $dataku["user"]; ?>">
            <input type="hidden" name="pilih" value="<?= $dataku["pilih"]; ?>">
        </div>
    </div>
-->



	  <!-- Button edit dan delete -->
	  <div class="w3-col w3-container w3-quarter"><a href="phase_1_2_rev.php?id=<?= $row["id"]; ?>" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-edit' style='font-size:24px'></i></a><a href="delete_theme.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete this theme?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

		<?php $i++; ?>
		<?php endforeach; ?>	
		<!-- End looping for the div table -->

	<div class="w3-row">
		<div class="w3-col w3-container">
		<a href="phase_1_2_addtheme.php" class="w3-button w3-section w3-green w3-ripple">Add theme</a><button class="w3-button w3-section w3-green w3-ripple" type="submit" name="submit">Submit theme</button></div>
	</div> 
</div>
</form>  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>