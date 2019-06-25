<div class="row" id="search">
        <div class="col-lg-5">
            <label for="transakcija" class="col-lg-12">Transakcija:</label>
            <select  id="transakcija" class="form-control">
                <option value="0">---Izaberi---</option>
                <option value="prodaja">Prodaja</option>
                <option value="izdavanje">Izdavanje</option>

            </select>
            <label for="kategorija" class="col-lg-12">Kategorija:</label>
            <select  id="kategorija" class="form-control">
            <option value="0">---Izaberi---</option>
                <?php
                    $query = "SELECT * FROM kategorije";
                    $kategorije = executeQuery($query);
                    foreach($kategorije as $kategorija):
                ?>
                <option value="<?=$kategorija->naziv?>"><?=$kategorija->naziv?></option>
                    <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-5">
        <div class="col-lg-12">
        <label for="grad" class="col-lg-12">Lokacija:</label>
            <input class="form-control" autocomplete="off" type="text" id="grad">
            <div id="lista">
                
            </div>
        </div>    
        <div class="col-lg-12"> 
            <label for="CenaOd" class="col-lg-12">Cena:</label>
            
        </div>    
        <div class="col-lg-12 d-flex flex-wrap justify-content-between">
            <input class="form-control col-lg-5" type="number" id="cenaDo" placeholder="Od">
            <input class="form-control col-lg-5" type="number" id="cenaOd" placeholder="Do">
        </div>

        </div>
        <div class="col-lg-2">
        <button id="trazi" class="btn btn-primary">Pretrazi <i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
       

</div>