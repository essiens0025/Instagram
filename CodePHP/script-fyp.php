<?php
include("connexion_bdd.php");
$stmt = $mysqlConnection->prepare("SELECT Photos.id_p, Photos.nom_p, Photos.id_u, users.pseudo
                              FROM Photos
                              JOIN users ON Photos.id_u = users.id_u
                              ORDER BY Photos.id_p DESC
                              LIMIT 5");
$stmt->execute();
$photos = $stmt->fetchAll();


?>