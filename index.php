<?php
include('header.php');
include('menu.php');
include('db.php');
?>


<div class="section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="text-primary">Najnoviji proizvodi:</h4>
          </div>
        </div>
      </div>
    </div>
	<?php
	$nquery = "SELECT * FROM proizvodi ORDER BY id DESC LIMIT 4";
	$nres = mysqli_query($conn, $nquery);
	while ($proizvod = mysqli_fetch_assoc($nres)) {
		
echo '<div class="col-md-3 text-center">';
echo '            <div class="well">';
echo '              <p>' . $proizvod['proizvodjac'] . ' ' . $proizvod['model'] . '</p>';
echo '<br>';
echo '<p><a href="proizvodi.php?prid=' . $proizvod['id'] . '"><img height=100 src="img/primg/' . $proizvod['id'] . '.jpg"></img></a>';
echo '            </div>';
echo '          </div>';
		
	}
	
	
	
	
	
	?>
	</div>

<div class="section text-center">

<h4 class="text-center text-primary">Najnovija vest</h4>
<?php
include('db.php');
$sql =  'SELECT id, date, title, text FROM vesti ORDER BY id DESC LIMIT 1';
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
echo'    <div class="section">';
echo'      <div class="container">';
echo '            <div class="panel panel-primary text-center">';
echo '              <div class="panel-heading">';
echo '                <h3 class="panel-title">' . $row['title'] . ' - ' . $row['date'] . '</h3>';
echo '              </div>';
echo '              <div class="panel-body">';
echo '                <p> ' . $row['text'] . '</p>';
echo '              </div>';
echo '            </div></div>';


} 
}
echo '</div></div></div>';
include('footer.php');
?>
