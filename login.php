<?php
include("header.php");
include("menu.php");
include("db.php");
$success = 0;

if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["ccode"]==$_POST["captcha"]) //captcha provera
{//captcha

//captcha ok
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$pass = md5($pass);


$check = "SELECT * FROM users WHERE mail='$mail'";
$res = mysqli_query($conn, $check);

          while($row = mysqli_fetch_assoc($res)) {
          $basepass = $row['pass'];
          if ($basepass == $pass) {

// kad je dobar pass
if ($row['active'] != 0) {

$_SESSION['loggedin'] = 1;
$_SESSION['uid'] = $row['id'];
$_SESSION['mail'] = $row['mail'];
$_SESSION['ime'] = $row['ime'];
$_SESSION['prezime'] = $row['prezime'];
$_SESSION['tel'] = $row['tel'];
$_SESSION['adresa'] = $row['adresa'];
$_SESSION['grad'] = $row['grad'];
$_SESSION['pass'] = $row['pass'];
?>
	</div>
    <div class="section">
      <div class="container">
        <div class="row">
            <div class="well text-center">
              <h2>Dobrodosli!</h2>
              <p>
                <br>Uspesno ste se ulogovali, <?php echo $_SESSION['ime']; ?>. Bicete prebaceni na pocetnu stranicu.</p>
            </div>
			</div>
        </div>
      </div>
    </div>
	<script>
	setTimeout(function () {
   window.location.href = "index.php";
}, 3200); 
   </script>

<?php
} else echo "<center> Molimo vas da proverite vas e-mail kako biste aktivirali nalog.</center><br><br>";


} else {

//kad nije dobar pass
echo "pass nije dobar.";

}


             
  




     }




} 



else { //captcha

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

} //captcha


include("footer.php");
?>