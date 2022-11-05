<?php

    include __DIR__ . '/config/Database.php';
    $database = new Database();
    $db = $database->connect();


    $id = $_GET['id'];

    $sql = $db->prepare('DELETE FROM `students` WHERE id = :uid');
    $sql->execute(['uid'=>$id]);
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
header('Location: http://localhost:80/php-mert-tekrar/');

?>