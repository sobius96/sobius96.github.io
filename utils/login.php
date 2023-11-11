<?php
    // ToDo
    $user = $_POST["username"];
    $password = hash('sha256', $_POST["password"]);
    echo sprintf("User: %s, Password Hash: %s", $user, $password);
?>
<!-- <script>
    window.location.replace("/utils/me.php")
</script> -->