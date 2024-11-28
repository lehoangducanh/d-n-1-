<?php
ob_start();
if (isset($_GET['act'])) {

    switch ($_GET['act']) {
        case 'home':
            $view_name = "page_home";
            break;
        case 'login':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $kq = getaccinfo($username, $password);
                $role = $kq[0]['role'];
                $_SESSION['role'] = $role;
                $_SESSION['idtk'] = $kq[0]['id_tk'];
                $_SESSION['username'] = $kq[0]['tentk'];
                if ($role == 1) {
                    header('location: admin.php');
                } else {
                    header('location: index.php');
                }
            }
            $view_name = "page_login";
            break;
        case 'register':
            $view_name = "page_register";

            if (isset($_POST['dangky'])) {
                $thongbao1 = $thongbao2 = $thongbao3 = '';

                $kq2 = checkMail($_POST['email']);
                if ($kq2) {
                    //nếu đúng thì đã có mail rồi

                    //Báo lỗi, chưa đkí
                    $thongbao2 = "Email đã tồn tại!";
                }


                $kq1 = checkTen_tk($_POST['tentk']);
                if ($kq1) {
                    //nếu đúng thì đã có ten tk rồi

                    //Báo lỗi, chưa đkí
                    $thongbao1 = "Tên tài khoản đã tồn tại!";
                }
                $kq3 = true;
                if (strlen($_POST['matkhau']) < 6) {
                    $thongbao3 .= "Mật khẩu phải ít nhất 6 kí tự! <br> ";

                    $kq3 = false;
                }
                if (!preg_match("/[A-Z]/", $_POST['matkhau'])) {
                    $thongbao3 .= "Mật khẩu phải có ít nhất 1 chữ in hoa!<br>";
                    $kq3 = false;
                }
                if (!preg_match("/[!@#$%^&*()_+=-]/", $_POST['matkhau'])) {
                    $thongbao3 .= "Mật khẩu phải tồn tại ít nhât 1 ký tự đặc biệt!";

                    $kq3 = false;
                }

                if (!$kq1 && !$kq2 && $kq3) {
                    $kq = dangky($_POST['tentk'], $_POST['email'], $_POST['sdt'], $_POST['matkhau']);
                    header("Location:?mod=users&act=login");
                    exit;
                    
                }
            }
            break;
        case 'userinfo':
            $view_name = "page_userinfo";
            break;
        default:
            $view_name = "page_home";
            break;
    }
} else {
    $view_name = "page_home";
}
include "views/user/v_$view_name.php";