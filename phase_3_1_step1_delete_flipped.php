<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu
$id = $_GET["id"];

if ( hapusreflect($id) > 0 ) {
	echo "
			<script>
			alert('The reflection has been deleted!');
			document.location.href = 'phase_3_1_step1_flipped.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The reflection can't be deleted!');
			document.location.href = 'phase_3_1_step1_flipped.php';
			</script>
		";
}




 ?>