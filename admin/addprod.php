<?php
include("header.php");
include("menu.php");
include("db.php");


//dodavanje proizvoda, poznata kategorija
if (isset($_GET['catid'])) { 

	$catid = $_GET['catid'];
	$sql = "SELECT * FROM kategorije WHERE catid='$catid'";
	$query = mysqli_query($conn, $sql);
	$catinfo = mysqli_fetch_assoc($query);
?>	
	
	
	    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title text-danger">Dodavanje proizvoda u kategoriju<b> <?php echo $catinfo['catname']; ?></b></h3>
              </div>
              <div class="panel-body">
                <form method="POST" action="addprod.php?cat=<?php echo $catinfo['catid']; ?>"role="form" enctype="multipart/form-data">
                  <div class="form-group" id="model">
                    <label class="control-label">Naziv proizvoda/modela</label>
                    <input name="model" class="form-control" type="text">
                  </div>
                  <div class="form-group" id="proizvodjac">
                    <label class="control-label">Proizvodjac</label>
                    <input name="proizvodjac" class="form-control" type="text">
                  </div>
                  <div class="form-group" id="cena">
                    <label class="control-label">Cena u RSD</label>
                    <input name="cena" class="form-control" type="text">
                  </div>
                  <div class="form-group" id="spec1val">
                    <label class="control-label"><?php echo $catinfo['spec1name']; ?></label>
                    <input name="spec1val" class="form-control" type="text">
                  </div>
                  <div class="form-group" id="spec2val">
                    <label class="control-label"><?php echo $catinfo['spec2name']; ?></label>
                    <input name="spec2val" class="form-control" type="text">
                  </div>
                  <div class="form-group" id="spec3val">
                    <label class="control-label"><?php echo $catinfo['spec3name']; ?></label>
                    <input name="spec3val" class="form-control" type="text">
                  </div>
                  <div class="form-group" id="spec4val">
                    <label class="control-label"><?php echo $catinfo['spec4name']; ?></label>
                    <input name="spec4val" class="form-control" type="text">
                  </div>
                  <div class="form-group" id="spec5val">
                    <label class="control-label"><?php echo $catinfo['spec5name']; ?></label>
                    <input name="spec5val" class="form-control" type="text">
                  </div>
                  <div class="form-group" id="spec6val">
                    <label class="control-label"><?php echo $catinfo['spec6name']; ?></label>
                    <input name="spec6val" class="form-control" type="text">
                  </div>
                  <div class="form-group" id="img">
                    <label class="control-label">Slika proizvoda</label>
                    <input name="img" type="file">
                  </div>
                  <button type="submit" class="btn btn-danger">Dodaj proizvod</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	
<?php
}	//kraj petlje za ispis forme

//query za upisivanje u bazu
if (isset($_GET['cat'])) {
	
	$cat = $_GET['cat'];
	$model = $_POST['model'];
	$proizvodjac = $_POST['proizvodjac'];
	$cena = $_POST['cena'];
	$s1 = $_POST['spec1val'];
	$s2 = $_POST['spec2val'];
	$s3 = $_POST['spec3val'];
	$s4 = $_POST['spec4val'];
	$s5 = $_POST['spec5val'];
	$s6 = $_POST['spec6val'];
	$sqlupis = "INSERT INTO proizvodi (catid, proizvodjac, model, cena, spec1val, spec2val, spec3val, spec4val, spec5val, spec6val) VALUES ('$cat', '$proizvodjac', '$model', '$cena', '$s1', '$s2', '$s3', '$s4', '$s5', '$s6')";
	mysqli_query($conn, $sqlupis);
	
	$target_dir = "../img/primg/";
	$imgid = mysqli_insert_id($conn);
	$target_file = $target_dir . basename($_FILES["img"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	move_uploaded_file($_FILES["img"]["tmp_name"], '../img/primg/' . $imgid . '.jpg');
	echo '    <div class="section">';
    echo '  <div class="container">';
	echo'          <div class="col-md-12">';
    echo'        <div class="well">';
    echo'          <h2>Proizvod je dodat.</h2>';
    echo'          <p>Možete ga pogledati u listi proizvoda.</p>';
	echo' <a href="proizvodi.php" class="btn btn-primary">Nazad</a>';
    echo'        </div>';
    echo'      </div>	';
	echo'</div></div>';
}

?>
<?php include("footer.php"); ?>