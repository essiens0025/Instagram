<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For You Page</title>
    <link href="../Utils/barrenav.css" rel="stylesheet">
</head>

<body style="background: #201d1d">
    <?php
    include("navbar.php");
    include("../CodePHP/script-fyp.php");
    echo "<h1 class='h1-fyp'>For You Page</h1>";
    foreach ($photos as $photo) {
        echo "<div class='div-fyp'>";
        echo "<p class='pseudo-fyp'>" . $photo["pseudo"] . "</p>" . "<br>" . "<br>";
        echo "<img style='width:500px' src='" . '../Images/' . $photo["nom_p"] . "' alt='photo'><br>";
        echo "<img style='width:35px;' src='../Images/like.png' onclick='like(" . $photo["id_p"] . ")'>";
        echo "<a class='comm'href='commentaires.php?id_p=" . $photo["id_p"] . "'>Commentaires</a><br><br>";
        echo "<hr style='color:#FFFFFF;'>";
        echo "</div>";
    }
    ?>


    <script src="../Utils/script.js"></script>

</body>

</html>