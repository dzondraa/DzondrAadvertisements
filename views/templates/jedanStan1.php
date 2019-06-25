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