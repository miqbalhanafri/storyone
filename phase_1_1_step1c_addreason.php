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
  if ( tambahreason2($_POST) > 0 ) {
    echo "
      <script>
      alert('Your reason has been added!');
      document.location.href = 'phase_1_1_step1c.php';
      </script>
    ";
  } else {
    echo "
      <script>
      alert('Sorry, your reason didn't added!');
      document.location.href = 'phase_1_1_step1c.php';
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
	  <div class="w3-col w3-container w3-xxlarge"><h1>請新增你的原因</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>此步驟是解釋<span style="color: yellow;">〝繼第一次之後將原先主題修改〞</span>數位敘事的地方，請解釋當前是因為什麼條件/價值觀/思想或是契機下，讓你想做這個主題的原因。<span style="color: greenyellow;">並請在每一次修改完後，註記當天完成的日期唷！</span> 
	  		<!-- <select class="w3-select w3-border" name="option" style="max-width:250px">
				<option value="" disabled selected>Choose your option</option>
				<option value="1">Option 1</option>
				<option value="2">Option 2</option>
				<option value="3">Option 3</option>
			</select> -->
	  </div>
	</div>
	
	<form action="" class="w3-container w3-lime" enctype="multipart/form-data" method="POST">
	<div>
        <div class="comment"><br>
            <input type="checkbox" name="nama[]" class="w3-radio" value="提示"> 提示 <br>
            <input type="checkbox" name="nama[]" class="w3-radio" value="小組成員的回饋"> 小組成員的回饋 <br>
            <input type="checkbox" name="nama[]" class="w3-radio" value="同儕回饋"> 同儕回饋 <br>
            <input type="checkbox" name="nama[]" class="w3-radio" value="老師的回饋"> 老師的回饋 <br>
            其他 
            <input type="text" name="nama[]" class="w3-text" placeholder=" 其他" style="width: 90%;">
            <textarea class="textinput" rows="10" style="margin-top: 15px;" placeholder="Please write down why these reasons change your original design, are they useful for you, why? 因為上述的因素讓你修改了第一次主題，請你說明這些因素為什麼會讓自己和小組成員改變原有的想法，這些因素對你和成員有幫助嗎？為什麼？" name="reason" required></textarea>
            <input type="hidden" name="pilih" value="100">
        </div>
    </div>
	  
	  <button class="w3-button w3-section w3-green w3-ripple" type="submit" name="submit"> Save (儲存) </button>
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

