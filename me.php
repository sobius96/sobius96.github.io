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
            $img="2";
            $user="Richard";
            $username="Zinni";
            $birthday="23.09.2003";
            $age="20";
            $location="Leipzig";
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
                        echo sprintf('<img id="bioImage" src="utils/img/bio/img_%s.jpg" alt="Bio Image">', $img);  
                    ?>
                </div>
                <div class="headlines" >
                    <div class="userBig" >
                        <?php 
                            echo $user;
                        ?>
                    </div>
                    <div class="devider"></div> 
                    <div class="usernameBig" >
                        <?php 
                            echo $username;
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
                            echo $birthday;
                        ?>
                    </div>
                    <div class="dataHead">
                        Alter:
                    </div>
                    <div class="dataEntry">
                        <?php 
                            echo $age;
                        ?>
                    </div>
                    <div class="dataHead">
                        Standort:
                    </div>
                    <div class="dataEntry">
                        <?php 
                            echo $location;
                        ?>
                    </div>
                </div>
                <div>
                    Bio
                </div>
            </div>
        </div>
        <footer>
            <div class="wrapper">
                Ich bin ein Fuß
            </div>
        </footer>
    </body>
</html>