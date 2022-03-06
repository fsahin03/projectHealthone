<?php
function addReview($user_id, $description, $stars, $productId,) {
    global $pdo;
    $sth = $pdo->prepare('INSERT INTO review(name, description, stars , product_id, user_id) Values ("",?,?,?,?)');
    // $sth -> bindParam("name", $name);
    // $sth -> bindParam("description", $text);
    // $sth -> bindParam("stars", $stars);
    // $sth -> bindParam("product_id", $productId);
    // $sth -> bindParam("user_id", $user_id);
    $sth -> bindParam(1,$description);
    $sth -> bindParam(2,$stars);
    $sth -> bindParam(3,$productId);
    $sth -> bindParam(4,$user_id);
    $sth -> execute();
}

function getReview(int $id) 
{
global $pdo;
$sth = $pdo->prepare('SELECT review.description, review.time, review.stars, review.product_id, users.name
FROM review
LEFT JOIN users
ON review.user_id = users.id
WHERE product_id = :id');
$sth->bindParam("id", $id);
$sth->execute();
$var = $sth->fetchAll(PDO::FETCH_CLASS, "Review");
return $var;
}
?>