<?php
include("header.php");
include("menu.php");
include("db.php");
$page = 1;
$page = $_GET['page'];
$start_from = ($page - 1) * 10;


$sql = "SELECT * FROM users ORDER BY id DESC LIMIT $start_from, 20";
$result = mysqli_query($conn, $sql);

?>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Broj korisnika</th>
                  <th>Ime i prezime</th>
                  <th>E-mail</th>
                  <th>Upravljaj podacima</th>
                </tr>
              </thead>
                <tbody>

<?php


if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

echo ' <tr>';
echo '                  <td>' . $row['id'] .'</td>';
echo '                  <td>' . $row['ime'] . ' ' . $row['prezime'] . '</td>';
echo '                  <td>' . $row['mail'] . '</td>';
echo '                  <td><a href="edituser.php?id='. $row['id'] .'">Pogledaj nalog</a> </td>';
echo '                </tr>';

}
}

?>
 </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <div class="section">
      <div class="container">
        <div class="row">
<div class="col-md-12">
            <ul class="pager">
              <li>
			  			<p class="text-center">Stranica <?php echo $page; ?> </p>
                <a href="users.php?page=<?php echo ($page-1); ?>"> <-</a>
              </li>
              <li>
                <a href="users.php?page=<?php echo ($page+1); ?>"> -> </a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>






<?php
include("footer.php");
?>