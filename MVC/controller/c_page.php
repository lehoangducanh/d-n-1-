<?php
$showsp1 = showProductCate1();
$showsp2 = showProductCate2();
$showsp3 = showProductCate3();
$showdmHome = showCategoriesHome();
$showdmNavBar = showCategoriesNavBar();

if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];


if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            $view_name = "page_home";
            break;
        case 'gioithieu':
            $view_name = "page_gioithieu";
            break;
        case 'tintuc':
            $view_name = "page_tintuc";
            break;
        case 'sptheodm':

            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id_dm = $_GET['id'];
                $sptheodm = showProductCate($id_dm);
            } else {
                $sptheodm = 1;
            }
            $view_name = "page_sptheodm";
            break;
        case 'shop':
            $view_name = "page_shop";
            break;
        case 'chitietsp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $chitietsp = showDetailProduct($id);
            } else {
                $chitietsp = 0;
            }
            $view_name = "page_chitietsp";
            break;

        case 'addcart':
            // Lấy dữ liệu từ Form v_page_cart
            if (isset($_POST['addcart']) && ($_POST['addcart'])) {

                $id_sp = $_POST['id_sp'];
                $anhsp = $_POST['anhsp'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                if (isset($_POST['slsp'])) {
                    $slsp = $_POST['slsp'];
                } else {
                    $slsp = 1;
                }
                // $slsp = 1;
                $fg = 0;

                //Kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không?, nếu 1 sản phẩm đã có rồi, chỉ tăng số lượng
                $i = 0;

                foreach ($_SESSION['giohang'] as $sp) {
                    if ($sp[2] === $tensp) {
                        $slspnew = $slsp + $sp[4];
                        $_SESSION['giohang'][$i][4] = $slspnew;
                        $fg = 1;
                        break;
                    }
                    $i++;
                }

                //khởi tạo 1 mảng con trc khi đưa vào giỏ hàng
                if ($fg == 0) {
                    $sp = array($id_sp, $anhsp, $tensp, $giasp, $slsp);
                    $_SESSION['giohang'][] = $sp;
                }
                header('location:?mod=pages&act=addcart');
            }

            // Kiểm tra khi form được gửi đi




            $view_name = "page_cart";
            break;


        case 'thanhtoan':
            if ((isset($_POST['thanhtoan'])) && ($_POST['thanhtoan'])) {
               
                //lấy dữ liệu 
                $tongdonhang = $_POST['tongdonhang'];
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $phuongthuctt = $_POST['pttt'];
                $madh = "GoodShoes" . rand(0, 999999);
                //tạo đơn hàng
                //và trả về 1 id đơn hàng
                // $sp = array($id_sp, $anhsp, $tensp, $giasp, $slsp);
                $id_donhang = taodonhang($madh, $tongdonhang, $phuongthuctt, $hoten, $email, $diachi, $sdt);
                $_SESSION['id_donhang'] = $id_donhang;
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                    foreach ($_SESSION['giohang'] as $sp) {
                        addcart($id_donhang, $sp[0], $sp[1], $sp[2], $sp[3], $sp[4]);
                    }
                    unset($_SESSION['giohang']);
                }
            } 
            include 'views/home/v_page_thanhtoan.php';
            break;

        case 'updatecart':
            if (isset($_POST['updatecart']) && ($_POST['updatecart'])) {
                // Lấy số lượng mới từ form
                $newQuantities = $_POST['slspcu'];

                // Cập nhật số lượng cho từng sản phẩm trong giỏ hàng
                foreach ($newQuantities as $index => $newQuantity) {
                    $_SESSION['giohang'][$index][4] = $newQuantity;
                }

                // Redirect người dùng trở lại trang giỏ hàng
                header('location:?mod=pages&act=addcart');
            }
            break;


        case 'deletecart':
            if (isset($_GET['stt']) && ($_GET['stt'] > 0)) {
                if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0))
                    array_splice($_SESSION['giohang'], $_GET['stt'], 1);
            } else {
                if (isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            }

            if (isset($_SESSION['giohang']) && (count($_SESSION['giohang']) > 0)) {
                header('location:?mod=pages&act=addcart');
            } else {
                header('location:?mod=pages&act=addcart');
            }

            break;

        default:
            $view_name = "page_home";
            break;
    }
} else {
    $view_name = "page_home";
}

include "views/home/v_$view_name.php";
