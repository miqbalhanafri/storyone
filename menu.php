<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"]; 
$userku = query("SELECT username FROM user WHERE id = '$userid' ");

$info = query("SELECT informasi FROM info_admin");

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
  <a href="phase_4_1.php" class="w3-bar-item w3-button"><i class="fas fa-file-alt"></i></a>
  <a href="phase_5_chat.php" class="w3-bar-item w3-button"><i class="fa fa-comments"></i></a>
  <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a> 
</div>

<div style="margin-left:70px">
<!-- Last Sidebar -->


<div class="w3-content w3-display-container" style="max-width:900px">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/icon_story.png" width="40px"> RDST reflect with DST <br>數位敘事反思平台</h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">

	<p> 

		<span style="color: yellow; font-size: 30px;">
		<?php foreach ( $userku as $row ) : ?>
			<?= $row["username"]; ?>
		<?php endforeach; ?>
		</span>

	您好, 歡迎使用數位敘事應用程式。 </p>


	<!-- Informations from teachers -->
	<div class="w3-panel w3-yellow w3-display-container">
	  <span onclick="this.parentElement.style.display='none'"
	  class="w3-button w3-large w3-display-topright">&times;</span>
	  <h3>公告 :</h3>
	  <p>

		<?php foreach ( $info as $row ) : ?>
			<?= $row["informasi"]; ?><br>
		<?php endforeach; ?>

	  </p>
	</div>
	<!-- End information -->


	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="phase_1_1.php" class="w3-button w3-section w3-green w3-ripple">階段一</a></h1></div>
	  <div class="w3-col w3-container w3-third"><p>探索數位敘事的主題和組織故事內容</p></div>
	  <div class="w3-col w3-container w3-third"><p>根據小組的討論和設計，此階段包含主題與目的、故事背景、大綱和呈現方式</p></div>
	</div>
	<div class="w3-row w3-light-green">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="phase_2_1.php" class="w3-button w3-section w3-green w3-ripple">階段二</a></h1></div>
	  <div class="w3-col w3-container w3-third"><p>設計腳本</p></div>
	  <div class="w3-col w3-container w3-third"><p>此階段包含故事要素（時間、地點、人物及事件），完整性結構、對白、配樂、場面</p></div>
	</div>
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="phase_3_1.php" class="w3-button w3-section w3-green w3-ripple">階段三</a></h1></div>
	  <div class="w3-col w3-container w3-third"><p>個人和小組作品反思</p></div>
	  <div class="w3-col w3-container w3-third"><p>完成數位敘事後，你和你的小組成員需要依據整學期以來一起完成成品的反思內容</p></div>
	</div>
	<!--
	<div class="w3-row">
		<div class="w3-col w3-container"><a href="login.php" class="w3-button w3-section w3-green w3-ripple">back</a>
		<a href="login.php" class="w3-button w3-section w3-green w3-ripple">log out</a></div>
	</div>-->
</div>

</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>

