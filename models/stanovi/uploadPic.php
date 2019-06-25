<?php
include "../../config/connection.php";
function insert($putanjaNovaSlika, $putanjaOriginalnaSlika){
    global $conn;
    $insert = $conn->prepare("INSERT INTO slikestanova VALUES(null, ?, ?,?)");
    $isInserted = $insert->execute([$putanjaOriginalnaSlika, $putanjaNovaSlika ,$_GET['id']]);
    return $isInserted;
}
    if(isset($_POST['sub'])){
        $file = $_FILES['file'];
        $name = $file['name'];
        $type = $file['type'];
        $size = $file['size'];
        $tmpName = $file['tmp_name'];
        list($sirina, $visina) = getimagesize($tmpName);
        $novaSirina = 400;
        $novaVisina = 400;
        if( $type == "image/jpeg" ) { $postojecaSlika = imagecreatefromjpeg($tmpName); }
        elseif( $type == "image/gif" ) { $postojecaSlika = imagecreatefromgif($tmpName); }
        elseif( $type == "image/png" ) { $postojecaSlika = imagecreatefrompng($tmpName); }
        elseif( $type == "image/jpg" ) { $postojecaSlika = imagecreatefromjpg($tmpName); }
        $prazna_image = imagecreatetruecolor($novaSirina, $novaVisina);
        imagecopyresampled($prazna_image, $postojecaSlika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);
        $novaSlika = $prazna_image;
        $naziv = time().$name;
        $putanjaNovaSlika = 'assets/images/stanovi/nova_'.$naziv;

        switch($type){
            case 'image/jpeg':
                imagejpeg($novaSlika, '../../'.$putanjaNovaSlika, 75);
                break;
            case 'image/png':
                imagepng($novaSlika, '../../'.$putanjaNovaSlika);
                break;
            case 'image/jpg':
                imagejpg($novaSlika, '../../'.$putanjaNovaSlika);
            break;
        }

        $putanjaOriginalnaSlika = 'assets/images/stanovi/'.$naziv;
        if(move_uploaded_file($tmpName, '../../'.$putanjaOriginalnaSlika)){
            echo "Slika je upload-ovana na server!";

            try {
                $isInserted = insert($putanjaOriginalnaSlika, $putanjaNovaSlika);

                if($isInserted){
                    echo "Putanja do slike je upisana u bazu!";
                    header("Location: ../../index.php?page=korisnikNastavakAdd&id=".$_GET['id']);
                }
                
            } catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

        // brisanje iz memorije
        

     else{
    }
    imagedestroy($postojecaSlika);
        imagedestroy($novaSlika);



    }
?>