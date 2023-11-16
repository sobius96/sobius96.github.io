<?php
    //loading the values of the .env File
    function load_env(){
        $root = $_SERVER['DOCUMENT_ROOT'];
        $envFilepath = "$root/.env";
        return parse_ini_file($envFilepath);
    }

    //checking the values of sign-in process
    function valid_len($password) {
        if ((8 <= strlen($password)) and (strlen($password) <= 16)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function same_password($password_1, $password_2) {
        if (strcmp($password_1, $password_2) !== 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
?>