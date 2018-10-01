<?php
include("header.php");
include("menu.php");
include("db.php");
?>




<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal" method="POST" role="form" action="">
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Kategorija</label>
                </div>
                <div class="col-sm-10">
                  <select name ="kategorija" class="form-control">
				  <option value=0>Izaberi kategoriju...</option>
				  <?php
				  $query = "SELECT * FROM kategorije";
				  $res = mysqli_query($conn, $query);
                  while($row = mysqli_fetch_assoc($res)) {
                   echo ' <option value=' . $row['catid'] . '>' . $row['catname'] . '</option> ';
				  }
					?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-center">
                  <button type="submit" name="submitbutton" class="btn btn-primary">Prikazi kategoriju</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
	
	

<?php	if(isset($_POST['submitbutton'])){
   $kategorija = $_POST['kategorija'];
   $query2 = "SELECT * FROM kategorije WHERE catid='$kategorija'";
   $res2 = mysqli_query($conn, $query2);
?>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
			<br>
            <h1 class="text-center text-danger">Izabrana kategorija: Procesori</h1>
          </div>
        </div>
      </div>
    </div>
	
	<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
		  <a href="addprod.php?catid=<?php echo $kategorija; ?>" class="btn btn-danger">Dodaj proizvod u kategoriji</a>
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Proizvodjac</th>
                  <th>Model</th>
                  <th>Cena</th>
<?php   while($row2 = mysqli_fetch_assoc($res2)) {
	   echo "<th>" . $row2['spec1name'] . "</th>";
	   echo "<th>" . $row2['spec2name'] . "</th>";
	   echo "<th>" . $row2['spec3name'] . "</th>";
	   echo "<th>" . $row2['spec4name'] . "</th>";
	   echo "<th>" . $row2['spec5name'] . "</th>";
	   echo "<th>" . $row2['spec6name'] . "</th>";
   }
   ?>
				  <th>Slika</th>
				  <th>Opcije</th>
				  <th>Brisanje</th>
                </tr>
              </thead>
              <tbody>
			  <?php 
			  $query3 = "SELECT * FROM proizvodi WHERE catid='$kategorija'";
			  $res3 = mysqli_query($conn, $query3);
			  while($row3 = mysqli_fetch_assoc($res3)) {
               echo " <tr>";
               echo  " <td>" . $row3['id'] . "</td>";
               echo "  <td>" . $row3['proizvodjac'] . "</td>";
               echo "   <td>" . $row3['model'] . "</td>";
               echo "   <td>" . $row3['cena'] . "</td>";
               echo "   <td>" . $row3['spec1val'] . "</td>";
			   echo "   <td>" . $row3['spec2val'] . "</td>";
			   echo "   <td>" . $row3['spec3val'] . "</td>";
			   echo "   <td>" . $row3['spec4val'] . "</td>";
			   echo "   <td>" . $row3['spec5val'] . "</td>";
			   echo "   <td>" . $row3['spec6val'] . "</td>";
			   echo "   <td><img height='42' width='42' src='../img/primg/" . $row3['id'] . ".jpg'></img></td>";
			   echo '<td><a href="editpr.php?cat=' . $kategorija . '&prid=' . $row3['id'] . '" class="btn btn-primary">Izmeni</a></td>';
			   echo '<td><a href="editpr.php?del=1&prid=' . $row3['id'] . '" class="btn btn-primary">Obrisi</a></td>';
               echo " </tr>";
			  }
			   ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	
<?php } ?>
<?php include("footer.php"); ?>