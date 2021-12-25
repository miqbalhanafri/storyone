<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"];
$theme = query("SELECT * FROM theme WHERE user = '$userid' ORDER BY pilih ASC");

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
	  <div class="w3-col w3-container w3-xxlarge"><h1 style="color: yellow;">階段一 - 步驟一 : 確認主題</a></h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container">
	  	<h3 style="color: yellow;">這個步驟可以隨時新增所設想的主題，每新增一個需要寫下其原因（原因一 → 文字敘述，原因二→選擇可能改變的原因），確定想要的主題之後，請把適合的主題拖曳到第一順位。</h3>
	  	<h3 style="color: yellow;">計畫 Planning：</h3>
		<p>1) 我的故事主軸是人物／事件／地點／生命？為什麼選它作為主故事的中心點？</p>
		<p>2) 我要如何發展這個故事？是要happy ending呢還是留下懸念？</p>
		<p>3) 如果你是故事的核心角色，你覺得你為什麼會想讓觀眾知道這個故事？</p>
		<p>4) 有哪些方法、策略可以幫助我更實際地瞭解教學現場？</p>
		<p>5) 完成這則故事前，我需要瞭解哪些教育理論和相關概念？</p>
		<p>6) 這項任務會花費多久的時間？</p>

		<h3 style="color: yellow;">監控 Monitoring：</h3>
		<p>1) 當我開始做之後，可能會面臨哪些問題，我該如何面對？</p>
		<p>2) 這項任務有哪些我不懂的地方？</p>
		<p>3) 我能怎麼用不同的方法去做？</p>
		<p>4) 怎樣做才能學得更多更好？</p>
		<p>5) 這是做這件事最好的辦法嗎？</p>

		<h3 style="color: yellow;">評估 Evaluation：</h3>
		<h3 style="color: yellow;">我很明確 I’m really sure that...</h3>
				
		<p>1) 為什麼選擇___(主題)____作為我的故事主軸。</p>
		<p>2) 我的主題可以融合教育議題和教育理論。</p>
		<p>3) 讓我的觀眾從故事中知道教育現場的概況以及能有的解決方式。</p>

	  </div>
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
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1>主題 <?= $i; ?> :</h1></div>
	  <div class="w3-col w3-container w3-half"><p><?= $row["nama"]; ?></p></div>
	  <div class="w3-col w3-container w3-quarter"><a href="phase_1_1_step1_edit.php?id=<?= $row["id"]; ?>" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-edit' style='font-size:24px'></i></a><a href="phase_1_1_step1_delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

<?php $i++; ?>
<?php endforeach; ?>	
<!-- End looping for the div table -->

	<div class="w3-row">
		<div class="w3-col w3-container">
		<a href="phase_1_1_step1_addtheme.php" class="w3-button w3-section w3-green w3-ripple">Add theme (新增主題名稱)</a><a href="phase_1_1_step1_changeorder.php" class="w3-button w3-section w3-green w3-ripple">Change order (改變順序)</a>&nbsp<a href="phase_1_1_step1b.php" class="w3-button w3-section w3-green w3-ripple">Reason 1 (原因一：針對第一次主題寫下說明)</a>&nbsp<a href="phase_1_1_step1c.php" class="w3-button w3-section w3-green w3-ripple">Reason 2 (原因二：選擇後續修改可能的原因)</a>&nbsp<a href="phase_1_1_step2.php" class="w3-button w3-section w3-green w3-ripple"><i class='fas fa-chevron-right'></i></a></div>
	</div> 
</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>