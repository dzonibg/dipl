<?php
include("header.php");
include("menu.php");
include("db.php");
$idpor = $_GET['id'];

if (!isset($idpor)) { //prikaz svih porudzbina
	?>
	    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="well">
              <h2>Nove porudzbine</h2>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Korisnik</th>
                    <th>Datum porudzbine</th>
                    <th>Pregled</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				$q = "SELECT u.*, p.* FROM users u, porudzbine p WHERE p.obradjena=0 AND u.id=p.id_kor";
				$res = mysqli_query($conn, $q);
				while ($p = mysqli_fetch_assoc($res)) {
                echo '  <tr>';
                echo '    <td>' . $p['id_porudzbine'] . '</td>';
                echo '    <td>' . $p['mail'] . '</td>';
                echo '    <td>' . $p['datum'] . '</td>';
                echo '    <td><a href="porudzbine.php?id=' . $p['id_porudzbine'] . '" type="button" class="btn btn-primary">Pregled</button></td>';
                echo '  </tr>';
				} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="well">
              <h2>Obradjene porudzbine</h2>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Korisnik</th>
                    <th>Datum porudzbine</th>
                    <th>Pregled</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				$q = "SELECT u.*, p.* FROM users u, porudzbine p WHERE p.obradjena=1 AND u.id=p.id_kor";
				$res = mysqli_query($conn, $q);
				while ($p = mysqli_fetch_assoc($res)) {
                echo '  <tr>';
                echo '    <td>' . $p['id_porudzbine'] . '</td>';
                echo '    <td>' . $p['mail'] . '</td>';
                echo '    <td>' . $p['datum'] . '</td>';
                echo '    <td><a href="porudzbine.php?id=' . $p['id_porudzbine'] . '" type="button" class="btn btn-primary">Pregled</button></td>';
                echo '  </tr>';
				} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<?php
} // kraj listanja porudzbina


if (isset($_GET['id'])) {	//ispis individualne porudzbine
	?>
	    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="well">
			<?php
			$q = "SELECT u.*, p.* FROM users u, porudzbine p WHERE p.id_kor=u.id AND p.id_porudzbine='$idpor'";
			$res = mysqli_query($conn, $q);
			$info = mysqli_fetch_assoc($res);
			?>
              <h2>Porudzbina #<?php echo $info['id_porudzbine']; ?></h2>
              <p>ID korisnika: <?php echo $info['id']; ?>
                <br>Ime i prezime: <?php echo $info['ime'] . ' ' . $info['prezime']; ?>
                <br>Adresa: <?php echo $info['adresa']; ?>
                <br>Grad: <?php echo $info['grad']; ?>
                <br>Telefon: <?php echo $info['tel']; ?>
                <br>E-mail: <?php echo $info['mail']; ?>
                <br>Datum: <?php echo $info['datum']; ?>
				<?php $obradjena = $info['obradjena']; ?>
                <br><hr>
                Poruceni proizvodi:</p>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Sifra proizvoda</th>
                    <th>Proizvodjac</th>
                    <th>Model</th>
                    <th>Cena</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				$proizvodiq = "SELECT i.*, p.* FROM proizvodi i, porudzbine_proizvodi p WHERE p.idporudzbine ='$idpor' AND p.idproizvoda = i.id";
				$pres = mysqli_query($conn, $proizvodiq);
				$cenau = 0;
				while($proizvod = mysqli_fetch_assoc($pres)) {
				$cenau = $cenau + $proizvod['cena'];
                  echo '<tr>';
                  echo '  <td>#' . $proizvod['id'] . '</td>';
                  echo '  <td>' . $proizvod['proizvodjac'] . '</td>';
                  echo '  <td>' . $proizvod['model'] . '</td>';
                  echo '  <td>' . $proizvod['cena'] . ' RSD</td>';
                  echo '</tr>';
				}
				  ?>
                </tbody>
              </table>
			  <hr>
			  <p class="text-right">Ukupno: <?php echo $cenau; ?>,00 RSD</p>
            </div>
          </div>
		  <?php if ($obradjena == 0) echo '<p class="text-center"><button id="btnObradi" class="btn btn-primary">Obradi</button></p>'; ?>
		  <br>
		  <p class="text text-center text-success" id="result"></p>
		  
		  <script type="text/javascript">
				$("#btnObradi").click(function(){
				$("#result").load("process.php?id=<?php echo $idpor; ?>");
				});
			</script>

		  
		  </div>
		  </div>
		  </div>
	
	
<?php

}


?>





<?php include("footer.php"); ?>