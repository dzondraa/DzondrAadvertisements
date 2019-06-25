<?php
require_once "../../config/connection.php";
require_once "functions.php";
require_once "../functions.php";
$stanovi = getSviStanovi();
$excel = new COM("Excel.Application");
$excel->Visible = 1;
$excel->DisplayAlerts = 1;
$workbook = $excel->Workbooks->Open("http://localhost/praktikumSajt/data/stanovi.xlsx") or die('Did not open filename');
$sheet = $workbook->Worksheets('Sheet1');
#$sheet->active;
$br=1;
foreach($stanovi as $stan){
    $polje = $sheet->Range("A".$br);
    #$polje->active;
    $polje->value=$stan->naslov;

    $polje = $sheet->Range("B".$br);
    $polje->value = $stan->cena;


    $br++;
    
}

header("Content-Disposition/")


?>