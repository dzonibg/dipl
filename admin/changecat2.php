<?php
include("header.php");
include("menu.php");
include("db.php");


//vrednosti
$catid = $_POST['catid'];
$catname = $_POST['catname'];
$spec1 = $_POST['spec1'];
$spec2 = $_POST['spec2'];
$spec3 = $_POST['spec3'];
$spec4 = $_POST['spec4'];
$spec5 = $_POST['spec5'];
$spec6 = $_POST['spec6'];

$query = "UPDATE kategorije SET catname='$catname', spec1name='$spec1', spec2name='$spec2', spec3name='$spec3', spec4name='$spec4', spec5name='$spec5', spec6name='$spec6' WHERE catid = '$catid'";

if (mysqli_query($conn, $query)) {
    echo "Promena izvrsena";
} else {
    echo "Greska pri upisu: " . mysqli_error($conn);
}
echo $query;
echo "<br>" . $catid;
 include("footer.php"); ?>