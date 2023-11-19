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
        echo "Password accepted <br>";
    } else {
        echo "something is wrong with password <br>";
    }

    //create connection to DB
    //works with values of .env File
    $db_connection = pg_connect(sprintf("host=%s port=%s user=%s password=%s", $env["Host"], $env["Port"], $env["User"], $env["Password"])) or die("Could not connect");
    echo "Connection successfully";
    pg_close($db_connection);
?>
<!-- uncomment if finished -->
<!-- <script>
    window.location.replace("me.php")
</script> -->