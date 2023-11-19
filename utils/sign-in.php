<?php 
    //ToDo: remove every echo if finished

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
        echo "something is wrong with password <br>";
    }

    //create connection to DB
    //works with values of .env File
    $sql = 'INSERT INTO user_table(username, user_password, email) VALUES (?, ?, ?)';
    $params = [$user, $password, $mail];
    $values = access_database($sql, $params, $env);
?>