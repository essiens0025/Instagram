<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil-privé</title>
    <link href="../Utils/barrenav.css" rel="stylesheet">
</head>


<?php
include("../CodePHP/script-profil-prive.php");
include("navbar.php");
include("../CodePHP/connexion_bdd");
?>

<body id="ppbg" style="background: #201d1d;">


    <div class="div-profil">
        <div class="row">
            <div style=" display:flex; justify-content: center; text-align: center; margin-right: 200px;" class="col mt-4">
                <?php

                $pseudo = $_GET['pseudo'];


                $query = 'SELECT * FROM users WHERE pseudo = :pseudo';
                $userStatement = $mysqlConnection->prepare($query);
                $userStatement->execute(['pseudo' => $pseudo]);
                $pseud = $userStatement->fetch();


                if (!empty($user['avatar']) && $user['avatar'] !== NULL) {

                    echo '<img class="image-ronde2" src="../Images/' . $pseud['avatar'] . '"/>';
                    echo '<p style="font-size: 30px;" class="mt-4 ms-5">' . $pseud['pseudo'] . '<br>';
                    echo '' . $pseud['nom'] . ' ' . $pseud['prenom'] . '</p>';
                } else {

                    echo '<img class="image-ronde" src="../Images/avatartype.png"/>';
                }

                ?>
            </div>


            <div class="row" style="border-bottom: 2px solid white;">


            </div>


        </div>

        <div>
            <h2 style="margin-bottom: 20px; margin-top: 20px; text-align: center; color: whitesmoke;">Les postes</h2>
        </div>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "insta_bdd";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $id_u = $pseud['id_u'];
        $query = "SELECT * FROM Photos WHERE id_u = '$id_u' ORDER BY id_p DESC";
        $result = mysqli_query($conn, $query);

        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 0) {
            echo "<p style='font-size: 25px; text-align: center; color: white'>Vous n'avez pas encore posté</p>";
        } else {

            echo '<div class="container">';
            echo '<div class="row justify-content-center">';

            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($i % 3 == 0 && $i != 0) {
                    echo '</div><div class="row justify-content-center" style="margin-top: 20px">';
                }
                echo '<div class="col-4">';
                echo '<img style="border: 3px solid #8d8c8c;width: 250px; height: 250px"; class="img-fluid mx-auto d-block" src="../Images/' . $row['nom_p'] . '"><br>';
                echo '</div>';
                $i++;
            }

            echo '</div>';
            echo '</div>';
        }

        mysqli_close($conn);
        ?>



        <script src="../Utils/script.js"></script>

</body>

</html>