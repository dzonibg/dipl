<?php
include("header.php");
include("menu.php");
include("db.php");
$brojac = 0;
$uid = $_SESSION['uid'];
$cena = 0;
if ($_SESSION['loggedin'] != 1) { // ako korisnik nije ulogovan
	?>
	    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-center well">
              <h2>Niste prijavljeni.</h2>
			  <br><br>
              <p>Kako biste koristili sve funkcije internet prodavnice, molimo vas da se
                <a href="logreg.php">ulogujete</a> ili <a href="register.php">registrujete</a> na web sajt.
                <br>
                <br>Time cete moci da koristite korpu i pravite porudzbine.</p>
            </div>
			<br><br><br><br><br><br><br>
          </div>
        </div>
		</div>
		</div>
	<?php
	
}

if ($_SESSION['loggedin'] == 1) { // ako je korisnik ulogovan
	$uid = $_SESSION['uid'];
	$q1 = "SELECT * FROM korpa AS korpa LEFT JOIN proizvodi AS proizvodi ON proizvodi.id = korpa.prid WHERE korpa.uid = $uid AND korpa.filed=0";
	$res1 = mysqli_query($conn, $q1);
	$brporudzbina = mysqli_num_rows($res1);
	if ($brporudzbina == 0) {
		?>
		</div>
		<div class="well">
              <h2>Nemate proizvoda u korpi.</h2>
              <p>
                <br>Pogledajte nasu bogatu ponudu i izaberite nesto zanimljivo za Vas!</p>
            </div>
			<br><br><br><br><br><br><br><br><br>
			</div>
			<?php
		
		
	}
	
	if ($brporudzbina > 0) { //ako ima porudzbina
		
?>	
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="well">
              <h2>Proizvodi u korpi:</h2>
              <br><br>
			  <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <tbody>
				  <?php
					while($korpa = mysqli_fetch_assoc($res1)) {
						$brojac = $brojac + 1;
						$cena = $cena + $korpa['cena'];
						echo '<tr>';
						echo '<td width=20>' . $brojac . '</td>';
						echo '<td width=55><img width="50" src="img/primg/' . $korpa['id'] . '.jpg"></img>';
						echo '<td>' . $korpa["proizvodjac"] . ' ' . $korpa['model'] . '</td>';
						echo '<td>' . $korpa['spec1val'] . ', ' . $korpa['spec2val'] . ', ' . $korpa['spec3val'] . '</td>';
						echo '<td>' . $korpa['cena'] . ',00 RSD </td>';
						echo '<td width=50><button type="button" class="btn btn-primary" name="btn-del' . $korpa['cartid'] . '" id="btn-del' . $korpa['cartid'] . '">Obrisi</button></td>';
						echo '</tr>';
?>

				<script type="text/javascript">
						$("#btn-del<?php echo $korpa['cartid'];?>").click(function(){
                        $("#result").load("delcart.php?id=<?php echo $korpa['cartid'];?>");
						setTimeout(location.reload.bind(location), 2000);
        });
				</script>




<?php

						}

						?>
                  <tr></tr>
                </tbody>
              </table>
			  </div>
			  <?php echo 'Ukupno proizvoda u korpi: ' . $brporudzbina . '<br>';
					echo 'Cena porudzbine: <b>' . $cena . ',00 RSD </b><br><br>';

			  ?>
              <a class="btn btn-primary" data-toggle="modal" data-target="#modal-potvrdi">Obavi porudzbinu</a>
			  <p id="result"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  

<?php	
	} // kraj ako ima porudzbina
	
	
}



?>

   <div class="modal fade" id="modal-potvrdi">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Potvrda porudzbine</h4>
          </div>
          <div class="modal-body">
            <p>Da li ste sigurni da zelite da porucite proizvode iz korpe?
              <br>Ukupna vrednost vase porudzbine je  <?php echo $cena; ?>,00 RSD i bice obradjena.</p>
          </div>
          <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">Zatvori</a>
            <a href = "poruci.php?potvrda=da" class="btn btn-primary">Potvrdi porudzbinu</a>
          </div>
        </div>
		</div>
		</div></div>


<?php include("footer.php"); ?>