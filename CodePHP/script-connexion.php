<?php
include('connexion_bdd.php');

session_start();

$mysqlConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $mysqlConnection->prepare("SELECT * FROM users WHERE pseudo = :pseudo AND password = :password");
$stmt->bindValue(":pseudo", $_POST["pseudo"]);
$stmt->bindValue(":password", $_POST["password"]);
$stmt->execute();
$user = $stmt->fetch();
if ($user) {
    // Pseudo et mot de passe correspondent à une entrée dans la base de données
    // Rediriger vers index.php
    $_SESSION["pseudo"] = $user["pseudo"];
    header("Location: ../Vues/index.php");
    exit();
} else {
    // Pseudo ou mot de passe incorrect ou utilisateur non enregistré
    $_SESSION["error"] = "Votre pseudo ou votre mot de passe est faux veuillez les modifier ou vous n'avez pas de compte. Il faut en créer un.";
    header("Location: ../Vues/connexioncopy.php");
    exit();
}
