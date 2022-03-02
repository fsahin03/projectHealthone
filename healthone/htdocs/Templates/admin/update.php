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