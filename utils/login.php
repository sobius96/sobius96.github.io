<?php
    //ToDo: remove every echo if finished

    //import functions
    require __DIR__ . '/functions.php';

    //loading the values of the .env File
    $env = load_env();

    //Get Username and Password from the Loginform and Hash the Password with sha256
    $user = $_POST["username"];
    $password = hash('sha256', $_POST["password"]);

    //create connection to DB
    //works with values of .env File
    $sql = 'SELECT user_id FROM user_table WHERE username=? AND user_password=?';
    $params = [$user, $password];
    $values = access_database($sql, $params, $env);
    
    //working with data
    $data = prep_single_data($values);
    if (!$data[0]) {
        try {
            setcookie("user", " ", time()-3600, "/");
        } finally {
            setcookie("error", "Username oder Passwort stimmen nicht überein!", array ('path' => '/'));
            header(sprintf("Location: http://%s/login.html", $env["Ip"]));
            exit();
        }
    } else {
        setcookie("user", $data[1][0]["user_id"], array ('path' => '/'));
        setcookie("friend", "7", array ('path' => '/'));
        header(sprintf("Location: http://%s/me.php", $env["Ip"]));
        exit();
    }
?>