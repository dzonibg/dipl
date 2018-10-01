<?php
include("header.php");
include("menu.php");
include("db.php");
?>

    <div class="section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <a data-toggle="modal" data-target="#dodajModal" class="btn btn-block btn-danger">Dodaj novu vest</a>
          </div>
        </div>
		<br><br>

<?php
//dodavanje
	if ($_GET['add'] == "yes") {
		
		$naslov = $_POST['naslov'];
		$text = $_POST['tekst'];
		$datum = $_POST['datum'];
		$qdodaj = "INSERT INTO vesti(date, title, text) VALUES('$datum', '$naslov', '$text');";
		mysqli_query($conn, $qdodaj);
		echo '<div class="panel panel-danger text-center"><div class="panel-heading"><h3 class="panel-title">Obavestenje</h3></div><div class="panel-body"><p>Vest sa naslovom ' . $text . ' je dodata.</p><a href="vesti.php" class="btn btn-danger">Zatvori<br></a></div></div>';
		
	}

//brisanje
	if ($_GET['del'] == "yes" && $_GET['id'] != '0') {
		$vid = $_GET['id'];
		$query = "DELETE from vesti where id='$vid'";
		mysqli_query($conn, $query);
		echo '<div class="panel panel-danger text-center"><div class="panel-heading"><h3 class="panel-title">Obavestenje</h3></div><div class="panel-body"><p>Vest je obrisana.</p><a href="vesti.php" class="btn btn-danger">Zatvori<br></a></div></div>';
	}

//lista vesti
$qvesti = "SELECT * FROM vesti ORDER BY id DESC";
$vesti = mysqli_query($conn, $qvesti);
    while($row = mysqli_fetch_assoc($vesti)) {
         
     echo'                   <div class="panel panel-primary">';
     echo'                       <div class="panel-heading">';
     echo'                           <h3 class="panel-title">' . $row['title'] . ' - ' . $row['date'] . '</h3>';
     echo'                       </div>';
     echo'                       <div class="panel-body">';
     echo'                           <p>' . $row['text'] . '</p>';
     echo'                       </div>';
     echo'                       <div class="panel-footer"> <a href="vestiedit.php?edit=yes&id=' . $row['id'] . '" class="btn btn-primary">Izmena</a> <a href="vesti.php?del=yes&id=' . $row['id'] . '"class="btn btn-primary">Brisanje</a> </div>';
     echo'                   </div>';
    }
	
?>
      </div>
    </div>
<div class="modal fade" id="dodajModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Dodavanje nove vesti - <?php echo date("d/m/Y") . "<br>";?></h4>
          </div>
          <div class="modal-body">
            <form action="vesti.php?add=yes" method="POST" role="form">
              <div class="form-group">
                <label class="control-label">Naslov vesti</label>
                <input name="naslov" class="form-control" type="text">
              </div>
              <div class="form-group">
                <label class="control-label">Tekst vesti</label>
                <textarea id="tekst" name="tekst" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label class="control-label">Datum</label>
                <input name="datum" class="form-control" type="text" value="<?php echo date("d/m/Y"); ?>">
              </div>
              <button type="submit" class="btn btn-primary">Objavi</button>
            </form>
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" data-dismiss="modal">Zatvori</a>
          </div>
        </div>
      </div>
    </div>
	</div>

<?php include("footer.php"); ?>