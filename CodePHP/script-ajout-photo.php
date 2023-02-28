<?php
session_start();

// Récupération des données du formulaire
$file = $_FILES['file'];
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];



// Définition du chemin de destination pour enregistrer le fichier
$path = "/opt/lampp/htdocs/Instagram/Images/";



$destination_path = $path;
$target_path = $destination_path . basename($_FILES['file']['name']);
@move_uploaded_file($_FILES['file']['tmp_name'], $target_path);


// Connexion à la base de données
$pdo = new PDO("mysql:host=57.128.65.58;dbname=julien_ahmed_instagram", "julien", "dyhh3rkhho");

// Récupération de l'ID de l'utilisateur connecté à partir de la session
$user_id = $_GET['id_u'];





try {
    // Préparation de la requête d'insertion
    $stmt = $pdo->prepare("INSERT INTO Photos (nom_p, id_u) VALUES (:nom, :id_u)");

    // Liaison des paramètres
    $stmt->bindParam(':nom', $file['name']);
    $stmt->bindParam(':id_u', $user_id);

    // Exécution de la requête
    $stmt->execute();
} catch (Exception $e) {
    die('Erreur:' . $e->getMessage());
}

header('location: profil-prive.php');
