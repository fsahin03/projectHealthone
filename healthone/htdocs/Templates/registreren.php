<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>
<div class="container-fluid">
    <?php
    include_once ('defaults/header.php');
    include ('defaults/head.php');
    include_once ('defaults/menu.php');
    include('../Modules/Database.php');
    ?>

<h1>Register Form </h1>
    <form class="form2" action="" method="POST">
        <div class="container">

            <input type="text" placeholder="Enter userName" name="username" required>
            <input type = "text" placeholder= "Enter email" name="email" required>
            <input type="text" placeholder="Enter name" name="name" required>
            <input type="password" placeholder=" Password" name="password" required> <br>
            <input type="submit" name="submit" value="register"></input>
            <button type="button" class="cancelbtn"> Cancel</button>
        </div>
    </form>

    <?php

try{
    
    if(isset($_POST['submit'])) {
        $username = filter_input(INPUT_POST, "username",FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password",);
        var_dump($username);
        var_dump($name);
        var_dump($email);
        var_dump($password);

        $query = $pdo->prepare('INSERT INTO users(username,name,email,password)VALUES(:username, :name,:email, :password)');
        $query->bindParam("username", $username);
        $query->bindParam("name", $name);
        $query->bindParam("email", $email);
        $query->bindParam("password", $password);
        $query->execute();
        if($query->execute) {
            echo "Welkom u bent ingelogd";
        }else{
            echo "Er is een probleem";
        }
        echo"<br>";
    };
    }catch(PDOexception $e) {
        die("Error!:" . $e->getMessage());
}
    ?>
</div>
</body>
</html>
