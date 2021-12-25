<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"];
$purpose = query("SELECT * FROM purpose_desc WHERE user = '$userid' ORDER BY pilih ASC");

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
	  <div class="w3-col w3-container w3-xxlarge"><h1 style="color: yellow;">階段一 - 步驟二 : 確認故事的目的</a></h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container">
	  	<h3 style="color: yellow;">計畫 Planning：</h3>
	  	<p>1) 我的故事最核心的概念是什麼？</p>
	  	<p>2) 為什麼我要分享這則故事？為什麼觀眾需要瞭解這個核心概念？</p>
	  	<p>3) 我設的目的能有效地說明教育理論或相關概念嗎？</p>
	  	<p>4) 故事是否帶給觀眾教育的價值？有哪些概念能引起讀者共鳴或帶來啟發？</p>
	  	<p>5) 我希望從創作這個故事的過程中學到什麼？</p>
	  	<h3 style="color: yellow;">監控 Monitoring：</h3>
	  	<p>1) 以我設想的目的發展故事，可能會出現哪些問題？我該如何應對？</p>
	  	<p>2) 能不能稍微調整，做得更有效率？</p>
	  	<p>3) 我現在的作法有效嗎？</p>
	  	<h3 style="color: yellow;">評估 Evaluation：</h3>
	  	<h3 style="color: yellow;">我很明確 I’m really sure that...</h3>
	  	<p>1) 為什麼選擇_________作為我的故事主軸。</p>
	  	<p>2)我的故事目的可以擄獲觀眾的注意、傳遞故事的深遠意義、激發行動力且帶來正向的結果。</p>
	  	<p>3) 讓我的觀眾從故事中知道教育現場的概況以及能有的解決方式。</p>
	  </div>
	</div>

<!-- Looping for the div table -->
<?php $i = 1; ?>	
<?php foreach ( $purpose as $row ) : ?>
		<!-- Looping for change colour div -->
		<?php if ( $i % 2 == 0 ) : ?>
			<div class="w3-row w3-light-green">
			<?php else : ?>
			<div class="w3-row w3-lime">	
		<?php endif; ?>
		<!-- End div -->
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1>目的 <!-- <?= $i; ?> --> :</h1></div>
	  <div class="w3-col w3-container w3-half"><p><?= $row["nama"]; ?></p></div>
	  <div class="w3-col w3-container w3-quarter"><a href="phase_1_1_step2_edit.php?id=<?= $row["id"]; ?>" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-edit' style='font-size:24px'></i></a><a href="phase_1_1_step2_delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

<?php $i++; ?>
<?php endforeach; ?>	
<!-- End looping for the div table -->

	<div class="w3-row">
		<div class="w3-col w3-container">
		<a href="phase_1_1_step2_addpurpose.php" class="w3-button w3-section w3-green w3-ripple">Add purpose (新增目的)</a><!-- <a href="phase_1_1_step2_changeorder.php" class="w3-button w3-section w3-green w3-ripple">Change order</a> --> &nbsp<a href="phase_1_1_step1.php" class="w3-button w3-section w3-green w3-ripple"><i class='fas fa-chevron-left'></i></a><a href="phase_1_1_step3.php" class="w3-button w3-section w3-green w3-ripple"><i class='fas fa-chevron-right'></i></a></div>
	</div> 
</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>