<?php
include("header.php");
include("menu.php");

?>


<div class="section">
      <div class="container">
        <div class="row">
 <div class="col-md-4">
            <div class="well">
              <h2>Postojeci korisnik</h2>
              <p>Ukoliko vec posedujete nalog, ovde se mozete ulogovati.</p>
            </div>
            <form class="form-horizontal" role="form" action="login.php" method="post">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">E-mail</label>
                </div>
                <div class="col-sm-10">
                  <input type="email" name="mail" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">Sifra</label>
                </div>
                <div class="col-sm-10">
                  <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Sifra">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Kod sa slike</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="captcha" class="form-control">
                </div>
<br><br><img src="captcha.php" /><br>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Uloguj se</button>
                </div>
              </div>
            </form>
          </div          </div><div class="col-md-8"><div class="well"><h2>Nemate nalog?</h2><p>Za manje od dva minuta, mozete se registrovati na nas sajt. Sve sto vam je potrebno za to je vazeca e-mail adresa, kako biste mogli da aktivirate Vas nalog.</p></div><center><a href="register.php" class="btn btn-primary">Napravi novi nalog</a></center></div>
        </div>
      </div>
    </div>


<?php
include("footer.php");