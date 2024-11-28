<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Khai báo biến $errors để kiểm tra lỗi
    $errors = [];   

    // Kiểm tra email
    if (empty(trim($_POST['email']))) {
        $errors['email']['required'] = 'Email không được để trống';
    } else {
        if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $errors['email']['invalid'] = 'Email không hợp lệ';
        }
    }

    // Kiểm tra mật khẩu
    if (empty(trim($_POST['password']))) {
        $errors['password']['required'] = 'Mật khẩu không được để trống';
    } else {
        // Kiểm tra độ dài mật khẩu
        if (strlen(trim($_POST['password'])) < 6) {
            $errors['password']['min_length'] = 'Mật khẩu phải có ít nhất 6 kí tự';
        }
        // Kiểm tra xem mật khẩu có chứa ít nhất 1 kí tự thường, 1 kí tự đặc biệt và > 5 chữ số không
        if (!preg_match('/^(?=.*[a-z])(?=.*[!@#$%^&*])(?=.*[0-9]{5,}).*$/', $_POST['password'])) {
            $errors['password']['complexity'] = 'Mật khẩu phải chứa ít nhất 1 kí tự thường, 1 kí tự đặc biệt và có ít nhất 5 chữ số';
        }
    }

    // Kiểm tra mật khẩu nhập lại
    if (empty(trim($_POST['repassword']))) {
        $errors['password']['required'] = 'Mật khẩu không được để trống';
    } else {
        if ($_POST['password'] != $_POST['repassword']) {
            $errors['repassword']['mismatch'] = 'Mật khẩu nhập lại không khớp';
        }
    }

    // Nếu không có lỗi thì chuyển hướng đến trang đăng nhập
    if (empty($errors)) {
        header('');
        exit; // Đảm bảo không có mã HTML hoặc mã PHP khác được thực thi sau chuyển hướng
    }
    echo '<pre>';
    print_r($errors);
    echo '<pre>';
} 
?>