<?php
include("header.php");
include("menu.php");
include("db.php");

$query = "SELECT * FROM kategorije";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {


echo '<div class="section">';
echo '      <div class="container">';
echo '        <div class="row">';
echo '          <div class="col-md-12">';
echo '            <table class="table">';
echo '              <thead>';
echo '                <tr>';
echo '                  <th>ID</th>';
echo '                  <th>Kategorija</th>';
echo '                  <th>Specifikacija 1</th>';
echo '                  <th>Specifikacija 2</th>';
echo '                  <th>Specifikacija 3</th>';
echo '                  <th>Specifikacija 4</th>';
echo '                  <th>Specifikacija 5</th>';
echo '                  <th>Specifikacija 6</th>';
echo '                  <th>Upravljaj kategorijom</th>';
echo '                </tr>';
echo '              </thead>';
echo '<tbody>';



    while($row = mysqli_fetch_assoc($result)) {

echo '                        <tr>';
echo '                  <td>' . $row['catid'] . '</td>';
echo '                  <td>' . $row['catname'] . '</td>';
echo '                  <td>' . $row['spec1name'] . '</td>';
echo '                  <td>' . $row['spec2name'] . '</td>';
echo '                  <td>' . $row['spec3name'] . '</td>';
echo '                  <td>' . $row['spec4name'] . '</td>';
echo '                  <td>' . $row['spec5name'] . '</td>';
echo '                  <td>' . $row['spec6name'] . '</td>';
echo '                  <td><a href="changecat.php?catid=' . $row['catid'] . '" class="btn btn-primary">Izmeni</a>';
echo '                </tr>';

    }

echo '</tbody>';
echo '            </table>';
echo '          </div>';
echo '        </div>';
echo '      </div>';

} else {
    echo "<br><center>Nema postojecih kategorija.</center><br>";
}

?>

        <div class="row text-center">
          <div class="col-md-12"> 
            <a href="addcat.php" class="btn btn-primary">Dodaj kategoriju</a>
            <br><br>
          </div>
        </div>

		
		
		
		



<?php include("footer.php"); ?>