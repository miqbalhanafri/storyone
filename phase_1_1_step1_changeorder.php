<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"];
$theme = query("SELECT * FROM theme WHERE user = '$userid'");

?>

<!-- Rubah design order --> 
<?php
$connect = mysqli_connect("localhost", "root", "", "storyone");
$userid = $_SESSION["userId"];
$query = "SELECT * FROM theme WHERE user = '$userid' ORDER BY pilih ASC";
$result = mysqli_query($connect, $query);
?>
<!-- Ends design order -->

<!DOCTYPE html>
<html>
<title>GIDLE - Storytelling</title>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<!-- Script order design -->
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- End script order design -->

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

/* style order design */
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   } 
.box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
   #page_list li
   {
    padding:16px;
    background-color:#f9f9f9;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
   #page_list li.ui-state-highlight
   {
    padding:24px;
    background-color:#ffffcc;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }
/* end style order design */ 
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
	  <div class="w3-col w3-container w3-xxlarge"><h1>階段一 : 改變順序</a></h1></div>
	</div>
	<div class="w3-row"><br>
	  <div class="w3-col w3-container"><p>確定想要的主題之後，請把適合的主題拖曳到第一順位。</p></div>
	</div>
<div class="w3-row w3-center"><i class="fas fa-chevron-up w3-center" style="font-size: 30px;"></i></div>
<!-- Looping for the div table -->
<div style="color: black;">
   <ul class="list-unstyled" id="page_list">
   <?php 
   while($row = mysqli_fetch_array($result))
   {
    echo '<li id="'.$row["id"].'">'.$row["nama"].'</li>';
   }
   ?>
   </ul>
   <input type="hidden" name="page_order_list" id="page_order_list" />
  </div>	

<!-- End looping for the div table -->
<div class="w3-row w3-center"><i class="fas fa-chevron-down w3-center" style="font-size: 30px;"></i></div>

    <div class="w3-col w3-container">
    <a href="phase_1_1_step1.php" class="w3-button w3-section w3-green w3-ripple" style="text-decoration: none;"><i class='fas fa-undo'></i></a></div>


</div>

  
</div>
<br>
  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>

<script>
$(document).ready(function(){
 $( "#page_list" ).sortable({
  placeholder : "ui-state-highlight",
  update  : function(event, ui)
  {
   var page_id_array = new Array();
   $('#page_list li').each(function(){
    page_id_array.push($(this).attr("id"));
   });
   $.ajax({
    url:"phase_1_1_step1_updateorder.php",
    method:"POST",
    data:{page_id_array:page_id_array},
    success:function(data)
    {
     alert(data);
    }
   });
  }
 });

});
</script>