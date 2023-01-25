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

<body>
    <div>
        <img class="icone" src="../Images/Instagram_icon.png.webp">
    </div>
    <div>
        <h1 class="h1co">Se Connecter</h1>
    </div>
    <div>
        <form class="form_co" action="../CodePHP/script-connexion.php" method="post">
            Nom d'utilisateur: <input type="text" name="pseudo"><br>
            Mot de Passe: <input type="text" name="password"><br>
            <input style="margin-left : 370px ; font-size : 20px ; margin-top: 30px; margin-bottom: 15px; " type="submit" value="Se connecter">
        </form>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='error'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
        ?>
    </div>
    <a style="padding-left : 985px; font-size:20px" href="inscription.php">S'inscrire</a>
</body>

</html>