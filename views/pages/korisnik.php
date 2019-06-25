<?php
    if($_SESSION['uloga'] == "korisnik"):
?>
<div class="container">
<h1>Moji oglasi</h1>
<div class="row d-flex flex-wrap" id="stans">
    <?php
     $id = $rez->ID;
     $upitOglasi = "SELECT *,s.ID as idStana from users u inner join stanovi s on u.ID = s.usersId where s.usersId = ?";
     try{
     $upitOglasi = $conn->prepare($upitOglasi);
     $upitOglasi->execute([$id]);
     $stanovi = $upitOglasi->fetchAll();
     #var_dump($oglasi);
     
     }
     catch(PDOException $ex){
         $mess = $ex-getMessage();
     }
     foreach($stanovi as $oglas){
         $idStana = $oglas->ID;
         $upit = "SELECT * FROM slikestanova where stanId=? LIMIT 0 ,1";
         $upit = $conn->prepare($upit);
         $upit->execute([$idStana]);
         $slika = $upit->fetchAll();
        include "views/templates/jedanStan.php";
     }
     
    ?>
   
</div>
<div class="moja position-absolute" id="add"  style="width: 18rem;">
    <a href="index.php?page=korisnikAdd">
    <img class="card-img-top as" src="assets/img/addNew.png" alt="Dodaj novi oglas">
    </a>
</div>
</div>
<?php endif;
    if($_SESSION['uloga'] != "korisnik"){
    echo "Morate biti ulogovani!";
    }
    
    
    ?>
    