<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="Utils/barrenav.css" rel="stylesheet">
</head>

<body>

    <?php
    session_start()
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Utils/style.css">
        <title>Se connecter</title>
    </head>

    <body style="background-image:url(Images/fond-instagram.jpg); background-repeat: no-repeat; ">

        <div>
            <img class="icone" src="Images/Instagram_icon.png.webp">
        </div>
        <div>
            <h1 class="h1co">Se Connecter</h1>
        </div>
        <div style="text-align: center; font-size: 20px; margin-bottom: 10px; color: #0bc42a; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);;">
            <?php

            if (isset($_GET['message'])) {
                $message = $_GET['message'];
                echo $message;
            }
            ?>
        </div>

        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='error' style='text-align:center;'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
        ?>

        <div style="display: flex; justify-content: center;" ;>

            <form class="form_co" action="CodePHP/script-connexion.php" method="post">

                <table class="tabcenter">

                    <tr>

                        <td>
                            <label>Pseudo:</label>
                        </td>

                        <td>
                            <input type="text" name="pseudo">
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <label>Mot de passe:</label>
                        </td>

                        <td>
                            <input type="password" name="password">
                        </td>

                    </tr>
                </table>

                <input style="margin-left : 370px; margin-bottom:20px" class="but-co" type="submit" value="Se connecter">
                <a style="font-size: 24px; margin-left : 405px;text-decoration:none; color:#4f5bd5" href="inscription.php">S'inscrire</a>




            </form>
            <div>

    </body>

    </html>