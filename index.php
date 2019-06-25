<?php
    include "views/static/head.php";
    include "views/static/header.php";
    global $page;
    global $uloga;
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $upit = "SELECT * from users where username = ?";
        $upit = $conn->prepare($upit);
        try{
            $upit->execute([$user]);
            $rez = $upit->fetchAll()[0];
            #var_dump($rez);
            switch($rez->uloga){
                case "korisnik" : $page = "korisnik"; break;
                case "administrator" : $page = "administrator"; break;
            }
             $uloga = $rez->uloga;
        }catch(PDOException $ex){
        
        }
    }
    
    if(isset($_GET['page'])){
        switch($_GET['page']){
            case "gallery" : include "views/pages/gallery.php";
            break;
            case "registration" : include "views/pages/registration.php";
            break;
            case "korisnik" : include "views/pages/korisnik.php";
            break;
            case "korisnikAdd" : include "views/pages/korisnikAdd.php";
            break;
            case "korisnikNastavakAdd" : include "views/pages/korisnikNastavakAdd.php";
            break;
            case "izmenaStan" : include "views/pages/izmenaStan.php";
            break;
            case "pretraga" : include "views/pages/pretraga.php";
            break;
        }
    }
   
    else{
        include "views/pages/main.php";
    }


    include "views/static/footer.php";
    
?>