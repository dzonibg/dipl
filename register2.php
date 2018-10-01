<?php
error_reporting(E_ALL);
include("header.php");
include("menu.php");
include("db.php");

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$tel = $_POST['tel'];
$adresa = $_POST['adresa'];
$grad = $_POST['grad'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$pass = md5($pass);
$rand = rand(100, 9999);
$code = md5($rand);


if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["ccode"]==$_POST["captcha"]) //captcha provera
{

$check = "SELECT * FROM users WHERE mail = '$mail'";
$res = mysqli_query($conn, $check);
if (mysqli_num_rows($res) > 0) {


//vec postoji


echo '<div class="section">';
echo '      <div class="container">';
echo '        <div class="row">';
echo '          <div class="col-md-12">';
echo '            <p>Registracija nije uspela.';
echo '              <br>';
echo '              <br>';
echo '              <br>&nbsp;Prema nasoj bazi podataka, izgleda da je vas mail vec registrovan na sajtu. Da li ste <a href="forgotpass.php">zaboravili vasu sifru?</a>';
echo '          </div>';
echo '        </div>';
echo '      </div>';
echo '    </div>';



} else {

//ne postoji
$newuser = "INSERT INTO users(ime, prezime, tel, adresa,
 grad, mail, pass, code, active) 
 VALUES ('$ime', '$prezime', '$tel', '$adresa', '$grad', '$mail', '$pass', '$code', '0')";
if (mysqli_query($conn, $newuser)) { 
//registracija uspesna
echo '<div class="section">';
echo '      <div class="container">';
echo '        <div class="row">';
echo '          <div class="col-md-12">';
echo '            <p>Registracija uspesna!';
echo '              <br>';
echo '              <br>';
echo '              <br>&nbsp;Molimo proverite vas e-mail kako biste aktivirali nalog i potvrdili';
echo '              ga pre koriscenja web sajta. Hvala.</p>';
echo '          </div>';
echo '        </div>';
echo '      </div>';
echo '    </div>';


$rand = rand(100, 999999);
$code = md5($rand);
$to      = $mail;
$subject = 'Aktivacija naloga';

$message = "Postovani,\r\nRegistrovali ste se na aplikaciju za kupovinu preko interneta.
 Kako biste aktivirali svoj nalog,
\r\nposetite ovu adresu:<a href=dipl.nidza.eu.org/activate.php?code=' . $code;

$headers = 'From: aktivacija@nidza.eu.org' . "\r\n" .
    'Reply-To: aktivacija@nidza.eu.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);






} else echo "Greska sa bazom podataka.";


}


}
else {

//captcha nije ok


echo '<div class="section">';
echo '      <div class="container">';
echo '        <div class="row">';
echo '          <div class="col-md-12">';
echo '            <div class="alert alert-danger alert-dismissable">';
echo '              <b>Uneli ste pogresan kod sa slike! Molimo pokusajte opet.</b>';
echo '            </div>';
echo '          </div>';
echo '        </div>';
echo '      </div>';
echo '    </div>';


}

?>


<?php
include("footer.php");
?>