<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=57.128.65.58;dbname=julien_ahmed_instagram', 'julien', 'dyhh3rkhho');


// Vérifier si l'utilisateur a déjà aimé la photo
$query = "SELECT * FROM Likes WHERE id_p = :id_p AND id_u = :id_u";
$stmt = $pdo->prepare($query);
$stmt->execute(array(
  ':id_p' => $_GET['id_p'],
  ':id_u' => $_GET['id_u'],
));
if ($stmt->rowCount() > 0) {
  header("Location: fyp.php?error=Vous avez déjà liké la photo");
} else {


  // Insérer un nouveau like
  if (isset($_GET['id_u']) && isset($_GET['id_p'])) {
    $query = "INSERT INTO Likes (id_p, id_u) VALUES (:id_p, :id_u)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(
      array(
        ':id_p' => $_GET['id_p'],
        ':id_u' => $_GET['id_u'],
      )
    );
  }

  // Compter le nombre de likes pour chaque photo
  $query = "SELECT id_p, COUNT(*) AS Likes FROM Likes GROUP BY id_p";
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $likes = $stmt->fetchAll();


  // Afficher le nombre de likes pour chaque photo
  foreach ($likes as $like) {
    header("Location: fyp.php?Likes={$like['Likes']}");
  }
}
