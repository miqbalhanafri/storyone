<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu
$id = $_GET["id"];

if ( hapustheme($id) > 0 ) {
	echo "
			<script>
			alert('The theme has been deleted!');
			document.location.href = 'phase_1_1_step1.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The theme can't be deleted!');
			document.location.href = 'phase_1_1_step1.php';
			</script>
		";
}




 ?>