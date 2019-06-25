<?php
    if($_SESSION['uloga'] == "korisnik"):
?>
<div class="container">
    <h1 class="text-center">Ostalo je jos samo da uploadujete slike stana</h1>
    <div class="row">
        <div class="col-lg-8 d-flex flex-wrap">
            <h2 class="col-lg-12">Uploaded images</h2>   
            <?php
            $upit = "SELECT * from slikestanova where stanId = ?";
            $upit = $conn -> prepare($upit);
            $upit->execute([$_GET['id']]);
            $rezultat = $upit->fetchAll();
            foreach($rezultat as $r):
            ?>
                <div class="card moja" data-id="<?= $r->ID ?>" style="width: 18rem;">
                <img class="card-img-top" src="<?= $r->malaSlika ?>" alt="Card image cap">
                <div class="card-body">
                <a href="#" data-Id="<? $r->ID ?>" class="btn btn-danger">Izbrisi</a>
  </div>
</div>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-4 boja">
            <h2>Upload photo</h2>
            <form action="models/stanovi/uploadPic.php?id=<?= $_GET['id'] ?>" method="post"
            enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleFormControlFile1">Formati: jpg , png , gif , jpeg</label>
             <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
             <input type="submit" name="sub" class="form-control btn-primary" value="UPLOAD">
            </div>
            </form>
        </div>
        <button class="form-control btn-primary zavrsi">ZAVRSI</button>
    </div>
</div>
<?php endif;
    if($_SESSION['uloga'] != "korisnik"){
    echo "Morate biti ulogovani!";
    }
    ?>   