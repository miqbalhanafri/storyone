<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$design = query("SELECT * FROM design WHERE user = '".$_SESSION["userId"]."' ORDER BY page_order ASC");



// Upload file untuk file design
if ( isset($_POST["submit"]) ) {
	// var_dump($_POST); untuk nge-test

	// cek apakah data berhasil ditambahkan atau tidak
	if ( tambahfiledesign($_POST) > 0 ) {
		echo "
			<script>
			alert('file uploaded successfully!');
			document.location.href = 'phase_2_1.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('file failed to upload!');
			document.location.href = 'phase_2_1.php';
			</script>
		";
	}

}



// Menampilkan file-fila yang sudah di upload
$userid = $_SESSION["userId"];
$filedesign = query("SELECT * FROM filedesign WHERE user = '$userid' ORDER BY id ASC");




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
	  	<p style="color: yellow;">請自我檢核及簡短的回答以下問題，並上傳故事腳本草稿</p>
		<p style="color: yellow;">確認主題及想傳達的目的或理念</p>
		<p style="color: yellow;">確認故事中將出現哪些人物、時間、地點</p>
		<p style="color: yellow;">確認故事大綱起承轉合 </p> 
		</p>
		<p style="font-size: 20px;">【請務必回答以下9個問題!】</p>
		<p>1) 主角會發生麼事情，遇到什麼問題或是困難?</p>
		<p>2) 主角的感受心情有什麼轉變?</p>
		<p>3) 主角或其他角色會用什麼方法解決困難?</p>
		<p>4) 故事結局是如何?要帶給讀者什麼樣的啟發或影響?</p>
		<p>5) 故事與你的生活經驗有何相似之處或不同之處？</p>
		<p>6) 我的故事是否使用到特效（旁白、配樂、與觀眾互動的功能）？</p>
		<p>7) 我的故事要製作成幾分鐘的數位故事?</p>
		<p>8) 腳本是否有呈現出故事架構，是否有將大綱呼應主題、目的和教育概念?</p>
		<p>9) 設計腳本遇到困難時，我是如何尋求協助？</p>
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
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1>自我檢核
	 :</h1></div>
	  <div class="w3-col w3-container w3-half"><p><?= $row["keterangan"]; ?></p></div>
	  <div class="w3-col w3-container w3-quarter"><a href="phase_2_3.php?id=<?= $row["id"]; ?>" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-edit' style='font-size:24px'></i></a><a href="phase_2_1_delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete this script design?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

<?php $i++; ?>
<?php endforeach; ?>	
<!-- End looping for the div table -->

	<div class="w3-row w3-lime">
		<div class="w3-col w3-container w3-third">
		<a href="phase_2_2.php" class="w3-button w3-section w3-green w3-ripple">Add checklist (新增自我檢核)
		</a><!--<a href="phase_2_1_uporder.php" class="w3-button w3-section w3-green w3-ripple">Change order (改變順序)</a>--></div>



	<!-- Submit file storytelling -->
	<form action="" method="POST" enctype="multipart/form-data">
	
	  <div class="w3-col w3-container w3-xxlarge w3-twothird"></div>
	<div class="w3-col w3-container w3-twothird"><span class="w3-button w3-section w3-green w3-ripple" style="width:100%"><input type="file" name="gambar"></span><button type="submit" name="submit">Upload file</button>
 
	<!-- Looping for the div table -->
	<?php $i = 1; ?>	
	<?php foreach ( $filedesign as $row ) : ?>

	<div class="w3-row w3-lime">
	  <div class="w3-col w3-container w3-half"><p><?= $row["gambar"]; ?></p></div>
	  <div class="w3-col w3-container w3-quarter"><a href="phase_2_1_deletefile.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-green w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

	<?php $i++; ?>
	<?php endforeach; ?>	
	<!-- End looping for the div table -->

	</div>
	</form>
	<!-- Akhir submit file storytelling -->





	</div>

</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>