<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="img/elephriend_icon.png" rel="icon" type="image/png">
        <title>elephriend. | edit</title>
    </head>
    <body>
        <?php 
            //import functions
            require __DIR__ . '/functions.php';

            if (!isset($_COOKIE["user"])) {
                header("Location: http://localhost/login.html");
                exit();
            } else {
                $env = load_env();

                $sql = 'SELECT * FROM user_table WHERE user_id=?';
                $params = [$_COOKIE["user"]];
                $values = access_database($sql, $params, $env);

                $data = prep_single_data($values);
            }
        ?>
        <header>
            <div class="wrapper header">
                <a href="../index.php">
                    <img id="logo" src="img/elephriend-2-ele.png" alt="elephriend-logo">
                </a>
                <nav class="center">
                    <a href="../login.html">Login</a>
                    <a href="../me.php">Me</a>
                </nav>
            </div>
        </header>
        <div class="wrapper content">
            <form action="edit.php" method="post">
                <div class="format">

                </div>
                <div class="format">
                    <input type="submit" value="Save">
                </div>
            </form>
        </div>
        <footer>
            <div class="wrapper">
                <div class="header">
                    <div>
                        © 2023 elephriend.
                    </div>
                    <div>
                        <a href="../imprint.html">
                            Impressum
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>