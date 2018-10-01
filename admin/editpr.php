<?php
error_reporting(-1);
include("header.php");
include("menu.php");
include("db.php");
$prid = $_GET['prid'];
$del = $_GET['del'];
$catid = $_GET['cat'];
if ($del == 1) {
	//brisanje proizvoda
?>
	          <div class="col-md-12">
            <div class="text-center well">
              <h2 class="text-danger">Brisanje proizvoda</h2>
			  <?php 
			  $query = "SELECT * FROM proizvodi WHERE id='$prid'";
			  $res = mysqli_query($conn, $query);
              while($row = mysqli_fetch_assoc($res)) {
              echo '<p class="text-danger">Da li ste sigurni da zelite da obrisete proizvod ID ' .
			  $row['id'] . ' sa nazivom ' . $row['proizvodjac'] . ' ' . $row['model'] . '?</p>'; } ?>
              <a href="editpr.php?del=1&conf=1&prid=<?php echo $prid; ?>" class="btn btn-danger">Obrisi</a>
              <a href="proizvodi.php" class="btn btn-primary">Ne</a>
            </div>
	
	
<?php } ?>
<?php
//editovanje proizvoda, forma
if (isset($_GET['prid']) && ($del != 1)) {
	
	//izmena proizvoda
	$specquery = "SELECT * FROM kategorije WHERE catid='$catid'";
	$specres = mysqli_query($conn, $specquery);
	$specs = mysqli_fetch_assoc($specres);
	
	$prodquery = "SELECT * FROM proizvodi WHERE id='$prid'";
	$prodres = mysqli_query($conn, $prodquery);
	$prodinfo = mysqli_fetch_assoc($prodres);
	
	
	?>
	
	<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-left">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title text-primary">Izmena proizvoda  <?php echo $prodinfo['proizvodjac'] . ' ' . $prodinfo['model'] ?></h3>
              </div>
              <div class="panel-body">
                <p>Izmena proizvoda:</p>
                <form role="form" method="POST" action="editpr.php?id=<?php echo $prid; ?>">
                  <div class="form-group">
                    <label class="control-label" >Proizvodjac</label>
                    <input class="form-control"
                     type="text" name ="proizvodjac" value="<?php echo $prodinfo['proizvodjac'];?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label" >Model</label>
                    <input class="form-control" 
                     type="text" name="model" value="<?php echo $prodinfo['model'];?>">
                  </div>
				   <div class="form-group">
                    <label class="control-label" >Cena</label>
                    <input class="form-control" 
                     type="text" name="cena" value="<?php echo $prodinfo['cena'];?>">
                  </div>
				   <div class="form-group">
                    <label class="control-label" ><?php echo $specs['spec1name']; ?></label>
                    <input class="form-control" 
                     type="text" name="s1" value="<?php echo $prodinfo['spec1val'];?>">
                  </div>				  
				   <div class="form-group">
                    <label class="control-label" ><?php echo $specs['spec2name']; ?></label>
                    <input class="form-control" 
                     type="text" name="s2" value="<?php echo $prodinfo['spec2val'];?>">
                  </div>	
				   <div class="form-group">
                    <label class="control-label" ><?php echo $specs['spec3name']; ?></label>
                    <input class="form-control" 
                     type="text" name="s3" value="<?php echo $prodinfo['spec3val'];?>">
                  </div>	
				   <div class="form-group">
                    <label class="control-label" ><?php echo $specs['spec4name']; ?></label>
                    <input class="form-control" 
                     type="text" name="s4" value="<?php echo $prodinfo['spec4val'];?>">
                  </div>	
				   <div class="form-group">
                    <label class="control-label" ><?php echo $specs['spec5name']; ?></label>
                    <input class="form-control" 
                     type="text" name="s5" value="<?php echo $prodinfo['spec5val'];?>">
                  </div>					  
				   <div class="form-group">
                    <label class="control-label" ><?php echo $specs['spec6name']; ?></label>
                    <input class="form-control" 
                     type="text" name="s6" value="<?php echo $prodinfo['spec6val'];?>">
                  </div>	
                  <button type="submit" class="btn btn-primary">Izmeni</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	
<?php } ?>

<?php //query za editovanje
if (isset($_GET['id']) && ($del != 1)) {
	$proizvodjac = $_POST['proizvodjac'];
	$model = $_POST['model'];
	$cena = $_POST['cena'];
	$s1 = $_POST['s1'];
	$s2 = $_POST['s2'];
	$s3 = $_POST['s3'];
	$s4 = $_POST['s4'];
	$s5 = $_POST['s5'];
	$s6 = $_POST['s6'];
	$productid = $_GET['id'];
    $izmena = "UPDATE proizvodi SET proizvodjac='$proizvodjac', model='$model', cena='$cena', spec1val='$s1', spec2val='$s2', spec3val='$s3', spec4val='$s4', spec5val='$s5', spec6val='$s6' WHERE id='$productid'"; 
    if (mysqli_query($conn, $izmena)) {

	echo '<div class="row text-center">';
	echo '<div class="col-md-12">';
    echo '        <div class="well">';
    echo '          <h2 class="text-danger">Proizvod izmenjen.</h2>';
    echo '          <p class="text-danger">Proizvod sa nazivom ' . $model . ' je izmenjen.</p>';
    echo '          <a href="proizvodi.php" class="btn btn-danger">Nazad na proizvode</a>';
    echo '        </div>';
    echo '      </div>';
	echo '     </div>';
	} else echo mysqli_error($conn);
} 

if (isset($_GET['prid']) && ($_GET['del'] == 1) && ($_GET['conf'] == 1)) {
	$delprod = $_GET['prid'];
	$delquery = "DELETE FROM proizvodi WHERE id='$delprod'";
	mysqli_query($conn, $delquery);
	?>
	<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title">Obavestenje</h3>
              </div>
              <div class="panel-body">
                <p>Proizvod <?php echo $delprod; ?> je obrisan.</p>
              </div>
              <div class="panel-footer"><a href="proizvodi.php">Nazad</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php } ?>
<?php include("footer.php"); ?>