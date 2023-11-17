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
    try {
        $pdo = new PDO(sprintf("pgsql:host=%s; port=%s;", $env["Host"], $env["Port"]), $env["User"], $env["Password"], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
        if ($pdo) {
            echo "Connected";
            $sql = 'SELECT * FROM user_table WHERE username=? AND user_password=?';
            $statement = $pdo->prepare($sql);
            $statement->execute([$user, $password]);
            print_r($statement->fetchAll(PDO::FETCH_ASSOC));
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    } finally {
        if ($pdo) {
            $pdo = null;
        }
    }
?>
<!-- uncomment if finished -->
<!-- <script>
    window.location.replace("/utils/me.php")
</script> -->