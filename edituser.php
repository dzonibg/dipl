<?php
include("header.php");
include("menu.php");
include("db.php");


$currentmail = $_SESSION['mail'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$tel = $_POST['tel'];
$adresa = $_POST['adresa'];
$grad = $_POST['grad'];
$mail = $_POST['mail'];
$query = "UPDATE users SET ime='$ime', prezime='$prezime', tel = '$tel', adresa='$adresa', grad='$grad', mail='$mail' WHERE mail='$currentmail'";

if (mysqli_query($conn, $query)) {


  echo '  <div class="section">';
  echo '    <div class="container">';
  echo '      <div class="row">';
  echo '        <div class="col-md-12">';
  echo '          <div class="alert alert-dismissable alert-info">';
  echo '            <b>Uspesno promenjeni podaci. Mozete ih pogledati na svojoj <a href="user.php">profilnoj stranici.</a></b>';
  echo '          </div>';
  echo '        </div>';
  echo '      </div>';
  echo '    </div>';
  echo '  </div>';

$_SESSION['mail'] = $mail;
$_SESSION['ime'] = $ime;
$_SESSION['prezime'] = $prezime;
$_SESSION['tel'] = $tel;
$_SESSION['adresa'] = $adresa;
$_SESSION['grad'] = $grad;


} else {
    echo "Greska sa bazom: " . mysqli_error($conn);
}



?>

<?php
include("footer.php");
?>