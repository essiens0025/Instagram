<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For You Page</title>
    <link href="../Utils/style.css" rel="stylesheet">
</head>

<body id="fyp" style="background: #201d1d">

    <?php

    include("navbar.php");
    include("CodePHP/script-fyp.php");
    include("CodePHP/connexion_bdd.php");

    echo "<h1 class='h1-fyp'>For You Page</h1>";


    if (isset($_GET['error'])) {
        echo "<p style='color:red; font-size:25px; text-align:center; margin-bottom: 60px'>" . $_GET['error'] . "</p>";
    }


    foreach ($photos as $photo) {
        echo "<div class='div-fyp'>";
        echo "<a class='pseudo-fyp' href='profil-public.php?pseudo=" . $photo["pseudo"] . "'>" . $photo["pseudo"] . "</a>" . "<br>" . "<br>";
        echo "<img class='img' style='width:500px;' src='" . 'Images/' . $photo["nom_p"] . "' alt='photo'><br>";
        echo "<div class='position'>";
        echo "<form style='width:50px' method='post' action='CodePHP/script-comptelikes.php?id_u=" . $user['id_u'] . "&&id_p=" . $photo['id_p'] . "'>
                    <button type='submit' name='Likes'><img style='width:35px;' src='../Images/like.png'></button>
            </form>";

        echo "<div style='font-size: 23px; color: white; margin-left: 10px;' >";
        $sql = "SELECT id_p, COUNT(*) AS Likes FROM Likes WHERE id_p = ?";
        $countStmt = $mysqlConnection->prepare($sql);

        $countStmt->execute([$photo['id_p']]);
        $countLikes = $countStmt->fetch();
        echo $countLikes['Likes'];
        echo "</div>";

        echo "<a class='comm'href='commentaires.php?id_p=" . $photo["id_p"] . "'>Commentaires</a><br><br>";
        echo "</div>";
        echo "<hr style='color:#FFFFFF; margin-top: 50px'>";
        echo "</div>";
    }


    ?>


    <script src="Utils/script.js"></script>

</body>

</html>