<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"];
$outline = query("SELECT * FROM outline_desc WHERE user = '$userid' ORDER BY pilih ASC");

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
	  <div class="w3-col w3-container w3-xxlarge"><h1 style="color: yellow;">階段一 - 步驟三 : 確認故事大綱</a></h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container">
	  	<h3 style="color: yellow;">新增大綱</h3>
	  	<h3 style="color: yellow;">計畫 Planning：</h3>
	  	<p>1) 完整的故事大綱需要經過哪些步驟？</p>
	  	<p>2) 在情節發展之下，有哪些可能發生的事情？其前因與後果？</p>
	  	<p>3) 有哪些方法、策略可以幫助我完成大綱？</p>
	  	<h3 style="color: yellow;">監控 Monitoring：</h3>
	  	<p>1) 當我設計大綱時，是否有將大綱呼應主題、目的和教育概念？</p>
	  	<p>2) 為什麼我這樣安排故事大綱？如果重新調整故事順序，故事讀起來會有什麼不同的效果？</p>
	  	<p>3) 以我設想的目的發展故事情節，可能會出現哪些問題？我該如何應對？</p>
	  	<h3 style="color: yellow;">評估 Evaluation：</h3>
	  	<h3>我很明確 I’m really sure that...</h3>
	  	<p>1) 為什麼選擇_________作為我的故事主軸。</p>
	  	<p>2) 我的故事可以擄獲觀眾的注意、傳遞故事的深遠意義、激發行動力且帶來正向的結果。</p>
	  	<p>3) 考量故事結構的完整性，故事具有高低起伏的變化，使觀眾產生不一樣的情緒、態度和觀念等心理作用。</p>
	  	<p>4) 完成大綱時，已經檢查需不需要再次調整，以更符合主題、目的和教育概念。</p>
	  </div>
	</div>

<!-- Looping for the div table -->
<?php $i = 1; ?>	
<?php foreach ( $outline as $row ) : ?>
		<!-- Looping for change colour div -->
		<?php if ( $i % 2 == 0 ) : ?>
			<div class="w3-row w3-light-green">
			<?php else : ?>
			<div class="w3-row w3-lime">	
		<?php endif; ?>
		<!-- End div -->
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1>大綱 <!-- <?= $i; ?> --> :</h1></div>
	  <div class="w3-col w3-container w3-half"><p><?= $row["nama"]; ?></p></div>
	  <div class="w3-col w3-container w3-quarter"><a href="phase_1_1_step3_edit.php?id=<?= $row["id"]; ?>" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-edit' style='font-size:24px'></i></a><a href="phase_1_1_step3_delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

<?php $i++; ?>
<?php endforeach; ?>	
<!-- End looping for the div table -->

	<div class="w3-row">
		<div class="w3-col w3-container">
		<a href="phase_1_1_step3_addoutline.php" class="w3-button w3-section w3-green w3-ripple">Add outline (新增大綱)</a><!-- <a href="phase_1_1_step3_changeorder.php" class="w3-button w3-section w3-green w3-ripple">Change order</a> --> &nbsp<a href="phase_1_1_step2.php" class="w3-button w3-section w3-green w3-ripple"><i class='fas fa-chevron-left'></i></a><a href="phase_1_1_step4.php" class="w3-button w3-section w3-green w3-ripple"><i class='fas fa-chevron-right'></i></a></div>
	</div> 
</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>