<?php
    if($_SESSION['uloga'] == "korisnik"):
?>
<div class="container">
<div class="row d-flex">
<h1 class="col-lg-12">Dodavanje oglasa</h1>
<div class="col-lg-6">
            <form action="models/stanovi/addStan.php" method="post" onsubmit="return validInsert()">
            <div class="form-row">
            <div class="form-group col-lg-6">
                 <label for="formGroupExampleInput">Naslov</label>
                 <input type="text" id="naslov" name="naslov" class="form-control" id="formGroupExampleInput" placeholder="Example input">
             </div>
             <div class="form-group col-lg-6">
                 <label for="formGroupExampleInput2">Cena u evrima</label>
                 <input type="number" id="cena" name="cena" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
             </div>
             </div>
             <div class="form-group">
                 <label for="formGroupExampleInput2">Opis</label>
                 <textarea name="opis" id="opis" cols="100" rows="10" class="form-control"></textarea>
             </div>
             <div class="form-row">
             <div class="form-group col-lg-6">
                 <label for="formGroupExampleInput2">Transakcija</label>
                 <select id="transakcija" name="transakcija"  class="form-control">
                    <option value="0">Izaberi...</option>
                    <option value="Izdavanje">Izdavanje</option>
                    <option value="Prodaja">Prodaja</option>
                 </select>
             </div>
             <div class="form-group col-lg-6">
                 <label for="inputAddress2">Kvadratura</label>
                 <input type="number" name="kvadratura" class="form-control" id="kvadratura">
             </div>
             </div>
             <div class="form-group">
                 <label for="inputAddress2">Kategorija</label>
                 <select id="kategorija" name="kategorija" class="form-control" id="kategorija">
                    <option value="0">Izaberi...</option>
                </select>
             </div>
             <div class="form-row">
             <div class="form-group col-lg-6">
                 <label for="formGroupExampleInput2">Grad</label>
                 <input class="form-control" type="text" id="grad" name="grad">
            <div id="lista">
                
            </div>
             </div>
             <div class="form-group col-lg-6">
                 <label for="inputAddress2">Ulica</label>
                 <input id="ulica" type="text" name="ulica" class="form-control" id="kvadratura">
             </div>
             </div>
             
             <input type="submit" name="upload" class="form-control btn-primary" value="UPLOAD">

            </form>
            
            
            </div>
            </div>
   
   <?php endif;
    if($_SESSION['uloga'] != "korisnik"){
    echo "Morate biti ulogovani!";
    }
    ?>   