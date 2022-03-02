<?php
function checklogin(string $username, string $password) {
   global $pdo;
    $sth= $pdo->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $sth->bindParam(1,$username);
    $sth->bindParam(2,$password);
    $sth->setFetchMode(PDO::FETCH_CLASS,User::class);
    $sth->execute();
    return $sth->fetch();
    
}
?>