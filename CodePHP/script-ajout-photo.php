<?php
session_start();
// Récupération des données du formulaire
$file = $_FILES['file'];
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];

var_dump($file);
var_dump($_GET['id_u']);

// Définition du chemin de destination pour enregistrer le fichier
$path = "/opt/lampp/htdocs/Instagram/Images/";


// Enregistrement du fichier dans le répertoire de destination

echo "<br>tmp_name: " . $file;
echo "<br>file name: " . $fileName;


move_uploaded_file($fileTmpName, $path . $fileName);
echo "<br>Path file name: " . $path . $fileName;
echo "<br>file tmp name: " . $fileTmpName;
echo "<br>file name: " . $fileName;
echo "<br>path: " . $path;



// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=insta_bdd", "root", "");

// Récupération de l'ID de l'utilisateur connecté à partir de la session
$user_id = $_GET['id_u'];

echo "<br>" . " user_id est : " . $user_id;



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
?>