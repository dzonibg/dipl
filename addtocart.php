<?php
session_start();
include("db.php");
//vezivni fajl za bazu podataka i jquery
if ($_SESSION['loggedin'] == 1) {
	$prid = $_GET['prid'];
	$uid = $_SESSION['uid'];
	$query = "INSERT INTO korpa (uid, prid, filed) VALUES ('$uid', '$prid', '0')";
	mysqli_query($conn, $query);
	echo "Proizvod je dodat u Vasu korpu.";
	
}
?>