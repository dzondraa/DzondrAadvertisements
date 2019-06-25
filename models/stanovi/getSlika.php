<?php
    if(isset($_POST['id'])){
        header("Data-Type:application/json");
        @session_start();
        $code = 404;
        $oglasi;
        global $oglasi;
        include "../../config/connection.php";
        $upit = "SELECT * FROM slikeStanova where stanId = ? limit 1";
        try{
        $upit = $conn -> prepare($upit);
        $r = $upit->execute([$_POST['id']]);
        if($r){
            $code = 200;       
            if($re){
                $upitOglasi = "SELECT * from users u inner join stanovi s on u.ID = s.usersId where s.usersId = ?";
                $upitOglasi = $conn->prepare($upitOglasi);
                $upitOglasi->execute([$_SESSION['userId']]);
                $oglasi = $upitOglasi->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                $code = 400;
            }
            #var_dump($oglasi);
        }
    }
            }
            catch(PDOException $ex){
                $mess = $ex->getMessage();
                echo json_encode($mess);
            }
           

        
       
        http_response_code($code);
        echo json_encode($oglasi);
    }
?>