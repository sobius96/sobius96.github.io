<?php
    // ToDo

    //loading the values of the .env File
    $root = $_SERVER['DOCUMENT_ROOT'];
    $envFilepath = "$root/.env";
    $env = parse_ini_file($envFilepath);

    //Get Username and Password from the Loginform and Hash the Password with sha256
    $user = $_POST["username"];
    $password = hash('sha256', $_POST["password"]);
    echo sprintf("User: %s, Password Hash: %s <br>", $user, $password);

    //create connection to DB
    //works with that port, user and password on the PC of Zinni
    $db_connection = pg_connect(sprintf("host=%s port=%s user=%s password=%s", $env["Host"], $env["Port"], $env["User"], $env["Password"])) or die("Could not connect");
    echo "Connection successfully";
    pg_close($db_connection);
?>
<!-- <script>
    window.location.replace("/utils/me.php")
</script> -->