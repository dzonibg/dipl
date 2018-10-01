<?php
include("header.php");
include("menu.php");
?>


<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Profil korisnika</h1>
            <div class="section">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <ul class="list-group">
                      <li class="list-group-item">Ime: <?php echo $_SESSION['ime']; ?></li>
                      <li class="list-group-item">Prezime: <?php echo $_SESSION['prezime']; ?> </li>
                      <li class="list-group-item">Broj telefona: <?php echo $_SESSION['tel']; ?> </li>
                      <li class="list-group-item">E-mail: <?php echo $_SESSION['mail']; ?> </li>
                      <li class="list-group-item">Adresa: <?php echo $_SESSION['adresa'] . ', ' . $_SESSION['grad']; ?> </li>
                    </ul>
                    <a class="btn btn-primary" id="modal-change-btn" data-toggle="modal" data-target="#modal-change">Promeni podatke</a>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#modal-pass">Promeni korisnicku sifru</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h1>Spisak porudzbina</h1>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID porudzbine</th>
                          <th>Datum</th>
                          <th>Obradjena</th>
						  <th>Pregled</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $uid = $_SESSION['uid'];
					  $q = "SELECT * FROM porudzbine WHERE id_kor='$uid'";
					  $res = mysqli_query($conn, $q);
					  while ($porudzbina = mysqli_fetch_array($res)) {
                      echo'  <tr>';
                      echo'    <td>' . $porudzbina['id_porudzbine'] . '</td>';
                      echo'    <td>' . $porudzbina['datum'] .'</td>';
					  echo'<td>';
                      if ($porudzbina['obradjena'] == 1) echo 'Da</td>'; else echo 'Ne</td>';
						echo '<td><a href="vieworder.php?id=' . $porudzbina['id_porudzbine'] . '">Pregledaj</a></td>';
                        echo '</tr>';
					  }
					  ?>
                      </tbody>
                    </table>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>


<div class="modal fade" id="modal-change">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Promena licnih podataka</h4>
            </div>
            <div class="modal-body">
              <form action="edituser.php" method="post" role="form">
                <div class="form-group">
                  <label class="control-label">Ime</label>
                  <input class="form-control" name="ime" value="<?php echo $_SESSION['ime']; ?>" type="text">
                </div>
                <div class="form-group">
                  <label class="control-label">Prezime</label>
                  <input class="form-control" name="prezime" value="<?php echo $_SESSION['prezime']; ?>" type="text">
                </div>
                <div class="form-group">
                  <label class="control-label">Broj telefona</label>
                  <input class="form-control" name="tel" value="<?php echo $_SESSION['tel']; ?>" type="text">
                </div>
                <div class="form-group">
                  <label class="control-label">E-mail</label>
                  <input class="form-control" name="mail" value="<?php echo $_SESSION['mail']; ?>" type="text">
                </div>
                <div class="form-group">
                  <label class="control-label">Grad</label>
                  <input class="form-control" name="grad" value="<?php echo $_SESSION['grad']; ?>" type="text">
                </div>
                <div class="form-group">
                  <label class="control-label">Adresa</label>
                  <input class="form-control" name="adresa" value="<?php echo $_SESSION['adresa']; ?>" type="text">
                </div>
                <button type="submit" class="btn btn-primary" align="left">Izmeni podatke</button>
              </form>
            </div>
            <div class="modal-footer"></div>
          </div>
        </div>
      </div>



<div class="modal fade" id="modal-pass">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Promena sifre</h4>
            </div>
            <div class="modal-body">
              <form action="changepass.php" method="post" role="form">
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Unesite staru sifru</label>
                  <input name="oldpass" class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
                </div>
                <div class="form-group">
                  <label class="control-label">Unesite novu sifru</label>
                  <input name="newpass1" class="form-control" type="password">
                </div>
                <div class="form-group">
                  <label class="control-label">Unesite ponovo novu sifru</label>
                  <input name="newpass2" class="form-control" type="password">
                </div>
                <button type="submit" class="btn btn-primary">Promeni sifru</button>
              </form>
            </div>
            <div class="modal-footer">
              <a class="btn btn-default" data-dismiss="modal">Zatvori prozor</a>
            </div>
          </div>
        </div>
      </div>

<?php
include("footer.php");
?>