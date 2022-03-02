<!DOCTYPE html>
<html>
    <?php
        include_once('defaults/head.php');
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
                <td>email</td>
                <td><?=$_SESSION['user']->email?></td>
            </tr>
            <tr>
                <td>name</td>
                <td><?=$_SESSION['user']->name?></td>
            </tr>
            <tr>
                <td>lastname</td>
                <td><?=$_SESSION['user']->username?></td>
            </tr>
        </tbody>
    </table>
</html>