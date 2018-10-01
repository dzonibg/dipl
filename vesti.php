<?php


include("header.php");
include("menu.php");
include("db.php");

?>
    <div class="section">
      <div class="container">
	  <h1 class="text-center text-primary">Najnovije vesti</h1>
	  <br><br>
<?php

$sql = "SELECT id, date, title, text FROM vesti ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
echo '<div class="row">';
echo '            <div class="panel panel-primary text-center">';
echo '              <div class="panel-heading">';
echo '                <h3 class="panel-title">' . $row['title'] . ' - ' . $row['date'] . '</h3>';
echo '              </div>';
echo '              <div class="panel-body">';
echo '                <p> ' . $row['text'] . '</p>';
echo '              </div>';
echo '            </div></div><br><br>';
	
}
}
?>

</div></div>
<?php
include("footer.php");
?>
