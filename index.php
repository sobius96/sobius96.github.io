<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="utils/style.css" rel="stylesheet" type="text/css">
        <link href="utils/img/elephriend_icon.png" rel="icon" type="image/png">
        <title>elephriend.</title>
    </head>
    <body>
        <?php
            require __DIR__ . '/utils/functions.php';

            $env = load_env();
            
            if (!isset($_COOKIE["user"])) {
                header(sprintf("Location: http://%s/login.html", $env["Ip"]));
                exit();
            } else {
                $sql = 'SELECT username, profile_picture, user_id FROM user_table';
                $params = [];
                $values = access_database($sql, $params, $env);

                $data = prep_single_data($values);
                $data = $data[1];
            }
        ?>
        <header>
            <div class="wrapper header">
                <a href="index.php">
                    <img id="logo" src="utils/img/elephriend-2-ele.png" alt="elephriend-logo">
                </a>
                <nav class="center">
                    <a href="login.html" class="button">Login</a>
                    <a href="me.php" class="button">Me</a>
                </nav>
            </div>
        </header>
        <div class="wrapper content">
            <?php 
                echo "dynamischer Inhalt";
            ?>
        </div>
        <footer>
            <div class="wrapper">
            <div class="header">
                    <div>
                        © 2023 elephriend.
                    </div>
                    <div>
                        <a href="imprint.html">
                            Impressum
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>