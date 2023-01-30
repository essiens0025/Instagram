<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Utils/style.css">
    <title>Inscription</title>
</head>

<body>
    <div class="test">
        <img class="inscri_insta" src="../Images/Instagram-Logo.png">
        <p style="text-align:center; font-size:30px">Votre profile</p>

        <table class="inscri_table">
            <tr>
                <td><label>Nom</label>
                    <input class="myInput" type="text" name="nom" value="Entrez votre nom">
                </td>
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
            </tr>
        </table>

    </div>
    <script src="../Utils/script.js"></script>
</body>

</html>