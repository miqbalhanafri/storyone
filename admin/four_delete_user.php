<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu

if ( hapususerall() >= 0 ) {
	echo "
			<script>
			alert('The information has been deleted!');
			document.location.href = 'four.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The information can't be deleted!');
			document.location.href = 'four.php';
			</script>
		";
}




 ?>