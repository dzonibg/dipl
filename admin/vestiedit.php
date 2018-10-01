<?php
include("header.php");
include("menu.php");
include("db.php");


if ($_GET['edit'] == "yes" & $_GET['id'] != 0) {
	$id = $_GET['id'];
	$q = "SELECT * FROM vesti WHERE id='$id'";
	$res = mysqli_query($conn, $q);
	$vest = mysqli_fetch_assoc($res);
	?>
 <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title">Izmena vesti</h3>
              </div>
              <div class="panel-body">
                <form method="POST" action="vestiedit.php?edit=edited&id=<?php echo $id; ?>" role="form" class="text-left">
                  <div class="form-group">
                    <label class="control-label">Naslov</label>
                    <input name="naslov" value="<?php echo $vest['title']; ?>" class="form-control" type="text">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Tekst vesti</label>
                    <textarea name="tekst" value="<?php echo $vest['text']; ?>" class="form-control"><?php echo $vest['text']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Datum</label>
                    <input name="datum" value="<?php echo $vest['date']; ?>" class="form-control" type="text">
                  </div>
                  <button type="submit" class="btn btn-block btn-danger">Izmeni</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	
	
<?php	
}

if ($_GET['edit'] == "edited" & $_GET['id'] != 0) {
$id = $_GET['id'];
$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];
$datum = $_POST['datum'];
$izmena = "UPDATE vesti SET title='$naslov', text='$tekst', date='$datum' WHERE id='$id'";
mysqli_query($conn, $izmena);
echo '<div class="panel panel-danger">';
echo '              <div class="panel-heading">';
echo '                <h3 class="panel-title">Izmena vesti</h3>';
echo '              </div>';
echo '              <div class="panel-body"><p class="text-danger">Vest je izmenjena.</p><a href="vesti.php" class="btn btn-block btn-danger">Nazad</a></div>';
echo '            </div>';
}
?>

<?php include("footer.php"); ?>