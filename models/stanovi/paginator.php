<?php
    @session_start();
    header("Content-Type:application/json");
    require_once "../../config/connection.php";
    require_once "functions.php";
    require_once "functions.php";
    $kategorija = $_POST['kategorija'];
    $transakcija = $_POST['transakcija'];
    $lokacija = $_POST['lokacija'];
    $cenaOd = $_POST['cenaOd'];
    $cenaDo = $_POST['cenaDo'];
    if(isset($_POST['limit'])){
        filterStanova($kategorija , $transakcija , $lokacija,$cenaDo , $cenaOd);
        $limit = $_POST['limit'];
        $limit = (int)$limit;
        $limit = $limit - 1;
        $par = $limit * 4;
        $stanovi = getSviStanoviLimit($par,4);
        echo json_encode($stanovi);
    }
    else{
        
        $stanovi = getSviStanoviLimit(0,4);
        echo json_encode($stanovi);
    }
?>