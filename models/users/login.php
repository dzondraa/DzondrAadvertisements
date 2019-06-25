<?php
    header('Content-Type: application/json');
    @session_start();
    include "../../config/connection.php";
    $data = null;
    $code = 404;
    if(isset($_POST['username']) && isset($_POST['password'])){
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
            $code = 200;
        
        
           $pass = md5($pass);
           $upit = "SELECT * from users where username=? and password=?";
           try{
           $upit = $conn->prepare($upit);
           $rez = $upit->execute([$user,$pass]);
           if($rez){
               $rez = $upit->fetchAll();
               if($rez){
               $data = $rez[0]->username;
               $_SESSION['user'] = $rez[0]->username;
               $_SESSION['userId'] = $rez[0]->ID;
               $_SESSION['uloga'] = $rez[0]->uloga;
               $code = 200;
               #header("Location:../../index.php");
               }
               else{
                $code = 403;
                array_push($mistakes , "Username not found!");
               }
           }
           }
           catch(PDOException $ex){
            $code = 503;
            array_push($mistakes , $ex->getMEssage());
           }
        }
        echo json_encode(["data" => $data, "errors" => $mistakes]);
        http_response_code($code);     
    }
    
?>