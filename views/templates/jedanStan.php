<div class="card moja" data-id="<?=$oglas->ID ?>" style="width: 18rem;">
  <img class="card-img-top" src="<?= $slika[0]->malaSlika ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php
    if(strlen($oglas->naslov) > 15){
     echo substr($oglas->naslov , 0 , 17)."...";   
    }
    else{
        echo $oglas->naslov;
    }
    ?></h5>
    <p class="cena"> <?= $oglas->cena ?>&euro; </p>
    <a href="#" data-id="<?= $oglas->ID ?>" class="btn btn-primary">Izmeni</a>
    <a href="#" data-id="<?= $oglas->ID ?>" class="btn btn-danger brisanje">Izbrisi</a>
  </div>
</div>