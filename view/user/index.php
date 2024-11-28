<?php
session_start();
ob_start();
include 'models/categories.php';
include 'models/products.php';
include 'models/connectdb.php';
include 'models/user.php';
include 'models/donhang.php';
pdo_get_connection();
// echo var_dump($showsp);
if (isset($_GET['mod'])) {
    switch ($_GET['mod']) {
        case 'pages':
            
            $ctrl_controller = "page";
            break;
            
        case 'users':
            $ctrl_controller = "user";
            break;
        default:
            $ctrl_controller = "page";
            break;
        case 'logout':
            unset($_SESSION['role']);
            unset($_SESSION['idtk']);
            unset($_SESSION['username']);
            header('location: index.php');
            break;
    }
} else {
    $ctrl_controller = "page";
}
include_once "controller/c_$ctrl_controller.php";
