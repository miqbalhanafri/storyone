<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu
$id = $_GET["id"];

if ( hapusreflect2($id) > 0 ) {
	echo "
			<script>
			alert('The reflection has been deleted!');
			document.location.href = 'phase_3_1_step2_flipped.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The reflection can't be deleted!');
			document.location.href = 'phase_3_1_step2_flipped.php';
			</script>
		";
}




 ?>