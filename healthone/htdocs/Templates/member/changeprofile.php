<!DOCTYPE html>
<html>
    <?php
        include_once('../Templates/defaults/head.php');
    ?>
    <h4>Member profiel</h4>
    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>username:</td>
                <td><?=($_SESSION['username'])?></td>
            </tr>
            <tr>
                <td>id:</td>
                <td><?=$_SESSION['id']?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?=$_SESSION['email']?></td>
            </tr>
        </tbody>
    </table>
    <a type="button" class="btn btn-success btn-sm px-3" 
    href="/member/editprofile">Profiel aanpassen</a>

    <a type="button" class="btn btn-danger btn-sm px-3"
    href="/member/changepassword">Wachtwoord aanpassen</a>
</html>
<hr>
<?php
include_once('defaults/footer.php');
?>
</div>
</body>
</html>