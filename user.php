<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="utils/style.css" rel="stylesheet" type="text/css">
        <link href="utils/img/elephriend_icon.png" rel="icon" type="image/png">
        <title>elephriend. | user</title>
    </head>
    <body>
        <?php
            require __DIR__ . '/utils/functions.php';

            $env = load_env();
            
            if (!isset($_COOKIE["friend"])) {
                $sql = 'SELECT * FROM user_table WHERE user_id=?';
                $params = ["7"];
                $values = access_database($sql, $params, $env);

                $data = prep_single_data($values);
            } else {
                $sql = 'SELECT * FROM user_table WHERE user_id=?';
                $params = [$_COOKIE["friend"]];
                $values = access_database($sql, $params, $env);

                $data = prep_single_data($values);
            }
        ?>
        <header>
            <div class="flex row between mxAuto maxWidth">
                <a href="index.php">
                    <img id="logo" src="utils/img/elephriend-2-ele.png" alt="elephriend-logo">
                </a>
                <nav class="flex row gap myAuto">
                    <a href="login.html" class="button paddingCustom">Login</a>
                    <a href="me.php" class="button paddingCustom">Me</a>
                </nav>
            </div>
        </header>
        <div class="flex gap column paddingPercent mxAuto maxWidth">
            <div class="flex gap row paddingPercent">
                <div>
                    <?php
                        echo sprintf('<img id="bioImage" src="utils/img/bio/img_%s.jpg" alt="Bio Image">', $data[1][0]["profile_picture"]);  
                    ?>
                </div>
                <div class="headlines flex gap column myAuto mxPx full">
                    <div class="mxAuto sizeXl weight500">
                        <?php 
                            echo $data[1][0]["user_name"];
                        ?>
                    </div>
                    <div class="devider full"></div> 
                    <div class="mxAuto size2Xl weight700">
                        <?php 
                            echo $data[1][0]["username"];
                        ?>
                    </div>
                </div>
            </div>
            <div class="flex gap row paddingPercent">
                <div class="flex gap column minWidth sizeM">
                    <div class="weight700">
                        Geburstag:
                    </div>
                    <div class="mlPx weight500">
                        <?php 
                            echo prep_date($data[1][0]["birthday"]);
                        ?>
                    </div>
                    <div class="weight700">
                        Alter:
                    </div>
                    <div class="mlPx weight500">
                        <?php 
                            echo age(prep_date($data[1][0]["birthday"]));
                        ?>
                    </div>
                    <div class="weight700">
                        Standort:
                    </div>
                    <div class="mlPx weight500">
                        <?php 
                            echo $data[1][0]["user_location"];
                        ?>
                    </div>
                </div>
                <div class="bio paddingPx mxPx full sizeM">
                    <?php 
                        echo $data[1][0]["bio"];
                    ?>
                </div>
            </div>
        </div>
        <footer class="full">
            <div class="mxAuto maxWidth">
                <div class="flex row between">
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