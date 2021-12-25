<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

// memanggil functions.php
require 'functions.php';

$username = $_SESSION["userId"];
$userid = $_GET["id"]; 
// PHASE 1
$userku = query("SELECT * FROM user WHERE id = '$userid' ");
$userku2 = query("SELECT username FROM user WHERE id = '$username' ");
$themeku = query("SELECT nama FROM theme WHERE user = '$userid' ");
$reasonku = query("SELECT nama FROM theme_reason WHERE user = '$userid' ");
$reasonku2 = query("SELECT * FROM theme_reason2 WHERE user = '$userid' ");
$purposeku = query("SELECT nama FROM purpose_desc WHERE user = '$userid' ");
$outlineku = query("SELECT nama FROM outline_desc WHERE user = '$userid' ");
$toolsku = query("SELECT nama FROM tools_desc WHERE user = '$userid' ");
// PHASE 2
$designku = query("SELECT keterangan FROM design WHERE user = '$userid' ORDER BY page_order ");
// PHASE 3
$peerku = query("SELECT * FROM peer_reflection WHERE pilih = '$userid' ORDER BY pilih ");
$peerku2 = query("SELECT * FROM peer_reflection2 WHERE pilih = '$userid' ORDER BY pilih ");
$peerku3 = query("SELECT * FROM peer_reflection3 WHERE pilih = '$userid' ORDER BY pilih ");
$peerlist = query("SELECT * FROM peer_reflection WHERE user = '$userid' ORDER BY id ASC");
$peerlist2 = query("SELECT * FROM peer_reflection2 WHERE user = '$userid' ORDER BY id ASC");
$peerlist3 = query("SELECT * FROM peer_reflection3 WHERE user = '$userid' ORDER BY id ASC");
$presentationku = query("SELECT gambar FROM filestory WHERE user = '$userid' ");
$groupku = query("SELECT nama FROM group_diss WHERE user = '$userid' ");
//$reflectku = query("SELECT nama FROM reflect WHERE user = '$userid' ");
//$reflect2ku = query("SELECT nama FROM reflect2 WHERE user = '$userid' ");
//$presentationku = query("SELECT nama FROM presentation WHERE user = '$userid' ");
//$peerku = query("SELECT * FROM peer_reflection WHERE pilih = '$userid' ORDER BY pilih ");
//$peerlist = query("SELECT * FROM peer_reflection WHERE user = '$userid' ORDER BY id ASC");
//$groupku = query("SELECT nama FROM group_diss WHERE user = '$userid' ");


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
  // var_dump($_POST); untuk nge-test

  // cek apakah data berhasil ditambahkan atau tidak
  if ( tambahreflection3($_POST) > 0 ) {
    echo "
      <script>
      alert('Your data has been added!');
      document.location.href = 'phase_3_3_peerreflection.php';
      </script>
    ";
  } else {
    echo "
      <script>
      alert('Sorry, your data didn't added!');
      document.location.href = 'phase_3_3_peerreflection.php';
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
	  <div class="w3-col w3-container w3-xxlarge"><h1>新增建議給 

    <span style="color: yellow;"><?php foreach ( $userku as $row ) : ?>
      <?= $row["username"]; ?>
    <?php endforeach; ?></span>

     的故事內容</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>請根據同儕的 <span style="color: yellow;">數位敘事作品，</span>並在下方給予適當的評論或建議
	  		<!-- <select class="w3-select w3-border" name="option" style="max-width:250px">
				<option value="" disabled selected>Choose your option</option>
				<option value="1">Option 1</option>
				<option value="2">Option 2</option>
				<option value="3">Option 3</option>
			</select> -->
	  </div>
	</div>
	

<!-- Awal konten -->

  <div class="w3-row w3-lime">
    <div class="w3-col w3-container w3-xxlarge w3-rest"><h2><a href="#" class="w3-button w3-section w3-green w3-ripple" style="width: 100%;">階段一 : 數位敘事的主題與目的、背景、大綱和工具</a></h1>
    </div>
    <div class="w3-col w3-container w3-rest">
    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 使用者名稱 :</span> <br>

    <?php foreach ( $userku as $row ) : ?>
      <?= $row["username"]; ?>
    <?php endforeach; ?> <br>
    Code : [ <?= $row["id"]; ?> ]
    </p>
    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 主題 :</span> <br>

    <?php foreach ( $themeku as $row ) : ?>
      <?= $row["nama"]; ?>
    <?php endforeach; ?>

    </p>
    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 原因一 :</span> <br>

    <?php foreach ( $reasonku as $row ) : ?>
      <?= $row["nama"]; ?>
    <?php endforeach; ?>

    </p>
    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 原因二 :</span> <br>
    來源 :
    <?php foreach ( $reasonku2 as $row ) : ?>
      <?= $row["nama"]; ?>
    <?php endforeach; ?><br>
    原因 :
    <?php foreach ( $reasonku2 as $row ) : ?>
      <?= $row["reason"]; ?>
    <?php endforeach; ?>
    </p>
    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 故事背景 :</span> <br>

    <?php foreach ( $purposeku as $row ) : ?>
      <?= $row["nama"]; ?>
    <?php endforeach; ?>

    </p>
    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 大綱 :</span> <br>

    <?php foreach ( $outlineku as $row ) : ?>
      <?= $row["nama"]; ?>
    <?php endforeach; ?>

    </p>
    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 工具和呈現方式 :</span> <br>

    <?php foreach ( $toolsku as $row ) : ?>
      <?= $row["nama"]; ?>
    <?php endforeach; ?>

    </p>
    </div>
  </div>
  <!-- Akhir baris -->
  <!-- Mulai baris -->
  <div class="w3-row w3-lime">
    <div class="w3-col w3-container w3-xxlarge w3-rest"><h1><a href="#" class="w3-button w3-section w3-green w3-ripple" style="width: 100%;">階段二 : 腳本設計</a></h1>
    </div>
    <div class="w3-col w3-container w3-rest">
    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 腳本設計 :</span> <br>

      <?php $i = 1; ?>
    <?php foreach ( $designku as $row ) : ?>
      <?= $i; ?><?= ". "; ?><?= $row["keterangan"]; ?><br>
    <?php $i++; ?>
    <?php endforeach; ?>


    </p>
    </div>
  </div>
  <!-- Akhir baris -->
  <!-- Mulai baris -->
  <div class="w3-row w3-lime">
    <div class="w3-col w3-container w3-xxlarge w3-rest"><h1><a href="phase_3_1.php" class="w3-button w3-section w3-green w3-ripple" style="width: 100%;">階段三 : 反思和討論</a></h1>
    </div>
    <div class="w3-col w3-container w3-rest">

    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> Peer 同儕回饋一 :</span> <br>
    
    <b>同儕給<span style="color: red;">我的</span>建議</b><br>
      <?php $i = 1; ?>
    <?php foreach ( $peerku as $row ) : ?>
      <?= $i; ?><?= ". "; ?><?= $row["username"]; ?> : <?= $row["nama"]; ?><br>
    <?php $i++; ?>
    <?php endforeach; ?>

    <br>
    <b><span style="color: red;">我給</span>同儕的回饋</b><br>
      <?php $i = 1; ?>
    <?php foreach ( $peerlist as $row ) : ?>
      <?= $i; ?><?= ". "; ?><?= $row["pilih_user"]; ?> : <?= $row["nama"]; ?><br>
    <?php $i++; ?>
    <?php endforeach; ?>

    </p>

    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 同儕回饋二 :</span> <br>
    
    <b>同儕給<span style="color: red;">我的</span>建議</b><br>
      <?php $i = 1; ?>
    <?php foreach ( $peerku2 as $row ) : ?>
      <?= $i; ?><?= ". "; ?><?= $row["username"]; ?> : <?= $row["nama"]; ?><br>
    <?php $i++; ?>
    <?php endforeach; ?>

    <br>
    <b><span style="color: red;">我給</span>同儕的回饋</b><br>
      <?php $i = 1; ?>
    <?php foreach ( $peerlist2 as $row ) : ?>
      <?= $i; ?><?= ". "; ?><?= $row["pilih_user"]; ?> : <?= $row["nama"]; ?><br>
    <?php $i++; ?>
    <?php endforeach; ?>

    </p>

    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 同儕回饋三 :</span> <br>
    
    <b>同儕給<span style="color: red;">我的</span>建議</b><br>
      <?php $i = 1; ?>
    <?php foreach ( $peerku3 as $row ) : ?>
      <?= $i; ?><?= ". "; ?><?= $row["username"]; ?> : <?= $row["nama"]; ?><br>
    <?php $i++; ?>
    <?php endforeach; ?>

    <br>
    <b><span style="color: red;">我給</span>同儕的回饋</b><br>
      <?php $i = 1; ?>
    <?php foreach ( $peerlist3 as $row ) : ?>
      <?= $i; ?><?= ". "; ?><?= $row["pilih_user"]; ?> : <?= $row["nama"]; ?><br>
    <?php $i++; ?>
    <?php endforeach; ?>

    <!-- File Presentation-->
    </p>
    <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> 期末成發 :</span> <br>
      <b>檔案 :</b> <br>
      <?php $i = 1; ?>
    <?php foreach ( $presentationku as $row ) : ?>
      <?= $i; ?><?= ". "; ?>
      <?= $row["gambar"]; ?> 
      <a href="filestory/<?= $row["gambar"]; ?>" target="_blank"><i class='fas fa-download'></i></a>
      <br> 
    <?php $i++; ?>
    <?php endforeach; ?> 
    </p>
    <!-- End File Presentation-->

    <!-- <p><span style="font-size: 30px;"><i class='fas fa-caret-right'></i> Group Discussion :</span> <br>

    <?php foreach ( $groupku as $row ) : ?>
      <?= $row["nama"]; ?> <br>
    <?php endforeach; ?>

    </p> -->

    </div>
  </div>
  <!-- Akhir baris -->


  <div class="w3-row w3-lime">
    <div class="w3-col w3-container w3-xxlarge w3-rest"><h1><a href="#" class="w3-button w3-section w3-green w3-ripple" style="width: 100%;"><i class='fas fa-chevron-down'></i> 評論和建議 <i class='fas fa-chevron-down'></i></a></h1>
    </div>
  </div>

  <div class="w3-row w3-lime">
    <div class="w3-col w3-container w3-rest">
    <p style="font-weight: bold;">請依照「數位敘事評分表」給予這組評分，例如4323….，總分XX分。
    </p>
    <p style="font-weight: bold;">並給這組的數位敘事作品適合的建議（我印象深刻的地方/可以改進的地方/我想要更了解的地方是...）</p>
    <p>1.對於這組的數位敘事作品，最令你印象深刻/有收穫的地方是哪個部分?為什麼?</p>
    <p>2.欣賞完這組的數位敘事作品，我覺得可以改善的地方是...?為什麼?</p>
    <p>3.欣賞完這組的數位敘事作品，你有什麼啟發或反思?</p>
    </div>
  </div>

	<form action="" class="w3-container w3-lime" enctype="multipart/form-data" method="POST">

        <div class="comment">
            <textarea class="textinput" rows="10" placeholder="Add your suggestion here" type="text" name="nama"></textarea>
            <input type="hidden" name="username" value="<?php foreach ( $userku2 as $row2 ) : ?><?= $row2["username"]; ?><?php endforeach; ?>">
            <input type="hidden" name="pilih" value="<?= $_GET["id"]; ?>">
            <input type="hidden" name="pilih_user" value="<?php foreach ( $userku as $row ) : ?><?= $row["username"]; ?><?php endforeach; ?>">
        </div>

	  
	  <button class="w3-button w3-section w3-green w3-ripple" type="submit" name="submit"> <i class='fas fa-comment-dots'></i> Suggestion (建議)</button>
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

