<!DOCTYPE html>
<html>

<form enctype="multipart/form-data" method="POST">
        <label>Kies deze bestand</label>
        <input type="text" name="productName">
        <input type="text" name="description">
        <input name="userfile" type="file"/>
        <input type="submit" name="verzenden" value="Send File">
</form>
<?php
if(isset($_POST['verzenden'])) {
        print_r($_FILES);
}

$message="";
if (isset($_POST['verzenden'])) {
        global $pdo;

        $productName = filter_input(INPUT_POST,"productNamem",FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST,"description",FILTER_SANITIZE_STRING);
        $sth = $pdo->prepare("UPDATE product SET name='productName', picture='$_FILES', description='description' WHERE id = ?");
        $result=fileupload();
        if($result===true) {
            echo"Bestand bewaard!";    
        } else{
                echo"Bestand niet bewaard op de server.";
                echo$message;
        }
}


?>
</html>