<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../Utils/barrenav.css" rel="stylesheet">
</head>

<body style="background: #201d1d; color: whitesmoke;">
    <?php
    include("navbar.php");

    ?>

    <?php
    session_start();

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "insta_bdd";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
        // Récupération des données du formulaire
        $commentaire = $_POST['commentaire'];
        $id_u = $_SESSION['id_u'];
        $id_p = $_GET['id_p'];
        // Insertion des données dans la table Commentaires
        $sql = "INSERT INTO Commentaires (commentaire, id_u, id_p) VALUES ('$commentaire', '$id_u', '$id_p')";

        if ($conn->query($sql) === TRUE) {
            // Stocker le message de succès dans une variable de session
            $_SESSION['flash_message'] = "Commentaire ajouté avec succès";
            header("location: commentaires.php?id_p=$id_p");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }




    $conn->close();

    ?>
    <h1 style="display:flex; margin-top: 10px; margin-bottom: 20px; justify-content: center; font-size: 30px;">Commenter la photo !<br><br>

        <h4 style="display:flex; justify-content:center; font-size: 22px; margin-bottom: 10px;">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </h4>


    </h1>
    <div style="display: flex; justify-content: center;border-bottom: 2px solid white; margin-bottom: 20px;">
        <form method="post" action="">
            <textarea rows='3' cols='50' name='commentaire'></textarea><br><br>
            <button class="mb-3">Valider</button>
        </form>
    </div>



    <?php include '../CodePHP/connexion_bdd.php' ?>
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "insta_bdd";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id_p = $_GET['id_p'];


    // Sélection des 10 derniers commentaires correspondant à l'id_p
    $sql = "SELECT commentaire FROM Commentaires WHERE id_p = ? ORDER BY id_m DESC LIMIT 10";
    $comStatement = $mysqlConnection->prepare($sql);
    $comStatement->execute([$id_p]);
    $coms = $comStatement->fetchAll();


    ?>

    <div style="margin-left: 50px;">

        <?php
        if (empty($coms)) {
            echo "<div class='comment-box' style='width: 70%; margin: 0 auto; padding: 10px; border: 2px solid whitesmoke; border-radius: 7px'>";
            echo "Pas de commentaire";
            echo "</div><br>";
        } else {
            foreach ($coms as $com) {
                echo "<div class='comment-box' style='width: 70%; margin: 0 auto; padding: 10px; border: 2px solid whitesmoke; border-radius: 7px'>";
                echo $com['commentaire'];
                echo "</div><br>";
            }
        }
        ?>

    </div>

    <script src="../Utils/script.js"></script>
</body>

</html>