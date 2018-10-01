<?php
include("header.php");
include("menu.php");
include("db.php");
$uid = $_SESSION['uid'];
$vreme = date("M j G:i:s");
if (($_GET['potvrda'] == "da") & ($_SESSION['loggedin'] == 1)) { //provere pred obradu
	
	$q = "INSERT INTO porudzbine (id_kor, datum, obradjena) VALUES ('$uid', '$vreme', '0')";
	mysqli_query($conn, $q);
	$idpor = mysqli_insert_id($conn);
	
	$prq = "INSERT into porudzbine_proizvodi (idproizvoda, cena, uid, idporudzbine) SELECT k.prid, p.cena, k.uid, '$idpor' FROM korpa k, proizvodi p WHERE k.filed=0 AND k.uid=2 AND k.prid = p.id";
	mysqli_query($conn, $prq);
	?>
	 <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="well">
              <h2>Porudzbina obavljena.</h2>
              <p>
                <br>Broj vase porudzbine je <?php echo $idpor; ?>. Bicete kontaktirani oko slanja proizvoda na
                Vasu adresu kada administrator obradi podatke.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
<?php
		$q2 = "UPDATE korpa SET filed=1 WHERE uid=$uid";
		mysqli_query($conn, $q2);



 } //kraj obrade 


?>




<?php include("footer.php"); ?>