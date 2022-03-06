<?php
global $params;
var_dump($params);
// include_once("../Templates/defaults/head.php")
if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    switch ($params[2]) {
        case 'products':
            var_dump($_GET);
            if(isset($_GET['product_id']) && isset($_GET['delete'])){
                $productId = $_GET['product_id'];
                $delete = $_GET['delete'];
                if($delete) {
                    deleteProduct($productId);
                }
            }
            $products = getAll();
           include_once '../Templates/admin/products.php';
        break;
        default:
        include_once '../Templates/home.php';
        break;
    }
} else {
    header("Location: /");
}
