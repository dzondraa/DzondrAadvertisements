<?php
    define("ABSOLUTE_PATH" , $_SERVER['DOCUMENT_ROOT']."/praktikumSajt");
    define("LOG_FAJL" , ABSOLUTE_PATH."/data/log.txt");
    define("ENV_FAJL" , ABSOLUTE_PATH."/config/_env");

    define("DATABASE" , env("DBNAME"));
    define("USERNAME" , env("USERNAME"));
    define("SERVER" , env("SERVER"));
    define("PASSWORD" , env("PASSWORD"));
    

    function env($name){
        $file = file(ENV_FAJL);
        foreach($file as $index=>$value){
            $ex = explode("=" , $value);
            if($ex[0] == $name) return trim($ex[1]);
        }
    }

?>