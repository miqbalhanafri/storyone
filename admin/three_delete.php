<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu
$id = $_GET["id"];

if ( hapusinfo($id) >= 0 ) {
	echo "
			<script>
			alert('The information has been deleted!');
			document.location.href = 'three.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The information can't be deleted!');
			document.location.href = 'three.php';
			</script>
		";
}




 ?>