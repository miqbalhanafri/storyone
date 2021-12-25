<?php  
session_start();
 
if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

// mengirim query ke functions.php
$userid = $_GET["id"]; 
// PHASE 1
$userku = query("SELECT * FROM user WHERE id = '$userid' ");
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
$groupku = query("SELECT * FROM group_diss WHERE user = '$userid' OR user2 = '$userid' OR user3 = '$userid' OR user4 = '$userid' OR user5 = '$userid' ");
//$reflectku = query("SELECT nama FROM reflect WHERE user = '$userid' ");
//$reflect2ku = query("SELECT nama FROM reflect2 WHERE user = '$userid' ");
//$presentationku = query("SELECT nama FROM presentation WHERE user = '$userid' ");
//$peerku = query("SELECT * FROM peer_reflection WHERE pilih = '$userid' ORDER BY pilih ");
//$peerlist = query("SELECT * FROM peer_reflection WHERE user = '$userid' ORDER BY id ASC");
//$groupku = query("SELECT nama FROM group_diss WHERE user = '$userid' ");

header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment; filename=DigiStory.xls");
header("Pragma: no-cache");
header("Expires: 0");


?>

<!DOCTYPE html>
<html>
<body>	

<table border="1px" style="width:70%;">
	<tr>
		<th colspan="2">
			<h2>Summary of Digital Storytelling</h2>
		</th>
	</tr>
	<tr>
		<th colspan="2" style="background-color: #cddc39;">
			<h4>Phase 1</h4>
		</th>
	</tr>
	<tr>
		<th>Username</th>
		<td>
			<h3 style="color: green;">
			<?php foreach ( $userku as $row ) : ?>
			<?= $row["username"]; ?>
			<?php endforeach; ?> [Code : <?= $row["id"]; ?> ]
			</h3>
		</td>
	</tr>
	<tr>
		<th>Theme</th>
		<td>
			<?php foreach ( $themeku as $row ) : ?>
			<?= $row["nama"]; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<th>Reason 1</th>
		<td>
			<?php foreach ( $reasonku as $row ) : ?>
			<?= $row["nama"]; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<th>Reason 2</th>
		<td>
			Sources :
			<?php foreach ( $reasonku2 as $row ) : ?>
			<?= $row["nama"]; ?>
			<?php endforeach; ?> 
			Reason : <?= $row["reason"]; ?>
		</td>
	</tr>
	<tr>
		<th>Purpose</th>
		<td>		
			<?php foreach ( $purposeku as $row ) : ?>
			<?= $row["nama"]; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<th>Outline</th>
		<td>
			<?php foreach ( $outlineku as $row ) : ?>
			<?= $row["nama"]; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<th>Way and Tools</th>
		<td>
			<?php foreach ( $toolsku as $row ) : ?>
			<?= $row["nama"]; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<th colspan="2" style="background-color: #cddc39;">
			<h4>Phase 2</h4>
		</th>
	</tr>
	<tr>
		<th>Script design</th>
		<td>
			<?php $i = 1; ?>
			<?php foreach ( $designku as $row ) : ?>
			<?= $i; ?><?= ". "; ?><?= $row["keterangan"]; ?><br>
			<?php $i++; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<th colspan="2" style="background-color: #cddc39;">
			<h4>Phase 3</h4>
		</th>
	</tr>

	<tr>
		<th rowspan="2">Draft 1</th>
		<td>
			<p style="font-weight: bold;">Peer reflection FROM your friends</p>
			<?php $i = 1; ?>
			<?php foreach ( $peerku as $row ) : ?>
			<?= $i; ?><?= ". "; ?><?= $row["username"]; ?> : <?= $row["nama"]; ?><br>
			<?php $i++; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<td>
			<p style="font-weight: bold;">Some suggestions TO your friends digital storytelling</p>
			<?php $i = 1; ?>
			<?php foreach ( $peerlist as $row ) : ?>
			<?= $i; ?><?= ". "; ?><?= $row["pilih_user"]; ?> : <?= $row["nama"]; ?><br>
			<?php $i++; ?>
			<?php endforeach; ?>
		</td>
	</tr>

	<tr>
		<th rowspan="2">Draft 2</th>
		<td>
			<p style="font-weight: bold;">Peer reflection FROM your friends</p>
			<?php $i = 1; ?>
			<?php foreach ( $peerku2 as $row ) : ?>
			<?= $i; ?><?= ". "; ?><?= $row["username"]; ?> : <?= $row["nama"]; ?><br>
			<?php $i++; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<td>
			<p style="font-weight: bold;">Some suggestions TO your friends digital storytelling</p>
			<?php $i = 1; ?>
			<?php foreach ( $peerlist2 as $row ) : ?>
			<?= $i; ?><?= ". "; ?><?= $row["pilih_user"]; ?> : <?= $row["nama"]; ?><br>
			<?php $i++; ?>
			<?php endforeach; ?>
		</td>
	</tr>

		<tr>
		<th rowspan="2">Final</th>
		<td>
			<p style="font-weight: bold;">Peer reflection FROM your friends</p>
			<?php $i = 1; ?>
			<?php foreach ( $peerku3 as $row ) : ?>
			<?= $i; ?><?= ". "; ?><?= $row["username"]; ?> : <?= $row["nama"]; ?><br>
			<?php $i++; ?>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<td>
			<p style="font-weight: bold;">Some suggestions TO your friends digital storytelling</p>
			<?php $i = 1; ?>
			<?php foreach ( $peerlist3 as $row ) : ?>
			<?= $i; ?><?= ". "; ?><?= $row["pilih_user"]; ?> : <?= $row["nama"]; ?><br>
			<?php $i++; ?>
			<?php endforeach; ?>
		</td>
	</tr>

	<tr>
		<th>Group discussion</th>
		<td>
			<?php foreach ( $groupku as $row ) : ?>
			<b><?= $row["group_name"]; ?></b> : <?= $row["nama"]; ?><br>
			<?php endforeach; ?>
		</td>
	</tr>
</table>


</body>
</html>

