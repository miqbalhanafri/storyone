<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

// memanggil functions.php
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
  // var_dump($_POST); untuk nge-test

  // cek apakah data berhasil ditambahkan atau tidak
  if ( tambahdesign($_POST) > 0 ) {
    echo "
      <script>
      alert('Your data has been added!');
      document.location.href = 'phase_2_1.php';
      </script>
    ";
  } else {
    echo "
      <script>
      alert('Sorry, your data didn't added!');
      document.location.href = 'phase_2_1.php';
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

        .container {
            max-width: 820px;
            margin: 0px auto;
            margin-top: 50px;
        }
        .comment {
            float: left;
            width: 100%;
            height: auto;
        }
        .commenter {
            float: left;
        }
        .commenter img {
            width: 35px;
            height: 35px;
        }
        .comment-text-area {
            float: left;
            width: 100%;
            height: auto;
        }

        .textinput {
            float: left;
            width: 100%;
            min-height: 75px;
            outline: none;
            resize: none;
            border: 1px solid grey;
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
	  <div class="w3-col w3-container w3-xxlarge"><h1>階段二 - 新增自我檢核</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container">
      <p style="color: yellow;">此步驟是回答腳本問題，以及自我檢核的地方。</p>
<p>1) 主角會發生麼事情，遇到什麼問題或是困難?</p>
<p>2) 主角的感受心情有什麼轉變?</p>
<p>3) 主角或其他角色會用什麼方法解決困難?</p>
<p>4) 故事結局是如何?要帶給讀者什麼樣的啟發或影響?</p>
<p>5) 故事與你的生活經驗有何相似之處或不同之處？</p>
<p>6) 我的故事是否使用到特效（旁白、配樂、與觀眾互動的功能）？</p>
<p>7) 我的故事要製作成幾分鐘的數位故事?</p>
<p>8) 腳本是否有呈現出故事架構，是否有將大綱呼應主題、目的和教育概念?</p>
<p>9) 設計腳本遇到困難時，我是如何尋求協助？</p>

	  		<!-- <select class="w3-select w3-border" name="option" style="max-width:250px">
				<option value="" disabled selected>Choose your option</option>
				<option value="1">Option 1</option>
				<option value="2">Option 2</option>
				<option value="3">Option 3</option>
			</select> -->
	  </div>
	</div>
	
	<form action="" class="w3-container w3-lime" enctype="multipart/form-data" method="POST">
	<div class="container">
        <div class="comment">
            <textarea class="textinput" rows="10" placeholder="Add your new section here" type="text" name="keterangan"></textarea>
            <input type="hidden" name="page_order" value="100">
        </div>
    </div>
	  
	  <button class="w3-button w3-section w3-green w3-ripple" type="submit" name="submit"> Save (儲存)</button>
	</form>
	<!-- Button
	<div class="w3-row">
		<div class="w3-col w3-container"><a href="login.php" class="w3-button w3-section w3-green w3-ripple">back</a>
		<a href="login.php" class="w3-button w3-section w3-green w3-ripple">log out</a></div>
	</div> -->
</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>

