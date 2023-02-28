<?php
try {
    $mysqlConnection = new PDO(
        'mysql:host=57.128.65.58;dbname=julien_ahmed_instagram;charset=utf8',
        'julien',
        'dyhh3rkhho'
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
