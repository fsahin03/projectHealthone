<?php
function getUser(int $userId) 
{
   global $pdo;
    $query = $pdo->prepare("SELECT * FROM users WHERE id = :id ");
    $query->bindParam("id", $userId);
    $query->execute();
    $value = $query->fetchAll(PDO::FETCH_CLASS,'User');
    return $value;
}
?>