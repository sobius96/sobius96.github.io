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
    
    //preparing the date to a nicer format
    function prep_date($date) {
        if (!($date === "0001-01-01")) {
            $date = date_parse_from_format("Y.n.j", $date);
            return sprintf("%s.%s.%s", $date["day"], $date["month"], $date["year"]);
        } else {
            return "N/A";
        }
    }

    //calculates the age
    function age($date) {
        if (!($date === "N/A")) {
            $today = date_parse_from_format("j.n.Y", date("j.n.Y"));
            $date = date_parse_from_format("j.n.Y", $date);
            $age = intval($today["year"]) - intval($date["year"]);
            if ((intval($today["month"]) <= intval($date["month"])) and (intval($today["day"]) < intval($date["day"]))) {
                return $age - 1;
            } else {
                return $age;
            } 
        } else {
            return "N/A";
        }
    }

    //check input data
    function check($data, $env, $important=true, $date=false) {
        if (!$important) {
            if ($date and empty($data)) {
                return "0001-01-01";
            } else if (!empty(trim($data))) {
                return $data;
            } else {
                return "N/A";
            }
        } else if (empty($data)) {
            setcookie("error", "  ", array ('path' => '/'));
            header(sprintf("Location: http://%s/utils/edit.php", $env["Ip"]));
            exit();
        } else {
            return $data;
        }
    }
?>