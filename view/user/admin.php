<?php
session_start();
include 'models/connectdb.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header('location:index.php');
    // print_r($_SESSION);
}
if (isset($_GET['mod'])) {
    switch ($_GET['mod']) {
        case 'admin':
            $ctrl_controller = "admin";
            break;
        default:
            $ctrl_controller = "admin";
            break;
    }
} else {
    $ctrl_controller = "admin";
}
include_once "controller/c_$ctrl_controller.php";
