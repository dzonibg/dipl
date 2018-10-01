<?php
include("header.php");
include("menu.php");
include("db.php");


$catid = $_GET['catid'];

$query = "SELECT * FROM kategorije WHERE catid='$catid';";
$res = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($res)) {
$catname = $row['catname'];
$spec1 = $row['spec1name'];
$spec2 = $row['spec2name'];
$spec3 = $row['spec3name'];
$spec4 = $row['spec4name'];
$spec5 = $row['spec5name'];
$spec6 = $row['spec6name'];





		  }
		  
echo '<div class="text-center">';		 
echo '<h1 class="text-primary">Kategorija: ' . $catname . '</h1>';
echo "<br><br>";
echo '</div>';

?>

    <div class="section">
      <div class="container">
<div class="col-md-12">
            <form method="POST" class="form-horizontal" role="form" action="changecat2.php" >
			<div class="text-center">
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">ID kategorije</label>
                </div>
                <div class="col-sm-10">
                  <input type="hidden" name="catid" class="form-control"  value=<?php echo $catid;?>> <?php echo $catid; ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Naziv kategorije
                    <br>
                  </label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="catname" class="form-control" value=<?php echo $catname;?>>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Naziv karakteristike 1</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="spec1" class="form-control" value=<?php echo $spec1;?>>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Naziv karakteristike 2
                    <br>
                  </label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="spec2" class="form-control" value=<?php echo $spec2;?>>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Naziv karakteristike 3</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="spec3" class="form-control" value=<?php echo $spec3;?>>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Naziv karakteristike 4</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="spec4" class="form-control" value=<?php echo $spec4;?>>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Naziv karakteristike 5</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="spec5" class="form-control"  value=<?php echo $spec5;?>>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Naziv karakteristike 6</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="spec6" class="form-control"  value=<?php echo $spec6;?>>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-center">
                  <button type="submit" class="btn btn-default">Izmeni</button>
                </div>
              </div>
            </form>
			</div></div></div>
<?php include("footer.php");
 ?>