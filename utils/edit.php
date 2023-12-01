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
            if (isset($_COOKIE["error"])) {
                $msg = "<div class='error'>Du musst einen Namen, eine Bio und ein Bild angeben!</div>";
                setcookie("error", "", time()-3600, "/");
            } else if (!empty($_POST)) {
                $msg = "";

                $sql = 'UPDATE user_table SET user_name=?, birthday=?, user_location=?, bio=?, profile_picture=? WHERE user_id=?';
                $params = [check($_POST["name"], $env), check($_POST["birthday"], $env, false, true), check($_POST["location"], $env, false), check($_POST["bio"], $env), check($_POST["bioImg"], $env), $_COOKIE["user"]];
                $new_values = access_database($sql, $params, $env);
            } else {
                $msg = "";
            }
            $sql = 'SELECT * FROM user_table WHERE user_id=?';
            $params = [$_COOKIE["user"]];
            $values = access_database($sql, $params, $env);

            $data = prep_single_data($values);
        ?>
        <header>
            <div class="wrapper flex row between mxAuto">
                <a href="../index.php">
                    <img id="logo" src="img/elephriend-2-ele.png" alt="elephriend-logo">
                </a>
                <nav class="myAuto">
                    <a href="../login.html" class="button paddingCustom">Login</a>
                    <a href="../me.php" class="button paddingCustom">Me</a>
                </nav>
            </div>
        </header>
        <div class="wrapper flex gap column paddingPercent mxAuto">
            <form action="edit.php" method="post">
                <div class="flex gapSmall column">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $data[1][0]['user_name'];?>">
                    <label>Bio Image</label>
                    <div>
                        <img id="bioImageSmall" src="img/bio/img_1.jpg" alt="Bio Image">
                        <input type="radio" id="1" name="bioImg" value="1" <?php if ($data[1][0]['profile_picture'] == 1) {echo "checked";}?>>
                        <img id="bioImageSmall" src="img/bio/img_2.jpg" alt="Bio Image">
                        <input type="radio" id="2" name="bioImg" value="2" <?php if ($data[1][0]['profile_picture'] == 2) {echo "checked";}?>>
                        <img id="bioImageSmall" src="img/bio/img_3.jpg" alt="Bio Image">
                        <input type="radio" id="3" name="bioImg" value="3" <?php if ($data[1][0]['profile_picture'] == 3) {echo "checked";}?>>
                        <img id="bioImageSmall" src="img/bio/img_4.jpg" alt="Bio Image">
                        <input type="radio" id="4" name="bioImg" value="4" <?php if ($data[1][0]['profile_picture'] == 4) {echo "checked";}?>>
                        <img id="bioImageSmall" src="img/bio/img_5.jpg" alt="Bio Image">
                        <input type="radio" id="5" name="bioImg" value="5" <?php if ($data[1][0]['profile_picture'] == 5) {echo "checked";}?>>
                        <img id="bioImageSmall" src="img/bio/img_6.jpg" alt="Bio Image">
                        <input type="radio" id="6" name="bioImg" value="6" <?php if ($data[1][0]['profile_picture'] == 6) {echo "checked";}?>>
                    </div>
                    <label for="birthday">Geburstag</label>
                    <input type="date" id="birthday" name="birthday" value="<?php if (!($data[1][0]['birthday'] === "0001-01-01")) {echo $data[1][0]['birthday'];}?>">
                    <label for="location">Standort</label>
                    <input type="text" id="location" name="location" value="<?php if (!($data[1][0]['user_location'] === "N/A")) {echo $data[1][0]['user_location'];}?>">
                    <label for="bio">Bio</label>
                    <input type="text" id="bio" name="bio" value="<?php echo $data[1][0]['bio'];?>">
                    <?php echo $msg;?>
                </div>
                <div class="flex gapSmall column">
                    <input type="submit" value="Save">
                </div>
            </form>
        </div>
        <footer>
            <div class="wrapper mxAuto">
                <div class="flex row between">
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