<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';
require '../Modules/review.php';
require '../Modules/checklogin.php';
require '../Modules/users.php';

define("DOC_ROOT", realpath(dirname(__DIR__)));
define("TEMPLATE_ROOT", realpath(DOC_ROOT . "/Templates"));

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";
session_start();
var_dump($_SESSION);
//var_dump($_SESSION['username']




switch ($params[1]) {
    case 'categories':
        $titleSuffix = ' | Categories';

        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];
            $products = getProducts($categoryId);
            $name = getCategoryName($categoryId);

            if (isset($_GET['product_id'])) {
                $productId = $_GET['product_id'];
                $product = getProduct($productId);
                $titleSuffix = ' | ' . $product['name'];

                if (isset($_POST['verzenden'])) {
                    if (isset($_SESSION['id'])) {
                        // saveReview($_POST['name'],$_POST['review']);
                        // $reviews=getReviews($productId);
                        var_dump($_POST);
                        // $name = filter_input(INPUT_POST, 'Naam', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $review = filter_input(INPUT_POST, 'Review', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $ster = filter_input(INPUT_POST, 'Ster', FILTER_VALIDATE_INT);
                        if ($ster == false) {
                            echo "ERROR!";
                        } else {
                            addReview($_SESSION['id'], $review, $ster, $productId, $user_id);
                        }
                    } else {
                        echo "error!!";
                    }
                }
                $getreview = getReview($productId); 
                include_once "../Templates/productpagina.php";
            } else {
                include_once "../Templates/productTemplate.php";
            }
        } else {
            // TODO Toon de categorieen

            $categories = getCategories();
            include_once "../Templates/categories.php";
        }
        break;
    case 'contact':
        $titleSuffix = ' | contact';
        include_once "../Templates/contactpagina.php";
        break;
    case 'registreren':
        $titleSuffix = ' | registreren';
        include_once "../Templates/registreren.php";
        break;
    case 'login':
        $titleSuffix = ' | login';

        if (isset($_POST['login'])) {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            var_dump($password);
            var_dump($_POST);
            $user = checklogin($username, $password);
            var_dump($user);
            if ($user == false) {
                echo "ERROR!!";
            } else {
                var_dump($user);
                $_SESSION['login'] = true;
                $_SESSION['role'] = $user->role;
                $_SESSION['username'] = $user->username;
                $_SESSION['id'] = $user->id;
                header("Location: /home");
            }
        }

        include_once "../Templates/login.php";
        break;
    case 'logout':
        session_destroy();
        header("Location: /");
        break;
        case 'profiel':
            // $getuser = getUser($userId);
            include_once "../Templates/member/changeprofile.php";
            break;
    case 'admin':
        include_once './admin.php';
        break;
    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}

function getTitle()
{
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}
