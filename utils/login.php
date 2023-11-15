<?php
    // ToDo

    // Get Username and Password from the Loginform and Hash the Password with sha256
    $user = $_POST["username"];
    $password = hash('sha256', $_POST["password"]);
    echo sprintf("User: %s, Password Hash: %s <br>", $user, $password);

    //create connection to DB
    //works with that port, user and password on the PC of Zinni
    //ToDo: get Values from .env
    $db_connection = pg_connect(sprintf("host=%s port=%s user=%s password=%s", $_ENV["Host"], $_ENV["Port"], $_ENV["User"], $_ENV["Password"])) or die("Could not connect");
    echo "Connection successfully";
    pg_close($db_connection);
?>
<!-- <script>
    window.location.replace("/utils/me.php")
</script> -->