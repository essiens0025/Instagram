<?php include("connexion_bdd.php");


session_start();

$user_id = $_SESSION['id_u'];

$query = 'SELECT * FROM users WHERE id_u = :id';
$userStatement = $mysqlConnection->prepare($query);
$userStatement->execute([
    'id' => $user_id,
]);
$user = $userStatement->fetch();
