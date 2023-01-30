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
?>

<body id="ppbg" style="background: #201d1d;">

    <div class="div-profil">
        <div class="row">
            <div style="text-align: center; margin-right: 200px;" class="col mt-4">
                <?php


                if (!empty($user['avatar']) && $user['avatar'] !== NULL) {
                    echo '<img class="image-ronde" src="../Images/' . $user['avatar'] . '"/>';
                } else {
                    echo '<img class="image-ronde" src="../Images/avatartype.png"/>';
                }

                ?>


                <form method="post" action="../CodePHP/script-affichageavatar.php?id_u=<?= $user['id_u'] ?>" enctype="multipart/form-data">
                    <input type="file" name="avatar" id="avatar"><br><br>
                    <input type="submit" value="Modifier votre photo de profil">
                </form>

            </div>

            <div class="col d-flex justify-content-start mt-5">
                <?php echo '<span style="font-size: 20px; margin-right: 10px;">' . "Votre pseudo :" . ' ' . $user['pseudo'] . '</span>'; ?>
            </div>
        </div>
        <div class="row" style="border-bottom: 2px solid white;">
            <div style="text-align: center;margin-top:10px; margin-right: 200px; font-size: 20px;" class="col">
                <?php echo $user['nom'] . ' ' . $user['prenom']; ?>
            </div>

            <div class="col" style="margin-top: -72px;">




                <button onclick="showform()" style="margin-top: -60px; font-size: 15px; width: 200px;">Modifier votre profil</button>




                <div id="modif" class="test2" style="margin-right: 450px; display: none;">
                    <p style="text-align:center; margin-top: 20px; font-size:30px">Modifier votre profile !</p>
                    <br<<br>
                        <form action="../CodePHP/script-inscription.php" method="post">
                            <table class="inscri_table">
                                <tr>
                                    <td><input class="myInput" type="text" name="nom" value=<?php echo $user['nom']; ?>></td>
                                </tr>
                                <tr>
                                    <td><input class="myInput" type="text" name="prenom" value=<?php echo $user['prenom']; ?>></td>
                                </tr>
                                <tr>
                                    <td><input class="myInput" type="text" name="pseudo" value=<?php echo $user['pseudo']; ?>></td>
                                </tr>
                                <tr>
                                    <td><input class="myInput" type="text" name="password" value=<?php echo $user['password']; ?>></td>
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


                <form action="../CodePHP/script-ajout-photo.php?id_u=<?= $user['id_u'] ?>" method="post" enctype="multipart/form-data">

                    <h3 style="margin-top: 20px;">Ajoutez une photo</h3><br>

                    <?php echo "$message"; ?>

                    <input style="width: 300px;" type="file" name="file" id="file"></input>
                    <button style="margin-bottom: 30px;">Valider</button>
                </form>
            </div>
        </div>


    </div>

    <div>
        <h2 style="margin-bottom: 20px; margin-top: 20px; text-align: center; color: whitesmoke;">Les 6 derniers postes</h2>
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

    $id_u = $user['id_u'];
    $query = "SELECT * FROM Photos WHERE id_u = '$id_u' ORDER BY id_p DESC LIMIT 6";
    $result = mysqli_query($conn, $query);


    echo '<div class="container">';
    echo '<div class="row justify-content-center">';

    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($i % 3 == 0 && $i != 0) {
            echo '</div><div class="row justify-content-center" style="margin-top: 20px">';
        }
        echo '<div class="col-4">';
        echo '<img style="width: 250px; height: 200px"; class="img-fluid mx-auto d-block" src="../Images/' . $row['nom_p'] . '">';
        echo '</div>';
        $i++;
    }

    echo '</div>';
    echo '</div>';

    mysqli_close($conn);
    ?>



    <script src="../Utils/script.js"></script>

</body>

</html>