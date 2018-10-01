<?php
include("header.php");
include("menu.php");
include("db.php");
$userid = $_SESSION['uid'];
$orderid = $_GET['id'];

?>
	    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="well">
			<?php
			$q = "SELECT u.*, p.* FROM users u, porudzbine p WHERE p.id_kor='$uid' AND p.id_porudzbine='$orderid'";
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
				$proizvodiq = "SELECT i.*, p.* FROM proizvodi i, porudzbine_proizvodi p WHERE p.idporudzbine ='$orderid' AND p.idproizvoda = i.id";
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
			<a href="user.php" class="btn btn-primary">Nazad</a>
          </div>
		  </div>
		  </div>




<?php include("footer.php");