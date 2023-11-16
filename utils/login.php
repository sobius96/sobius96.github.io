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
    $db_connection = pg_connect(sprintf("host=%s port=%s user=%s password=%s", $env["Host"], $env["Port"], $env["User"], $env["Password"])) or die("Could not connect");
    echo "Connection successfully";
    pg_close($db_connection);
?>
<!-- uncomment if finished -->
<!-- <script>
    window.location.replace("/utils/me.php")
</script> -->