<?php
session_start();

// Récupération des données du formulaire
$file = $_FILES['avatar'];
$fileName = $_FILES['avatar']['name'];
$fileTmpName = $_FILES['avatar']['tmp_name'];



// Définition du chemin de destination pour enregistrer le fichier
$path = "/opt/lampp/htdocs/Instagram/Images/";



$destination_path = $path;
$target_path = $destination_path . basename($_FILES['avatar']['name']);
@move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path);


// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=insta_bdd", "root", "");

// Récupération de l'ID de l'utilisateur connecté à partir de la session
$user_id = $_GET['id_u'];

echo $user_id;



try {
    $sql = "UPDATE users SET avatar = :avatar WHERE id_u = :id_u";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':avatar', $fileName, PDO::PARAM_STR);
    $stmt->bindValue(':id_u', $user_id, PDO::PARAM_INT);
    $stmt->execute();
} catch (Exception $e) {
    die('Erreur:' . $e->getMessage());
}

header('location: ../Vues/profil-prive.php');
