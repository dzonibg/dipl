<?php
include("header.php");
include("menu.php");
include("db.php"); 

$catname = $_POST['catname'];
$spec1 = $_POST['spec1'];
$spec2 = $_POST['spec2'];
$spec3 = $_POST['spec3'];
$spec4 = $_POST['spec4'];
$spec5 = $_POST['spec5'];
$spec6 = $_POST['spec6'];

if ($catname != '') {

	$query = "INSERT INTO kategorije(catname, spec1name, spec2name, spec3name, spec4name, spec5name, spec6name) VALUES ('$catname', '$spec1', '$spec2', '$spec3', '$spec4', '$spec5', '$spec6');";
	mysqli_query($conn, $query);
	$target_dir = "../img/catimg/";
	$imgid = mysqli_insert_id($conn);
	$target_file = $target_dir . basename($_FILES["img"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	move_uploaded_file($_FILES["img"]["tmp_name"], '../img/catimg/' . $imgid . '.jpg');
	
}

?>





<?php include("footer.php"); ?>