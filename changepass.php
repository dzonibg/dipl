<?php
include("header.php");
include("menu.php");
include("db.php");

$sessionmail = $_SESSION['mail'];
$getpass = "SELECT * FROM users WHERE mail='$sessionmail'";
$result = mysqli_query($conn, $getpass);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $basepass = $row['pass'];
    }
} else {
    echo "Fatalna greska.";
}

$oldpass = $_POST['oldpass'];
$newpass = $_POST['newpass1'];
$md5p = md5($oldpass);

if ($basepass == $_SESSION['pass'] && $basepass == $md5p) {
$newbasepass = md5($newpass);
$query = "UPDATE users SET pass='$newbasepass' WHERE mail='$sessionmail'";
if (mysqli_query($conn, $query)) {


echo '<div class="section">';
echo '      <div class="container">';
echo '        <div class="row">';
echo '          <div class="col-md-12">';
echo '            <div class="alert alert-dismissable alert-info">';
echo '              <b>Sifra uspesno promenjena! Iz sigurnosnih razloga, morate ponovo da se';
echo '                <a href="logreg.php>ulogujete.</b></a>';
echo '            </div>';
echo '          </div>';
echo '        </div>';
echo '      </div>';
echo '    </div>';


}

} else {

//sifra nije ok

}
?>




<?php
include("footer.php");
?>