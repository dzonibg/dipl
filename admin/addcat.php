<?php
include("header.php");
include("menu.php");
include("db.php"); ?>


<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h1 class="text-danger">Dodavanje nove kategorije proizvoda</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="section text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <form class="form-horizontal" role="form" action="addcat2.php" method="POST">
                <div class="form-group">
                  <div class="col-sm-2">
                    <label class="control-label">Naziv kategorije
                      <br>
                    </label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="catname" placeholder="Procesori, tastature...">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2">
                    <label class="control-label">Naziv karakteristike 1</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="spec1" placeholder="&quot;Tip&quot;, &quot;Brzina procesora&quot;...">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2">
                    <label class="control-label">Naziv karakteristike 2
                      <br>
                    </label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="spec2" placeholder="&quot;Broj jezgara&quot;, &quot;Snaga zvucnika&quot;...">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2">
                    <label class="control-label">Naziv karakteristike 3</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" name="spec3" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2">
                    <label class="control-label">Naziv karakteristike 4</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" name="spec4" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2">
                    <label class="control-label">Naziv karakteristike 5</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" name="spec5" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <div class="col-sm-2">
                    <label class="control-label">Naziv karakteristike 6</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" name="spec6" class="form-control">
                  </div></div>
				  
				  
                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-2 text-center">
                    <button type="submit" class="btn btn-primary">Dodaj kategoriju</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php include("footer.php"); ?>