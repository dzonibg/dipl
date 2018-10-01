<?php
session_start();
include("db.php");
$cartid = $_GET['id'];
$q = "DELETE FROM korpa WHERE cartid=$cartid";
mysqli_query($conn, $q);
echo 'Proizvod izbrisan iz korpe. Stranica ce se osveziti.';
?>