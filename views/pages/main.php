<div class="container">
<div class="row">
        <div class="col-lg-12">
            <div class="jumbotron text-center" id="jumb">
            <h1 class="display-4">Vi izdajete stan?</h1>
            <p class="lead p">Registrujte se sto pre da bi postavili svoj oglas!</p>
            <p class="p">Ili se ulogujte ukoliko vec imate nalog!</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Registracija</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" id="abs" role="button">Logovanje</a>
            </p>
            </div>
        </div>

</div>
<?php
    include "search.php";
?>
<div class="row">
    <div class="col-lg-12 d-flex flex-wrap" id="sviStanovi">
        <?php
        require_once "config/connection.php"; 
        include "models/stanovi/functions.php";
        $stanovi = getSviStanovi();
        foreach($stanovi as $stan):
            $slika = getSlikaStana($stan->idStana);
        ?>
          <div class=" moja1 moja d-flex flex-wrap">
          <div class="zaIm">
            <img class="card-img-left imi" src="<?= $slika ?>" alt="Card image cap">
            </div>


            <div class="neSlika">

            <div class="card-body opis">
            <h5 class="card-title"><?php
            if(strlen($stan->naslov) > 25){
                echo substr($stan->naslov , 0 , 26)."...";   
               }
               else{
                   echo $stan->naslov;
               }
            ?></h5>
            <p class="card-text"><?php 
                if(strlen($stan->opis) > 20){
                    echo substr($stan->opis , 0 ,65)."...";   
                   }
                   else{
                       echo $stan->opis;
                   }
            ?></p>
            </div>


            <div class="cen d-flex flex-wrap justify-content-between">
            <h6 class="card-text col-lg-12 cenis"><i class="fa fa-map-marker" aria-hidden="true">  </i> <?= $stan->grad ?></h6>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <h4 class="card-title"><?= $stan->cena ?>&euro;</h5>

            </div>   
            </div>
        </div>
        
        
            <?php
        endforeach;
        ?>
    </div>
    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>
</div>
<div class="row">
<div class="col-lg-12"><?php
    prebrojiOglase($stanovi , 3);
    ?></div>
</div>
</div>
<a href="models/stanovi/export.php">EXPORT EXCEL</a>