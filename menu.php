 <script>
$(document).ready(function() {
	var pathname = window.location.pathname;
	$('.nav > li > a[href="'+pathname+'"]').parent().addClass('active');
})
</script>



<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <ul class="nav  nav-justified nav-pills">
              <li>
                <a href="/index.php">Početna</a>
              </li>
              <li>
                <a href="/vesti.php">Vesti</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Komponente<br><i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu" role="menu">
				<?php
				include("db.php");
				$q = "SELECT * FROM kategorije";
				$res = mysqli_query($conn, $q);
				while($row = mysqli_fetch_assoc($res)) {
					echo '<li>';
                    echo '<a href="/proizvodi.php?page=1&kat=' . $row['catid'] . '">' . $row['catname'] . '</a>';
                  echo '</li>';
				}
				?>
				<li>
                    <a href="#">- - -</a>
                  </li>
                  <li>
                    <a href="/proizvodi.php">Sve kategorije</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="/kontakt.php">Kontakt</a>
              </li>
              <li>

<?php                
if ($_SESSION['loggedin'] == 0) echo '<a href="/logreg.php">Registracija/Login<br></a>';
if ($_SESSION['loggedin'] == 1) echo '<a href="/user.php">Profil [' . $_SESSION['ime'] . ']<br></a>';
?>
             
 </li>
              <li>
			  <?php 
			  if ($_SESSION['loggedin'] == 1) {
				  $uid = $_SESSION['uid'];
				  $q = "SELECT * FROM korpa WHERE uid=$uid AND filed=0";
				  $res = mysqli_query($conn, $q);
				  $rows = mysqli_num_rows($res);
				  echo ' <a href="/korpa.php">Korpa [' . $rows . ']</a>'; 
			  }
			  if ($_SESSION['loggedin'] != 1) echo ' <a href="/korpa.php">Korpa</a>'; 
			  ?>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li>
                <a href="index.php">Početna</a>
              </li>
            </ul>
          </div>
		  


