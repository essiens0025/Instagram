<?php

// Connexion à la base de données
include 'connexion_bdd.php';

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];
$image = $_POST['image'];

// Vérification si le pseudo existe déjà
$query = $mysqlConnection->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
$query->bindParam(':pseudo', $pseudo);
$query->execute();

if ($query->rowCount() > 0) {
    header("Location: ../Vues/inscription.php?error=pseudo_exists");
    exit();
}

$stmt = $mysqlConnection->prepare("INSERT INTO users (nom, prenom, pseudo, `password`, avatar) VALUES (?, ?, ?, ?, ?)");

echo $nom;
echo $prenom;
echo $pseudo;
echo $password;
echo $image;

$stmt->execute([
    $nom,
    $prenom,
    $pseudo,
    $password,
    $image
]);

// Redirection vers une page de confirmation
header("Location: ../Vues/connexion.php?message=iscription réussie, veuillez vous authentifier");

exit();
