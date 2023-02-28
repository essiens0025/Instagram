<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Utils/style.css">
    <title>Inscription</title>
</head>

<body style="background-image:url(Images/fond-instagram.jpg)">
    <div class="test">
        <img class="inscri_insta" src="Images/Instagram-Logo.png">
        <p style="text-align:center; font-size:30px; margin-top: -16px;">Inscrivez vous !</p>
        <form action="CodePHP/script-inscription.php" method="post">
            <table class="inscri_table">
                <tr>
                    <td><input class="myInput" type="text" name="nom" value="Entrez votre nom"></td>
                </tr>
                <tr>
                    <td><input class="myInput" type="text" name="prenom" value="Entrez votre prénom"></td>
                </tr>
                <tr>
                    <td><input class="myInput" type="text" name="pseudo" value="Choisissez un pseudo"></td>
                </tr>
                <tr>
                    <td><input class="myInput" type="text" name="password" value="Choisir votre mot de passe"></td>
                </tr>

                <tr>

                    <td><input class="valid-but" type="submit" value="Valider"></td>

                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == "pseudo_exists") {
                        echo "<center>Le pseudo existe déjà, veuillez en choisir un autre";
                    }
                    ?>
                </tr>
            </table>

        </form>



    </div>
    <script src="Utils/script.js"></script>
</body>

</html>