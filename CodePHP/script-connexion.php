<?php
include('connexion_bdd.php');

session_start();



$sqlQuery = 'SELECT * FROM users WHERE pseudo = :pseudo AND `password` = :password';

$userStatement = $mysqlConnection->prepare($sqlQuery);
$userStatement->execute([
    'pseudo' => $_POST["pseudo"],
    'password' => $_POST["password"],
]);

$user = $userStatement->fetch();


if ($user != null) {
    // Pseudo et mot de passe correspondent à une entrée dans la base de données
    // Rediriger vers index.php
    $_SESSION["pseudo"] = $user["pseudo"];

    $_SESSION["id_u"] = $user["id_u"];

    header("Location: ../Vues/fyp.php");
    exit();
} else {
    // Pseudo ou mot de passe incorrect ou utilisateur non enregistré
    $_SESSION["error"] = "Votre pseudo ou votre mot de passe est faux veuillez les modifier ou vous n'avez pas de compte. Il faut en créer un.";
    header("Location: ../Vues/index.php");
    exit();
}
