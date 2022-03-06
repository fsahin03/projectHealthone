<?php
global $params;
var_dump($_SESSION['role']);
if(isset($_SESSION['role']) == '2') {
    if(isset($params[2])) {
        switch ($params[2]) {
            case 'products':
                if(isset($_GET['product_id'])){
                    
                    if(isset($_GET['delete'])) {
                        $productId = $_GET['product_id'];
                        $delete = $_GET['delete'];
                        if($delete){
                            deleteProduct($productId);
                        }
                    }

                }
                $products = getAll();
                include_once TEMPLATE_ROOT . '/admin/products.php';
                break;
            case 'update':
                var_dump("hallo");
                include_once TEMPLATE_ROOT . '/admin/update.php';
                break;
                
            // case 'users':

            //     $allUsers = getAllUsers();
            //     include_once TEMPLATE_ROOT . '/admin/users.php';
            //     break;
            // case 'editProduct':
            //     $productId = $_GET['product_id'];
            //     $editProduct = getProduct($productId);

            //     if(isset($_POST['update'])) {
            //         if(empty($_POST['productName'] || $_POST['imgPath'] || $_POST['productDescription'])) {
            //             echo "Vul alle velden in!";
            //         }else {
                        
            //             if(isset($_POST['update'])){
            //                 print_r($_FILES);
            //             }
                        
            //             $message=""; 
            //             if (isset($_POST['update'])) 
            //             { $result=fileupload(); 
            //                 if($result===false) {
            //                     echo "Image niet bewaard!"; 
            //                 } else{ //als de IMG leeg is dan alleen de titel bijwerken ..  if (empty())
            //                     var_dump($result);
            //                     updateProduct($_POST['productName'], $result, $_POST['productDescription'], $productId);
            //                     echo $message; 
            //                 } 
            //             }
            //             // header('Location: /admin/products');
            //         }
            //     }
            //     include_once TEMPLATE_ROOT . '/admin/editProduct.php';
            //     break;
            //     case 'addProduct':
            //         include_once TEMPLATE_ROOT . '/admin/addProduct.php';
            //         break;
             default:
                include_once TEMPLATE_ROOT . '/admin/home.php';
        }
    }

} else {
        header("Location: /home");
}

?>