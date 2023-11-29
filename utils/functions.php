<?php
    //loading the values of the .env File
    function load_env(){
        $root = $_SERVER['DOCUMENT_ROOT'];
        $envFilepath = "$root/.env";
        return parse_ini_file($envFilepath);
    }

    //checking the values of sign-in process
    //check if password has the right len
    function valid_len($password) {
        if ((8 <= strlen($password)) and (strlen($password) <= 16)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    //check if the passwords are the same
    function same_password($password_1, $password_2) {
        if (strcmp($password_1, $password_2) !== 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //connect to DB and execute sql
    function access_database($sql, $params, $env) {
        try {
            $pdo = new PDO(sprintf("pgsql:host=%s; port=%s;", $env["Host"], $env["Port"]), $env["User"], $env["Password"], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            
            if ($pdo) {
                $statement = $pdo->prepare($sql);
                $statement->execute($params);
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

    //preparing the own database data
    function prep_single_data($data) {
        if (!$data) {
            return [FALSE, []];
        } else {
            return [TRUE, $data];
        }
    }

    function prep_date($date) {
        $date = date_parse_from_format("Y.n.j", $date);
        return sprintf("%s.%s.%s", $date["day"], $date["month"], $date["year"]);
    }

    function age($date) {
        $today = date_parse_from_format("j.n.Y", date("j.n.Y"));
        $date = date_parse_from_format("j.n.Y", $date);
        $age = intval($today["year"]) - intval($date["year"]);
        if ((intval($today["month"]) <= intval($date["month"])) and (intval($today["day"]) < intval($date["day"]))) {
            return $age - 1;
        } else {
            return $age;
        }  
    }
?>