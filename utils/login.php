<?php
    //ToDo: remove every echo if finished

    //import functions
    require __DIR__ . '/functions.php';

    //loading the values of the .env File
    $env = load_env();

    //Get Username and Password from the Loginform and Hash the Password with sha256
    $user = $_POST["username"];
    $password = hash('sha256', $_POST["password"]);
    echo sprintf("User: %s, Password Hash: %s <br>", $user, $password);

    //create connection to DB
    //works with values of .env File
    $sql = 'SELECT * FROM user_table WHERE username=? AND user_password=?';
    $params = [$user, $password];
    $values = access_database($sql, $params, $env);
    print_r($values);
?>
<!-- uncomment if finished -->
<!-- <script>
    window.location.replace("/utils/me.php")
</script> -->