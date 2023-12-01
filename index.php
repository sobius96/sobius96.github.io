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
                $sql = 'SELECT username, profile_picture, user_id, user_location FROM user_table';
                $params = [];
                $values = access_database($sql, $params, $env);

                $data = prep_single_data($values);
                $data = $data[1];
            }
        ?>
        <header>
            <div class="wrapper flex row between mxAuto">
                <a href="index.php">
                    <img id="logo" src="utils/img/elephriend-2-ele.png" alt="elephriend-logo">
                </a>
                <nav class="myAuto">
                    <a href="login.html" class="button paddingCustom">Login</a>
                    <a href="me.php" class="button paddingCustom">Me</a>
                </nav>
            </div>
        </header>
        <div class="wrapper flex gap column paddingPercent mxAuto">
            <?php
                echo '<script>
                        function showUser(id) {
                            document.cookie = "friend=" + id + "; path=/";
                            window.location.href = "/user.php";
                        }
                    </script>';
                foreach($data as &$user) {
                    echo sprintf(
                        '<div class="userProfile flex between paddingPx mxPx">
                            <div class="flex gap">
                                <img id="bioImageSmall" src="utils/img/bio/img_%s.jpg" alt="Bio Image">
                                <div class="flex gap column myAuto">
                                    <div>%s</div>
                                    <div>%s</div>
                                </div>
                            </div>
                            <button class="userButton paddingPxSmall myAuto" onClick="showUser(%s)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="heroicon" fill="none" viewBox="0 0 24 24" stroke="#000000" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>', $user["profile_picture"], $user["username"], $user["user_location"], $user["user_id"]);
                }
                unset($user);
            ?>
        </div>
        <footer>
            <div class="wrapper mxAuto">
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