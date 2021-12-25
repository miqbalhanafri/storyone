<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$design = query("SELECT * FROM design WHERE user = '".$_SESSION["userId"]."' ORDER BY page_order ASC");

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
	
	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1 style="color: yellow;">階段二 : 設計腳本</a></h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container">
	  	<p style="color: yellow;">此階段包含故事要素（時間、地點、人物及事件），完整性結構、對白、配樂、場面</p>
	  	<h3 style="color: yellow;">計畫 Planning：</h3>
	  	<p>1) 我的故事屬於哪個類型？</p>
	  	<p>2) 完成這個故事我需要哪些工具或特效（旁白、配樂、與觀眾互動的功能）？</p>
	  	<p>3) 在完成腳本之前，我需要哪些方法或策略？</p>
	  	<p>4) 故事中將出現哪些人物、時間、地點？是否有需要增加或減少的設定？</p>
	  	<p>5) 我需要花多少時間才能將腳本數位化成電子書？</p>
	  	<h3 style="color: yellow;">監控 Monitoring：</h3>
	  	<p>1) 我的腳本是否能吸引讀者的注意並引發讀者反思教育議題？</p> 
	  	<p>2) 當我製作腳本時，是否有將大綱呼應主題、目的、大綱和教育概念？</p>
	  	<p>3) 當設計腳本遇到困難時，我應該如何尋求協助？</p>
	  	<p>4) 為什麼我這樣安排故事腳本？如果重新調整故事順序，故事讀起來會有什麼不同的效果？</p>
	  	<h3 style="color: yellow;">評估 Evaluation：</h3>
	  	<h3 style="color: yellow;">我很明確 I’m really sure that...</h3>
	  	<p>1) 為什麼選擇_________作為我的故事主軸。</p>
	  	<p>2) 我的故事可以擄獲觀眾的注意、傳遞故事的深遠意義、激發行動力且帶來正向的結果。</p>
	  	<p>3) 考量故事結構的完整性，故事具有高低起伏的變化，使觀眾產生不一樣的情緒、態度和觀念等心理作用。</p>
	  	<p>4) 如果我是故事主角，我會覺得這個故事完整地呈現我當時設立的情境。</p>
	  	<p>5) 這個腳本是我最滿意的版本。</p>
	  </div>
	</div>

<!-- Looping for the div table -->
<?php $i = 1; ?>	
<?php foreach ( $design as $row ) : ?>
		<!-- Looping for change colour div -->
		<?php if ( $i % 2 == 0 ) : ?>
			<div class="w3-row w3-light-green">
			<?php else : ?>
			<div class="w3-row w3-lime">	
		<?php endif; ?>
		<!-- End div -->
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1>腳本 <?= $i; ?> :</h1></div>
	  <div class="w3-col w3-container w3-half"><p><?= $row["keterangan"]; ?></p></div>
	  <div class="w3-col w3-container w3-quarter"><a href="phase_2_3.php?id=<?= $row["id"]; ?>" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-edit' style='font-size:24px'></i></a><a href="phase_2_1_delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete this script design?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

<?php $i++; ?>
<?php endforeach; ?>	
<!-- End looping for the div table -->

	<div class="w3-row">
		<div class="w3-col w3-container">
		<a href="phase_2_2.php" class="w3-button w3-section w3-green w3-ripple">Add script (新增腳本)</a><a href="phase_2_1_uporder.php" class="w3-button w3-section w3-green w3-ripple">Change order (改變順序)</a></div>
	</div> 
</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>