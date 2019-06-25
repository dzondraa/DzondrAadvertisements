<?php
    function prikazi_strukturu($roditelj,$nivo){
        global $conn;
        $upit="SELECT * FROM menu WHERE parent=?";
        $upit1 = $conn->prepare($upit);
        $rezultat = $upit1->execute([$roditelj]);
        $rezultat = $upit1 -> fetchAll();
        foreach($rezultat as $red){
        echo "<a class='text-secondary' href='".$red->href."'>".$red->text."</a><br>";
        prikazi_strukturu( $red->ID, $nivo+1);
        }
        if (count($rezultat) > 0){
         
        echo "</div>";
     }
    } 
    function prebrojiOglase($stanovi , $brojPrikazaPoStrani){
        echo '<nav aria-label="..." id="pagin">
        <ul class="pagination">';
        global $conn;
        $brojStanova = count($stanovi);
        $brojStanova = ceil($brojStanova/$brojPrikazaPoStrani);
        $br = 1;
        for($i = 0; $i<$brojStanova; $i++){
            echo "<li class='page-item' ><p data-limit='$br' class='page-link pag'>$br</p></li>";
            $br++;
        }
        echo '</ul>
        </nav>';
       # echo "<script src='assets/js/paginator.js'></script>";
    }
?>