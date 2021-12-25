<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"]; 
$userku = query("SELECT username FROM admin WHERE id = '$userid' ");

// Menampilkan jumlah siswa
$query1 = query("SELECT * FROM user");
$jumlah = count($query1);
$jumlahku = $jumlah;

if ($jumlah == 0) {
	$jumlah = 1; $jumlahku = 0;
} 

// Menampilkan berapa persen pada Theme
$query2 = query("SELECT DISTINCT user FROM theme");
$jumlah2 = count($query2);

// Menampilkan berapa persen pada Reason
$query3 = query("SELECT DISTINCT user FROM theme_reason");
$jumlah3 = count($query3);

// Menampilkan berapa persen pada Reason
$query3b = query("SELECT DISTINCT user FROM theme_reason2");
$jumlah3b = count($query3b);

// Menampilkan berapa persen pada Purpose
$query4 = query("SELECT DISTINCT user FROM purpose_desc");
$jumlah4 = count($query4);

// Menampilkan berapa persen pada Outline
$query5 = query("SELECT DISTINCT user FROM outline_desc");
$jumlah5 = count($query5);

// Menampilkan berapa persen pada Tools
$query6 = query("SELECT DISTINCT user FROM tools_desc");
$jumlah6 = count($query6);

// Menampilkan berapa persen pada Design
$query7 = query("SELECT DISTINCT user FROM design");
$jumlah7 = count($query7);

// Menampilkan berapa persen pada Peer Reflection 
$query8 = query("SELECT DISTINCT user FROM peer_reflection");
$jumlah8 = count($query8);

// Menampilkan berapa persen pada Peer Reflection 
$query9 = query("SELECT DISTINCT user FROM peer_reflection2");
$jumlah9 = count($query9);

// Menampilkan berapa persen pada Peer Reflection 
$query10 = query("SELECT DISTINCT user FROM peer_reflection3");
$jumlah10 = count($query10);

// Menampilkan berapa persen pada Presentation 
$query11 = query("SELECT DISTINCT user FROM filestory");
$jumlah11 = count($query11);

// Menampilkan berapa persen pada Group Discussion 
$query12 = query("SELECT DISTINCT group_name FROM group_diss");

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
	<p>Hello 

		<span style="color: yellow; font-size: 30px;">
		<?php foreach ( $userku as $row ) : ?>
			<?= $row["username"]; ?>
		<?php endforeach; ?>
		</span>

	, welcome to the digital storytelling application. </p>

	<!-- User -->
	<div class="w3-row w3-lime">

	  <div class="w3-col w3-container w3-xxlarge"><a href="#" class="w3-button w3-section w3-green w3-ripple w3-round-xxlarge" style="width:100%">Members : <?= $jumlahku; ?> Students</a></div>

	</div>

	<!-- Phase 1 -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge"><a href="#" class="w3-button w3-section w3-green w3-ripple" style="width:100%">Phase 1</a></div>

	</div>

	<!-- Theme -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Theme </div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah2/$jumlah)*100); ?>%"> <?= round(($jumlah2/$jumlah)*100); ?>%</div>
		</div></p>

	  </div>

	</div>

	<!-- Reason 1 -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Reason 1</div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah3/$jumlah)*100); ?>%"><?= round(($jumlah3/$jumlah)*100); ?>%</div>
		</div></p>
	  </div>

	</div>

	<!-- Reason 2 -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Reason 2</div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah3b/$jumlah)*100); ?>%"><?= round(($jumlah3b/$jumlah)*100); ?>%</div>
		</div></p>
	  </div>

	</div>

	<!-- Purpose -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Purpose </div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah4/$jumlah)*100); ?>%"><?= round(($jumlah4/$jumlah)*100); ?>%</div>
		</div></p>
	  </div>

	</div>


	<!-- Outline -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Outline </div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah5/$jumlah)*100); ?>%"><?= round(($jumlah5/$jumlah)*100); ?>%</div>
		</div></p>
	  </div>

	</div>


	<!-- Tools -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Tools </div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah6/$jumlah)*100); ?>%"><?= round(($jumlah6/$jumlah)*100); ?>%</div>
		</div></p>
	  </div>

	</div>


	<!-- Phase 2 -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge"><a href="#" class="w3-button w3-section w3-green w3-ripple" style="width:100%">Phase 2</a></div>

	</div>

	<!-- Design -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Design </div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah7/$jumlah)*100); ?>%"> <?= round(($jumlah7/$jumlah)*100); ?>%</div>
		</div></p>

	  </div>

	</div>


	<!-- Phase 3 -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge"><a href="#" class="w3-button w3-section w3-green w3-ripple" style="width:100%">Phase 3</a></div>

	</div>

	<!-- Reflection 1 -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Reflection 1 </div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah8/$jumlah)*100); ?>%"> <?= round(($jumlah8/$jumlah)*100); ?>%</div>
		</div></p>

	  </div>

	</div>


	<!-- Reflection 2 -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Reflection 2 </div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah9/$jumlah)*100); ?>%"> <?= round(($jumlah9/$jumlah)*100); ?>%</div>
		</div></p>

	  </div>

	</div>

	<!-- Reflection 3 -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Reflection 3 </div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah10/$jumlah)*100); ?>%"> <?= round(($jumlah10/$jumlah)*100); ?>%</div>
		</div></p>

	  </div>

	</div>

	<!-- Presentation -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Presentation </div>

	  <div class="w3-col w3-container w3-twothird">
		<p><div class="w3-light-grey w3-round-xlarge">
		 	<div class="w3-container w3-green w3-round-xlarge" style="width:<?= round(($jumlah11/$jumlah)*100); ?>%"> <?= round(($jumlah11/$jumlah)*100); ?>%</div>
		</div></p>

	  </div>

	</div>

	<!-- Group Discussion -->
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge w3-third">Discussion</div>

	  <div class="w3-col w3-container w3-twothird">
	  
	  <div class="w3-light-grey w3-round-xlarge" style="padding-left: 20px; padding-right: 20px;"><p> 
		<?php foreach ( $query12 as $row ) : ?>
			<i class='far fa-address-card'></i> <?= $row["group_name"]; ?> 
		<?php endforeach; ?>
	  </p></div>

	  </div>

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

