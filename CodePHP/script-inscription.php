<?php
// Connexion à la base de données
try {
    $mysqlConnection = new PDO("mysql:host=localhost;dbname=insta_bdd", "root", "");
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

// Préparation de la requête pour vérifier si le pseudo et le mot de passe sont déjà utilisés
$stmt = $mysqlConnection->prepare("SELECT * FROM users WHERE pseudo = :pseudo AND password = :password");

// Liaison des paramètres
$stmt->bindParam(':pseudo', $pseudo);
$stmt->bindParam(':password', $password);

// Exécution de la requête
$stmt->execute();

// Vérification du résultat
if ($stmt->rowCount() > 0) {
    // Le pseudo et le mot de passe sont déjà utilisés, on retourne au formulaire avec un message d'erreur
    echo "Cette combinaison de pseudo et de mot de passe est déjà utilisée. Veuillez en choisir une autre.";
} else {
    // Le pseudo et le mot de passe ne sont pas encore utilisés, on peut enregistrer les données dans la base
    $stmt = $mysqlConnection->prepare("INSERT INTO users (nom, prenom, pseudo, password) VALUES (:nom, :prenom, :pseudo, :password)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    echo "Données enregistrées avec succès !";
}