<?php
    header("Data-Type:application/json");
    $idSlika = $_POST['id'];
    $code= 404;
    $upit = "UPDATE stanovi set glavnaSlika = ? where stanId = ?";
    $upit = $conn->prepare($upit);
    $r = $upit->execute([$id , $_GET['id']]);
    if($r){
        $code = 204;
    }
    http_response_code($code);
?>