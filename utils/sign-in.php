<?php 
    //import functions
    require __DIR__ . '/functions.php';

    //loading the values of the .env File
    $env = load_env();

    //Get Username, Mail and Password 1 and 2 from the Sign-In-Form
    $user = $_POST["username"];
    $mail = $_POST["mail"];
    $password_1 = $_POST["password_1"];
    $password_2 = $_POST["password_2"];

    //check if Inputs are valid
    //ToDo: ErrorPage, check if Username is free, check if mail is free
    if (same_password($password_1, $password_2) and valid_len($password_1)) {
        $password = hash('sha256', $password_1);
    } else {
        setcookie("error", "Passwort muss 8-16 Zeichen lang sein und die Passwörter müssen übereinstimmen", array ('path' => '/'));
        header(sprintf("Location: http://%s/sign-in.html", $env["Ip"]));
        exit();
    }

    $sql = 'SELECT user_id FROM user_table WHERE username=?';
    $params = [$user];
    $values = prep_single_data(access_database($sql, $params, $env));

    if ($values[0]) {
        setcookie("error", "Username existiert bereits", array ('path' => '/'));
        header(sprintf("Location: http://%s/sign-in.html", $env["Ip"]));
        exit();
    }

    $sql = 'SELECT user_id FROM user_table WHERE email=?';
    $params = [$mail];
    $values = prep_single_data(access_database($sql, $params, $env));

    if ($values[0]) {
        setcookie("error", "Email existiert bereits", array ('path' => '/'));
        header(sprintf("Location: http://%s/sign-in.html", $env["Ip"]));
        exit();
    }

    //create connection to DB
    //works with values of .env File
    $sql = 'INSERT INTO user_table(username, user_password, email) VALUES (?, ?, ?)';
    $params = [$user, $password, $mail];
    access_database($sql, $params, $env);

    //check if user exist now
    $sql = 'SELECT user_id FROM user_table WHERE username=? AND user_password=?';
    $params = [$user, $password];
    $data = prep_single_data(access_database($sql, $params, $env));

    if (!$data[0]) {
        try {
            setcookie("user", " ", time()-3600, "/");
        } finally {
            setcookie("error", "Etwas ist schief gelaufen", array ('path' => '/'));
            header(sprintf("Location: http://%s/sign-in.html", $env["Ip"]));
            exit();
        }
    } else {
        setcookie("user", $data[1][0]["user_id"], array ('path' => '/'));
        setcookie("friend", "7", array ('path' => '/'));
        header(sprintf("Location: http://%s/utils/edit.php", $env["Ip"]));
        exit();
    }
?>