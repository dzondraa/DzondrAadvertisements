<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
        header('Content-Type: application/json');
        @session_start();
        include "../../config/connection.php";
        $data = null;
        $code = 404;
        
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $mistakes = array();
        $userReg = "/^[\w][\w\d]{2,14}$/";
        $passReg = "/^[A-z0-9]{5,25}$/";
        if(!preg_match($userReg,$user)){
            array_push($mistakes , "Wrong username!");
        }
        if(!preg_match($passReg,$pass)){
            array_push($mistakes , "Wrong password!");
        }
        if(count($mistakes) == 0){
            #echo json_encode(["asd" => 2]);
           $pass = md5($pass);
           $upit = "SELECT * from users where username=? and password=?";
           try{
            $upit = $conn->prepare($upit);
            $rez = $upit->execute([$user,$pass]);            
            if($rez){
                $rez = $upit->fetchAll();
               
               echo json_encode(["asd" => 2]);
            }
           
           
            #
               
           
           }
           catch(PDOException $ex){

           }
        }
        else{

        }
    }
?>