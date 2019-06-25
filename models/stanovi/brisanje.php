<?php
    if(isset($_POST['id'])){
        header("Data-Type:application/json");
        @session_start();
        $code = 404;
        $oglasi;
        global $oglasi;
        include "../../config/connection.php";
        $upit = "DELETE FROM slikeStanova where stanId = ?";
        $upit = $conn -> prepare($upit);
        $r = $upit->execute([$_POST['id']]);
        if($r){
            $code = 200;
            $upitOglasi = "DELETE FROM stanovi where ID=?";
            try{
            $upitOglasi = $conn->prepare($upitOglasi);
            $re = $upitOglasi->execute([$_POST['id']]);
            
            if($re){
                $upitOglasi = "SELECT * from users u inner join stanovi s on u.ID = s.usersId where s.usersId = ?";
                $upitOglasi = $conn->prepare($upitOglasi);
                $upitOglasi->execute([$_SESSION['userId']]);
                $oglasi = $upitOglasi->fetchAll();
                foreach($oglasi as $oglas){
                    $upit = "SELECT * FROM slikestanova where stanId = ? limit 1";
                    $upit = $conn->prepare($upit);
                    $slika = $upit->execute([$oglas->ID]);
                    if($slika){
                        $slika = $upit->fetchAll();
                        $oglas->pocetnaSlika = $slika;
                    }
                }
            }
            #var_dump($oglasi);
            }
            catch(PDOException $ex){
                $mess = $ex->getMessage();
                echo json_encode($mess);
            }
           

        }
        else{
            $code = 400;
        }
        http_response_code($code);
        echo json_encode($oglasi);
    }
?>