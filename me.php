<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="utils/style.css" rel="stylesheet" type="text/css">
        <link href="utils/img/elephriend_icon.png" rel="icon" type="image/png">
        <title>elephriend. | me</title>
    </head>
    <body>
        <?php
            require __DIR__ . '/utils/functions.php';

            if (!isset($_COOKIE["user"])) {
                header("Location: http://localhost/login.html");
                exit();
            } else {
                $env = load_env();

                $sql = 'SELECT * FROM user_table WHERE username=?';
                $params = [$_COOKIE["user"]];
                $values = access_database($sql, $params, $env);

                $data = prep_single_data($values);
            }
        ?>
        <header>
            <div class="wrapper header">
                <img id="logo" src="utils/img/elephriend-2-ele.png" alt="elephriend-logo">
                <nav class="center">
                    <a href="index.php">Home</a>
                    <a href="login.html">Login</a>
                    <a href="me.php">Me</a>
                </nav>
            </div>
        </header>
        <div class="wrapper content">
            <div class="me">
                <div>
                    <?php
                        echo sprintf('<img id="bioImage" src="utils/img/bio/img_%s.jpg" alt="Bio Image">', $data[1][0]["img"]);  
                    ?>
                </div>
                <div class="headlines" >
                    <div class="userBig" >
                        <?php 
                            echo $data[1][0]["user"];
                        ?>
                    </div>
                    <div class="devider"></div> 
                    <div class="usernameBig" >
                        <?php 
                            echo $data[1][0]["username"];
                        ?>
                    </div>
                </div>
            </div>
            <div class="me">
                <div class="datacard">
                    <div class="dataHead">
                        Geburstag:
                    </div>
                    <div class="dataEntry">
                        <?php 
                            echo $data[1][0]["birthday"];
                        ?>
                    </div>
                    <div class="dataHead">
                        Alter:
                    </div>
                    <div class="dataEntry">
                        <?php 
                            echo $data[1][0]["age"];
                        ?>
                    </div>
                    <div class="dataHead">
                        Standort:
                    </div>
                    <div class="dataEntry">
                        <?php 
                            echo $data[1][0]["location"];
                        ?>
                    </div>
                </div>
                <div class="bio">
                    <?php 
                        echo $data[1][0]["biography"];
                    ?>
                </div>
            </div>
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