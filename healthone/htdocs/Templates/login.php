<?php
include_once('defaults/head.php');
?>
<?php

include_once('defaults/header.php');
include('defaults/head.php');
include_once('defaults/menu.php');
include('../Modules/Database.php');
?>

<div class="container">
<form class="form1" method="post">
 <input type="text" placeholder="Voer username in" name="username" required>
 <input type="password" name="password">
 <input type="submit" name="login" value="inloggen">
</form>
</div>