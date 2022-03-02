<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getProducts(int $categoryId)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM product where category_id = $categoryId ");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_CLASS, 'category');
    return $result;
}

function getProduct(int $productId)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM product WHERE id = :id");
    $query->bindParam("id", $productId);
    $query->execute();
    $request = $query->fetch(PDO::FETCH_ASSOC);
    return $request;
}
function getAll():array
{
    global $pdo;
    $sth = $pdo->prepare('SELECT product.id, product.name, product.picture, product.category_id, category.title AS category FROM product
    LEFT JOIN category
    ON product.category_id=category.id
    ORDER BY category_id');
    $sth->execute();
    return $sth->fetchAll(PDO::FETCH_CLASS, 'product');
}
function deleteProduct(int $id) : void
{
 global $pdo;
 $sth = $pdo->prepare('DELETE FROM product WHERE id = ?');
 $sth->bindParam(1, $id);
 $sth->execute();
}
function editProduct(int $id) : void 
{
    global $pdo;
    $sth = $pdo->prepare("UPDATE product SET name='productName', picture='$_FILES', description='description' WHERE id = ?");

}

function fileupload() :bool
{
        global $message;
        $allowedFiles=['gif', 'png', 'jpg'];
        $fileName=$_FILES['userfile']['name'];
        $ext=pathinfo($fileName,PATHINFO_EXTENSION);
        if(!in_array($ext,$allowedFiles) || exif_imagetype($_FILES['userfile']['tmp_name'])===false) {
          $message="Sorry alleen gif,png of jpg bestanden zijn toegestaan";
          return false;      
        }
        $target_dir="upload/";
        $target_file= $_FILES['userfile']['name'];
        do{
                $target_file=$target_dir.md5($target_file).".$ext";
        } while (file_exists($target_file));

        if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_file)) {
                $message.="Upload gelukt, bestandsnaam is".$target_file;
                return true;
        } else{
                $message.="Sorry, upload niet gelukt";
                return false;
        }

}
