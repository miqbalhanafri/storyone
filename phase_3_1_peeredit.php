<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

// memanggil functions.php
require 'functions.php';
// ambil data di URL
$id = $_GET["id"];
$userid = $_SESSION["userId"];

// query data mahasiswa berdasarkan id
$dataku = query("SELECT * FROM peer_reflection WHERE id=$id")[0]; 
// var_dump($mhs[0]["nama"]);
// query dengan nol dipindah ke query sebelumnya 

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
  // var_dump($_POST); untuk nge-test

  // cek apakah data berhasil diubah atau tidak
  if ( ubahpeer($_POST) >= 0 ) {
    echo "
      <script>
      alert('Your data has been changed!');
      document.location.href = 'phase_3_1_peerlist.php';
      </script>
    ";
  } else {
    echo "
      <script>
      alert('Sorry, your data didn't changed!');
      document.location.href = 'phase_3_1_peerlist.php';
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
	  <div class="w3-col w3-container w3-xxlarge"><h1>修改我的建議</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>你可以在此編輯建議內容
	  		<!-- <select class="w3-select w3-border" name="option" style="max-width:250px">
				<option value="" disabled selected>Choose your option</option>
				<option value="1">Option 1</option>
				<option value="2">Option 2</option>
				<option value="3">Option 3</option>
			</select> -->
	  </div>
	</div>
	
	<form action="" class="w3-container w3-lime" method="POST" enctype="multipart/form-data">
	<div class="container">
        <div class="comment">
            <input type="hidden" name="id" value="<?= $dataku["id"]; ?>">
            <!-- <textarea class="textinput" type="text" name="keterangan" required value="<?= $dataku["keterangan"]; ?>"></textarea> -->
            <!--<input class="textinput" type="text" name="nama" value="<?= $dataku["nama"]; ?>"> -->
            <textarea name="nama" class="textinput" rows="10" cols="10" wrap="hard" style="overflow:hidden; resize:none; margin-top:15px; overflow-y: scroll;"><?= $dataku["nama"]; ?></textarea>
            <input type="hidden" name="user" value="<?= $userid; ?>">
            <input type="hidden" name="username" value="<?= $dataku["username"]; ?>">
            <input type="hidden" name="pilih" value="<?= $dataku["pilih"]; ?>">
            <input type="hidden" name="pilih_user" value="<?= $dataku["pilih_user"]; ?>">
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

