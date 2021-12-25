<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu
$id = $_GET["id"];

if ( hapusoutline($id) > 0 ) {
	echo "
			<script>
			alert('The outline has been deleted!');
			document.location.href = 'phase_1_1_step3.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The outline can't be deleted!');
			document.location.href = 'phase_1_1_step3.php';
			</script>
		";
}




 ?>