<?php
    //loading the values of the .env File
    function load_env(){
        $root = $_SERVER['DOCUMENT_ROOT'];
        $envFilepath = "$root/.env";
        return parse_ini_file($envFilepath);
    }
?>