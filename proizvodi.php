<?php
include("header.php");
include("menu.php");
include("db.php");
$kat = $_GET['kat'];
$specq = "SELECT * FROM kategorije WHERE catid='$kat'";
$specres = mysqli_query($conn, $specq);
$specifikacija = mysqli_fetch_assoc($specres);

$page = 1;
$page = $_GET['page'];
$start_from = ($page - 1) * 10;
//izlistavanje proizvoda po kategoriji
if (isset($kat)) { 

echo '    <div class="section">';
echo '    <div class="container">';
//echo '		<div class="col-md-6">'; 

$sql = "SELECT * FROM proizvodi WHERE catid=$kat ORDER BY id DESC LIMIT $start_from, 20";
$query = mysqli_query($conn, $sql);
while($proizvodi = mysqli_fetch_assoc($query)) {
?>	



        <div class="col-md-6">
		
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $proizvodi['model']; ?></h3>
              </div>
              <div class="panel-body">
                <p><?php echo $proizvodi['proizvodjac'] . ' ' . $proizvodi['model'];?></p>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Proizvod</th>
                      <th>Specifikacija</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
					<td>
					
					
					  <?php $imgpath = '../img/primg/' . $proizvodi['id'];
                       echo ' <img class="prPhoto" width="200" src="' . $imgpath . '.jpg">'; ?>
                        <img>
                       </td>
                      <td>
					  
					  <?php echo $specifikacija['catname']; ?>
					  <br>
					<?php echo 'Proizvodjac: ' . $proizvodi['proizvodjac']; ?>
                      <br>
					<?php echo 'Model: ' . $proizvodi['model']; ?>
					<br>
					<?php echo $specifikacija['spec1name'] . ': ' . $proizvodi['spec1val']; ?>
					<br>
					<?php echo $specifikacija['spec2name'] . ': ' . $proizvodi['spec2val']; ?>					
					<br>
					<?php echo $specifikacija['spec3name'] . ': ' . $proizvodi['spec3val']; ?>
					<br>
					<?php echo $specifikacija['spec4name'] . ': ' . $proizvodi['spec4val']; ?>
					<br>
					<?php echo $specifikacija['spec5name'] . ': ' . $proizvodi['spec5val']; ?>
					<br>
					<?php echo $specifikacija['spec6name'] . ': ' . $proizvodi['spec6val']; ?>	
					<br><br>
					<?php echo  'Cena: ' . $proizvodi['cena'] . ',00 RSD'; ?>	
										
					</td>	
                    </tr>
					
					
                  </tbody>
                </table>
              <div class="panel-footer"><a href=proizvodi.php?prid=<?php echo $proizvodi['id']; ?>>Pogledaj proizvod</a></div>
			  </div></div></div>
<?php }

 ?> 
			</div> </div></div></div></div>
			<div class="container">
			<p class="text-center">Strana <?php echo $page; ?></p>
	        <ul class="pager">
              <li>
                <a href="proizvodi.php?kat=<?php echo $kat , '&page=';  if ($page > 1) { echo ($page-1); } else echo '1'; ?>"> <-</a>
              </li>
              <li>
                <a href="proizvodi.php?kat=<?php echo $kat . '&page=' . ($page+1); ?>"> -> </a>
              </li>
            </ul>
			</div></div>
	
<?php
	
}
//echo "Kraj listanja"; // kraj listanja proizvoda

        echo '</div>';

if (isset($_GET['prid'])) { // pregled individualnog proizvoda
$prid = $_GET['prid'];
$query = "SELECT * FROM proizvodi WHERE id=$prid";
$res = mysqli_query($conn, $query);
$proizvod = mysqli_fetch_assoc($res);

$catid = $proizvod['catid'];

$query2 = "SELECT * FROM kategorije WHERE catid=$catid";
$res2 = mysqli_query($conn, $query2);
$spec = mysqli_fetch_assoc($res2);
?>


 <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
		   <h2><b> <?php echo $proizvod['proizvodjac'] . ' ' . $spec['catname']; ?></b></h2><br>
            <div class="well">
              <h2> <?php echo $proizvod['proizvodjac'] . ' ' . $proizvod['model']; ?></h2>
             <?php echo '<p><img class="prPhoto" height=400 src="img/primg/' . $proizvod['id'] . '.jpg' . '"></img>'; ?>
                <br>
              </p>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Specifikacija</th> 
                    <th>Podaci</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Proizvodjac</td>
                    <td><?php echo $proizvod['proizvodjac'];?></td>
                  </tr>
                  <tr>
                    <td>Model</td>
                    <td><?php echo $proizvod['model'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $spec['spec1name'];?></td>
                    <td><?php echo $proizvod['spec1val'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $spec['spec2name'];?></td>
                    <td><?php echo $proizvod['spec2val'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $spec['spec3name'];?></td>
                    <td><?php echo $proizvod['spec3val'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $spec['spec4name'];?></td>
                    <td><?php echo $proizvod['spec4val'];?></td>
                  </tr>
                  <tr>
                    <td><?php echo $spec['spec5name'];?></td>
                    <td><?php echo $proizvod['spec5val'];?></td>
                  </tr>
				  <tr>
                    <td><?php echo $spec['spec6name'];?></td>
                    <td><?php echo $proizvod['spec6val'];?></td>
                  </tr>
                </tbody>
              </table>
              <h3 contenteditable="false">Cena proizvoda: <?php echo $proizvod['cena']; ?>,00 RSD</h3>
			  <?php if ($_SESSION['loggedin'] == 1) { //ako je korisnik ulogovan:
              echo '<button class="btn btn-primary" id="btn-add" name="btn-add">Dodaj u korpu</button>';
			  echo ' <p id="result"></p>';
									}
									
				//ako korisnik nije ulogovan:
				if ($_SESSION['loggedin'] != 1) {
					echo '<a href="logreg.php" class="btn btn-primary" id="logredirect" name="logredirect">Ulogujte se kako biste kupili ovaj proizvod.</a>';
				}
			   ?>
            </div>
          </div>
        </div>
      </div>
    </div>


	
<?php	
} //kraj individualnog proizvoda

if (empty($_GET['prid']) && empty($_GET['kat'])) { //listanje svih kategorija
$catq = "SELECT * FROM kategorije";
$catres = mysqli_query($conn, $catq);
while($kategorija = mysqli_fetch_assoc($catres)) {
echo '<div class="col-md-3 text-center">';
echo '            <div class="well">';
echo '             <h2> <a href="proizvodi.php?page=1&kat='. $kategorija['catid'] . '">' . $kategorija['catname'] .'</a></h2>';
//echo '              <p>Slika</p>';
echo '            </div>';
echo '          </div>	';  
}
} //kraj listanja svih kategorija

?>


<?php
include("footer.php");
?>

	<script type="text/javascript">
    $("#btn-add").click(function(){
        $("#result").load("addtocart.php?prid=<?php echo $_GET['prid'];?>");
		
    });
	</script>