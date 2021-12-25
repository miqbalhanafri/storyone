<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"];
$username = query("SELECT * FROM user WHERE id != $userid  ORDER BY username ASC");

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
  <a href="one.php" class="w3-bar-item w3-button"><i class="fas fa-user-astronaut"></i></a> 
  <a href="two.php" class="w3-bar-item w3-button"><i class="fa fa-book"></i></a> 
  <a href="three.php" class="w3-bar-item w3-button"><i class="fas fa-satellite-dish"></i></a>
  <a href="four.php" class="w3-bar-item w3-button"><i class="fa fa-history"></i></a>
  <a href="chat.php" class="w3-bar-item w3-button"><i class="fa fa-comments"></i></a>
  <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a> 
</div>

<div style="margin-left:70px">
<!-- Last Sidebar -->




<div class="w3-content w3-display-container" style="max-width:900px">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/icon_story.png" width="40px"> RDST reflect with DST <br>數位敘事反思平台</h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">
	
	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1>Reset the member and answer</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>You can reset the member and answer of this Digital Storytelling</p></div>
	</div>


		<!-- Informations from teachers -->
	<div class="w3-panel w3-red w3-display-container">
	  <span onclick="this.parentElement.style.display='none'"
	  class="w3-button w3-large w3-display-topright">&times;</span>
	  <h3>Warning :</h3>
	  <p><b style="color: yellow;">Are you sure you want to delete all the files?</b> Make sure you have <b style="color: yellow;">backup all files</b> before you delete all the informations. We suggest you delete <b style="color: yellow;">user</b> in the last. After you delete it, all the informations will be <b style="color: yellow;">empty</b>.</p>
	</div>
	<!-- End information -->


	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Theme</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_theme.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-light-green">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Reason 1</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_reason.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-lime">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Reason 2</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_reason2.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-light-green">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Purpose</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_purpose.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-lime">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Outline</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_outline.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-light-green">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Tools</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_tools.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-lime">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Design</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_design.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-light-green">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Draft 1</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_peerreflection.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-lime">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Draft 2</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_peerreflection2.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-light-green">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Final</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_peerreflection3.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-lime">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Presentation</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_presentation.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-light-green">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Delete all files</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_files.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-lime">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>Group Discussion</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_discussion.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row w3-light-green">	
	<div class="w3-col w3-container w3-xxlarge w3-quarter"><h1> <i class='fa fa-history'></i> </h1></div>
	  <div class="w3-col w3-container w3-half"><h1>User</h1></div>
	  <div class="w3-col w3-container w3-quarter"><a href="four_delete_user.php" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<div class="w3-row">
		<div class="w3-col w3-container">
		<!-- <a href="phase_3_1_peerlist.php" class="w3-button w3-section w3-green w3-ripple">Edit suggestion</a>-->&nbsp<a href="menu.php" class="w3-button w3-section w3-green w3-ripple"><i class='fas fa-undo'></i></a></div>
	</div> 
</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>