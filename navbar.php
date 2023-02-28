<?php
include("../CodePHP/script-profil-prive.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Utils/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title></title>
</head>

<body>
    <nav style="border-bottom: 3px solid white;">
        <div id="nav" class="row display:flex text-center nav" style="margin-left: 0px; margin-right: 0px;">
            <div class=" col-4">
                <?php


                if (!empty($user['avatar']) && $user['avatar'] !== NULL) {
                    echo '<img class="image-ronde" src="Images/' . $user['avatar'] . '"/>';
                } else {
                    echo '<img class="image-ronde" src="Images/avatartype.png"/>';
                }

                ?>

                <?php

                echo '<span style="font-size: 30px; margin-left: 20px;">' . $user['pseudo'] . '</span>';

                ?>
            </div>
            <div class="col-4">
                <a href="fyp.php"><img class=" icone-nav" src="Images/Instagram_icon.png.webp"></a>
            </div>
            <div class="col-4" style="margin-top: 20px;">
                <a style="text-decoration: none; font-size:30px; color:#36b6da " href="profil-prive.php">Mon Profil</a>

            </div>



        </div>

        <div id="test"></div>
    </nav>



    <script src="Utils/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>