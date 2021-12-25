<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu
$id = $_GET["id"];

if ( hapususer($id) > 0 ) {
	echo "
			<script>
			alert('The user has been deleted!');
			document.location.href = 'one.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The user can't be deleted!');
			document.location.href = 'one.php';
			</script>
		";
}




 ?>