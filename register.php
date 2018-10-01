<?php
include("header.php");
include("menu.php");
?>

<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal" action="register2.php" method="post">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">Vas e-mail</label>
                </div>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail3" name="mail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">Sifra</label>
                </div>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword3" name="pass" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Ime</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="ime" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Prezime</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="prezime" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Kontakt telefon</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="tel" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Grad</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="grad" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Adresa</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="adresa" class="form-control">
                </div>
              </div>
               <div>

    <br>
<div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label">Kod sa slike</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" name="captcha" class="form-control">
                </div>
              </div>

           <img src="captcha.php" /><br>


</div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Registruj me</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php
include("footer.php");


?>