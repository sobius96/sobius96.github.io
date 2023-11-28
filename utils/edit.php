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

            $env = load_env();

            if (!isset($_COOKIE["user"])) {
                header(sprintf("Location: http://%s/login.html", $env["Ip"]));
                exit();
            } 
            if (!empty($_POST)) {
                $sql = 'UPDATE user_table SET user_name=?, birthday=?, user_location=?, bio=?, profile_picture=? WHERE user_id=?';
                $params = [$_POST["name"], $_POST["birthday"], $_POST["location"], $_POST["bio"], $_POST["bioImg"], $_COOKIE["user"]];
                $new_values = access_database($sql, $params, $env);
            }
            $sql = 'SELECT * FROM user_table WHERE user_id=?';
            $params = [$_COOKIE["user"]];
            $values = access_database($sql, $params, $env);

            $data = prep_single_data($values);
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
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $data[1][0]['user_name'];?>">
                    <label>Bio Image</label>
                    <div>
                        <img id="bioImageSmall" src="img/bio/img_1.jpg" alt="Bio Image">
                        <input type="radio" id="1" name="bioImg" value="1">
                        <img id="bioImageSmall" src="img/bio/img_2.jpg" alt="Bio Image">
                        <input type="radio" id="2" name="bioImg" value="2">
                        <img id="bioImageSmall" src="img/bio/img_3.jpg" alt="Bio Image">
                        <input type="radio" id="3" name="bioImg" value="3">
                        <img id="bioImageSmall" src="img/bio/img_4.jpg" alt="Bio Image">
                        <input type="radio" id="4" name="bioImg" value="4">
                        <!-- <img id="bioImageSmall" src="img/bio/img_5.jpg" alt="Bio Image">
                        <input type="radio" id="5" name="bioImg" value="5">
                        <img id="bioImageSmall" src="img/bio/img_6.jpg" alt="Bio Image">
                        <input type="radio" id="6" name="bioImg" value="6"> -->
                    </div>
                    <label for="birthday">Geburstag</label>
                    <input type="date" id="birthday" name="birthday" value="<?php echo $data[1][0]['birthday']?>">
                    <label for="location">Standort</label>
                    <input type="text" id="location" name="location" value="<?php echo $data[1][0]['user_location'];?>">
                    <label for="bio">Bio</label>
                    <input type="text" id="bio" name="bio" value="<?php echo $data[1][0]['bio'];?>">
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