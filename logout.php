<?php
include("header.php");
include("menu.php");
$_SESSION['loggedin'] = 0;
session_destroy();
?>

<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-dismissable alert-info">
              <b>Uspesno ste se izlogovali. Vratite se na <a href="index.php">pocetnu stranicu</a> ili se <a href="logreg.php">ponovo
                ulogujte.</b> </a>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
include("footer.php");
?>