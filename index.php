<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="utils/style.css" rel="stylesheet" type="text/css">
        <link href="utils/img/elephriend_icon.png" rel="icon" type="image/png">
        <title>elephriend</title>
    </head>
    <body>
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
            <?php 
                echo "dynamischer Inhalt";
            ?>
        </div>
        <footer>
            <div class="wrapper">
                Ich bin ein Fuß
            </div>
        </footer>
    </body>
</html>