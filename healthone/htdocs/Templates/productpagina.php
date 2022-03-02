<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>


    <?php
    include_once('defaults/menu.php');
    ?>

<?
// global $getReview;
?>
    <div class="row gy-3 images imgs">
        <?php
        echo "<h3>" . $product['name'] . "</h3>";
        echo "<img class='card-img-top2' src=" . $product['picture'] . ">";
        echo "<p>" . $product['description'] . "</p>";
        ?>
    </div>
    <?php
    if(isset($_SESSION['username']))
    {
        include_once('defaults/form.php');
        echo"<div class='box'>";
        echo"Eerder gegeven reviews";
        foreach($getreview as $data) {
            echo  $data->description . "<br>" ;
            echo $data->stars . "<br>";
        }
        echo"</div>";
    }
    include_once('defaults/footer.php');
    ?>


</body>
</html>
