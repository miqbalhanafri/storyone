<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

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
	  <div class="w3-col w3-container w3-xxlarge"><h1>DigiStory Chatroom</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>You can discussion with your friends or ask to the teacher here.</p></div>
	</div>
	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-xxlarge">
	  	
	  	<!-- <div style="margin-top: 15px;">
	  	<iframe src="https://minnit.chat/DigiStoryChatroom?embed&nickname=" style="border:none;width:100%;height:500px;" allowTransparency="true"></iframe></div>-->


	  	<!-- Mulai chatting --> 
		<div class="w3-container">

		  <div class="w3-row">
		    <a href="javascript:void(0)" onclick="openCity(event, 'London');">
		      <div class="w3-col tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%; text-align: center;">Main</div>
		    </a>
		    <a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
		      <div class="w3-col tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%;text-align: center;">1</div>
		    </a>
		    <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');">
		      <div class="w3-col tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%;text-align: center;">2</div>
		    </a>
		    <a href="javascript:void(0)" onclick="openCity(event, 'Jakarta');">
		      <div class="w3-col tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%;text-align: center;">3</div>
		    </a>
		    <a href="javascript:void(0)" onclick="openCity(event, 'Taipei');">
		      <div class="w3-col tablink w3-bottombar w3-hover-light-grey w3-padding" style="width: 20%;text-align: center;">4</div>
		    </a>    
		  </div>

		  <div id="London" class="w3-container city">
	  		<iframe src="../chatting/example.php" style="border:none; width:100%; height:440px;"></iframe>
		  </div>

		  <div id="Paris" class="w3-container city" style="display:none">
	  		<iframe src="../chatting1/example.php" style="border:none; width:100%; height:440px;"></iframe>
		  </div>

		  <div id="Tokyo" class="w3-container city" style="display:none">
	  		<iframe src="../chatting2/example.php" style="border:none; width:100%; height:440px;"></iframe>
		  </div>

		   <div id="Jakarta" class="w3-container city" style="display:none">
	  		<iframe src="../chatting3/example.php" style="border:none; width:100%; height:440px;"></iframe>
		  </div>

		  <div id="Taipei" class="w3-container city" style="display:none">
	  		<iframe src="../chatting4/example.php" style="border:none; width:100%; height:440px;"></iframe>
		  </div>
		</div>

		<script>
		function openCity(evt, cityName) {
		  var i, x, tablinks;
		  x = document.getElementsByClassName("city");
		  for (i = 0; i < x.length; i++) {
		    x[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tablink");
		  for (i = 0; i < x.length; i++) {
		    tablinks[i].className = tablinks[i].className.replace(" w3-border-green", "");
		  }
		  document.getElementById(cityName).style.display = "block";
		  evt.currentTarget.firstElementChild.className += " w3-border-green";
		}
		</script>
		<!-- End chatting --> 





	  </div>
	</div>

</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>

