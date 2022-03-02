<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container-fluid">
    <?php
    //include_once('defaults/header.php');
    include_once('defaults/menu.php');
    // include_once('defaults/pictures.php');
    ?>
    <div class="row gy-3 images">
        <?php
        foreach ($products as &$data) {
            echo"<div class='col-sm-3 col-md-4'>";
            echo"<div class='card' >";
            echo"<div class='card-body text-center'>";
            echo "<a href='" . $categoryId . "/product/" . $data->id . "'>";
            echo"<img class='product-img img-responsive center-block cata' src=". $data->picture  . ">";
            echo"<h5>" . $data->name . "</h5>";

            echo "</div>";

            echo "</div>";
            echo"</div>";

            "</a>";
        }
        echo"</div>";

        ?>
    </div>
    <?php
    include_once('defaults/footer.php');

    ?>
</div>

</body>
</html>