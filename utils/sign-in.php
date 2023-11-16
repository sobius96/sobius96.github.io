<?php 
    //ToDo: remove every echo if finished

    //loading the values of the .env File
    $root = $_SERVER['DOCUMENT_ROOT'];
    $envFilepath = "$root/.env";
    $env = parse_ini_file($envFilepath);

    //Get Username, Mail and Password 1 and 2 from the Sign-In-Form
    $user = $_POST["username"];
    $mail = $_POST["mail"];
    $password_1 = $_POST["password_1"];
    $password_2 = $_POST["password_2"];

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