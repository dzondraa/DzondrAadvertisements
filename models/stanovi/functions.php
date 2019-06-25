<?php
        #require_once "config/connection.php";
        function getSviStanovi(){
            global $conn;
            $query = "SELECT *,s.ID as idStana FROM stanovi s inner join lokacije l ON s.lokacijaId = l.ID";
            $conn->prepare($query);
            return executeQuery($query);
        }
        function getSviStanoviLimit($start , $limit){
            $limit = (int)$limit;
            global $conn;
            $query = "SELECT *,s.ID as idStana FROM stanovi s inner join lokacije l ON s.lokacijaId = l.ID limit :sta,:lim";
            $query = $conn->prepare($query);
            $query->bindValue(':sta', intval($start), PDO::PARAM_INT);
            $query->bindValue(':lim', intval($limit), PDO::PARAM_INT);
            $query->execute();
            $r = $query->fetchAll();
            foreach($r as $e){
                $e->slikaStana = getSlikaStana($e->idStana);
            }
            return $r;
        }

        function getSlikaStana($id) {
            global $conn;
            $upit = "SELECT * from slikestanova where stanId = ?";
            $upit = $conn->prepare($upit);
            $rez = $upit->execute([$id]);
            $r = $upit->fetchAll();
            return $r[0]->malaSlika;
            
        }
        function filterStanova($kategorija , $transakcija , $lokacija,$cenaDo , $cenaOd){
            global $conn;
            $brVal = 1;
            $values = array();
            $upit = "SELECT *,s.ID as idStana, k.naziv as kategorijaNaziv FROM stanovi s inner join lokacije l ON s.lokacijaId = l.ID inner join kategorije k on s.kategorijaId = k.id_kat";
            if($kategorija != "0" || $transakcija != "0" || $lokacija != "" || $cenaDo!= "" || $cenaOd != ""){
                $upit .= " where ";
                $konkat= "";
                if($kategorija != "0"){
                    $konkat .= " kategorijaNaziv = ? and ";
                    $brVal++;
                    array_push($values , $kategorija);
                }
                if($transakcija != "0"){
                    $konkat .= " transakcija = ? and ";
                    $brVal++;
                    array_push($values , $transakcija);
                }
                if($lokacija != ""){
                    $konkat .= " grad = ? and ";
                    $brVal++;
                    array_push($values , $lokacija);
                }
                if($cenaDo != ""){
                    $konkat .= " cena < ? and ";
                    $brVal++;
                    array_push($values , $cenaDo);
                }
                if($cenaOd != ""){
                    $konkat .= " cena > ? and ";
                    $brVal++;
                    array_push($values , $cenaOd);
                }
                $konkat = substr($konkat, 0, -4);
                $upit.= $konkat;
                try{
                $upit= $conn->prepare($upit);
                $br =0;
                for($i = 0; $i<count($values); $i++){
                    $br++;  
                   $upit -> bindValue($br , $values[$i]);                 
                }
                $stanovi = $upit->execute();
                $stanovi = $upit->fetchAll();

                #var_dump($stanovi);
                
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
            }
            
            }
            else{
                return getSviStanovi();
            }
        }
       
?>