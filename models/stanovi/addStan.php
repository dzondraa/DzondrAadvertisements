<?php
session_start();
include "../../config/connection.php";
    if(isset($_POST['upload'])){
        $naslov = $_POST['naslov'];
        $cena = $_POST['cena'];
        $opis = $_POST['opis'];
        $transakcija = $_POST['transakcija'];
        $kvadratura = $_POST['kvadratura'];
        $kategorija = $_POST['kategorija'];
        $grad = $_POST['grad'];
        $ulica = $_POST['ulica'];
        $cek = true;
        global $lastId;
        global $lastLokacija;
        global $r;
        global $re;
        #OVAJ CEKER STOJI OVDE DA SIMULIRA VALIDACIJU
        if($cek){
            $upit = "INSERT into stanovi values(null,?,?,?,?,?,?,?,?)";
            $upit1 = "INSERT into lokacije values(null,?,?)";
            try{
            
            $upit1 = $conn->prepare($upit1);
            $re = $upit1->execute([$grad,$ulica]);
            $lastLokacija = $conn->lastInsertId();
            if($re){
            $upit = $conn->prepare($upit);
            $r = $upit->execute([$naslov,$opis,$transakcija,$cena,$kvadratura,$kategorija,$lastLokacija,$_SESSION['userId']]);
            $lastId = $conn->lastInsertId();   
                
            }
        }
            catch(PDOException $ex){
                echo $ex->getMessage();
            }
            
            if($r){
                
                header("Location:../../index.php?page=korisnikNastavakAdd&id=".$lastId);
            }
            else{
                header("Location:../../index.php?page=korisnikAdd");
            }
        }
        
    }    

?>