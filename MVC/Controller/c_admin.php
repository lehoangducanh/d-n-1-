<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'adminHome':
            $view_name = "page_adminHome";
            break;
        case 'adminPro':
            $view_name = "page_adminPro";
            break;
        case 'adminCate':
            $view_name = "page_adminCate";
            break;
        case 'adminAddPro':
            $view_name = "page_adminAddPro";
            break;
        case 'adminAddCate':
            $view_name = "page_adminAddCate";
            break;
        case 'adminDeletePro':
            $view_name = "page_adminDeletePro";
            break;
        case 'adminEditPro':
            $view_name = "page_adminEditPro";
            break;
        case 'adminDeleteCate':
            $view_name = "page_adminDEleteCate";
            break;
        case 'adminEditCate':
            $view_name = "page_adminEditCate";
            break;

        default:
            $view_name = "page_adminHome";
            break;
    }
} else {

    $view_name = "page_adminHome";
}
include "views/admin/v_$view_name.php";
