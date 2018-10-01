</div></div></div>
  <?php
if ($_SESSION['loggedin'] == "1") { echo '<a class="btn btn-block btn-primary" href="logout.php">Odjavi me</a>';
 }
?>

    <footer class="section section-primary">

<div class="container">
        <div class="row">

          <div class="col-sm-6">
            <h1>Web PC SHOP</h1>
            <p>Prezentacija stranice za prodaju PC Komponenata.
              <br>Napravio Nikola Stojisavljević.
              <br>Kontakt +381 64 328 6657</p>
          </div>
          <div class="col-sm-6">
            <p class="text-info text-right">
              <br>
              <br>
            </p>
            
            </div>
            <div class="row">
              <div class="col-md-12 hidden-xs text-right">
                <a href="http://instagram.com/dzonibgbg"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                <a href="http://twitter.com"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="http://facebook.com/dzonibg"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
              </div>
            </div>
          </div>
        </div>

<?php mysqli_close($conn); ?> 

    </footer>
</html>