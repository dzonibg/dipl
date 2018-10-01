<?php
include("header.php");
include("menu.php");
include("db.php");
$uid = $_GET['id'];



if (isset($_GET['id']) && (!isset($_GET['edit']))) { //pregled korisnika
$uquery = "SELECT * FROM users WHERE id=$uid";
$ures = mysqli_query($conn, $uquery);
$k = mysqli_fetch_array($ures);


?>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="well">
              <h2>Pregled korisnika</h2>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Podatak</th>
                    <th>Vrednost</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ID korisnika</td>
                    <td><?php echo $k['id']; ?></td>
                  </tr>
                  <tr>
                    <td>E-mail</td>
                    <td><?php echo $k['mail']; ?></td>
                  </tr>
                  <tr>
                    <td>Ime</td>
                    <td><?php echo $k['ime']; ?></td>
                  </tr>
                  <tr>
                    <td>Prezime</td>
                    <td><?php echo $k['prezime']; ?></td>
                  </tr>
                  <tr>
                    <td>Adresa</td>
                    <td><?php echo $k['adresa']; ?></td>
                  </tr>
                  <tr>
                    <td>Grad</td>
                    <td><?php echo $k['grad']; ?></td>
                  </tr>
                  <tr>
                    <td>Telefon</td>
                    <td><?php echo $k['tel']; ?></td>
                  </tr>
                  <tr>
                    <td>Aktiviran nalog</td>
                    <td><?php if ($k['active'] == 1) { echo "Da"; } else echo "Ne"; ?></td>
                  </tr>
                </tbody>
              </table>
              <a class="btn btn-primary" data-toggle="modal" data-target="#editModal">Izmena korisnika</a>
              <a class="btn btn-danger" data-toggle="modal" data-target="#delModal">Brisanje naloga</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Izmena podataka o korisniku</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="POST" action="edituser.php?edit=yes&id=<?php echo $uid; ?>">
              <div class="form-group">
                <label class="control-label">E-mail adresa</label>
                <input class="form-control" id="mail" name="mail" value="<?php echo $k['mail']; ?>" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Ime</label>
                <input class="form-control" name="ime" value="<?php echo $k['ime']; ?>" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Prezime</label>
                <input class="form-control" name="prezime" value="<?php echo $k['prezime']; ?>" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Adresa</label>
                <input class="form-control" name="adresa" value="<?php echo $k['adresa']; ?>" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Grad</label>
                <input class="form-control" name="grad" value="<?php echo $k['grad']; ?>" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Telefon</label>
                <input class="form-control" name="tel" value="<?php echo $k['tel']; ?>" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Aktiviran nalog</label>
                <input class="form-control" name="akt" type="text" value=<?php if ($k['active'] == 1) echo 'Da'; else echo 'Ne';?> >
              </div>

              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">Zatvori</a>
            <a class="btn btn-primary">Sacuvaj</a>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="delModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Brisanje naloga</h4>
          </div>
          <div class="modal-body">
            <p>Da li sigurno zelite da obrisete korisnicki nalog?</p>
          </div>
          <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">Ne</a>
            <a class="btn btn-danger">Obrisi nalog</a>
          </div>
        </div>
      </div>
    </div>

<?php } //kraj pregleda korisnika

if (isset($_GET['edit']) && isset($_GET['id'])) { //izmena korisnika
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$tel = $_POST['tel'];
	$adresa = $_POST['adresa'];
	$grad = $_POST['grad'];
	$mail = $_POST['mail'];
if ($_POST['akt'] == "Da") { $akt = 1; } else { $akt = 0; }
	$editq = "UPDATE users SET ime='$ime', prezime='$prezime', tel = '$tel', adresa='$adresa', grad='$grad', mail='$mail', active='$akt' WHERE id='$uid'";
	mysqli_query($conn, $editq);
	
 echo' <div class="well">';
 echo'             <h2>Podaci o korisniku izmenjeni.';
 echo'               <br>';
 echo'             </h2>';
 echo'             <p>Bicete vraceni na prethodnu stranicu.</p>';
 echo'           </div>	';
 ?>
	<script>
 	setTimeout(function () {
   window.location.href = "/admin/edituser.php?id=<?php echo $uid;?>";
}, 3200); 
   </script>
   <?php
 
 
}

 ?>



<?php include("footer.php"); ?>