<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu
$id = $_GET["id"];

if ( hapuspurpose($id) > 0 ) {
	echo "
			<script>
			alert('The purpose has been deleted!');
			document.location.href = 'phase_1_1_step2.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The purpose can't be deleted!');
			document.location.href = 'phase_1_1_step2.php';
			</script>
		";
}




 ?>