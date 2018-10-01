<?php
include("db.php");
$id = $_GET['id'];
$q = "UPDATE porudzbine SET obradjena=1 WHERE id_porudzbine='$id'";
mysqli_query($conn, $q);


echo 'Porudzbina ID #' . $_GET['id'] . ' je obradjena. Status je promenjen.';
?>

	<script>
	setTimeout(function () {
   window.location.href = "/admin/porudzbine.php";
}, 3200); 
   </script>