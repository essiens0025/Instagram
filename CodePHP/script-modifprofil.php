<?php

// Connexion à la base de données
$host = "localhost";
$user = "root";
$password = "";
$dbname = "insta_bdd";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupération des données envoyées depuis le formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];
$id = $_POST['id'];

// Vérification que le pseudo n'existe pas déjà dans la base de données
$sql = "SELECT * FROM users WHERE pseudo='$pseudo' AND id_u!='$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: ../Vues/profil-prive.php?error=pseudo_exists");
    exit();
}

// Modification des données dans la table users
$sql = "UPDATE users SET nom='$nom', prenom='$prenom', pseudo='$pseudo', password='$password' WHERE id_u='$id'";

if (mysqli_query($conn, $sql)) {
    header("Location: ../Vues/profil-prive.php?sucess=updated");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
