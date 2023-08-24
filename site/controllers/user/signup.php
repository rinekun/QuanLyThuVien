<?php
$title = 'Đăng ký - Projectz';
require_once './models/user.php';

extract($_REQUEST);
// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($btn)) {
        // check error
        $phone_check = '/^[0-9]{10}+$/';
        $email_check = '/^[a-zA-Z0-9._%+-]+@gmail\.com$/';


        if (empty($Ho_ten) || empty($email) ||empty($diachi) ||empty($dien_thoai) || empty($mat_khau) || empty($mat_khau2)) {  // check rỗng
            $MESSAGE_ERROR = "Các fied không được để trống";
        } elseif (!preg_match($phone_check, $dien_thoai)) { //check định dang số điện thoại
            $MESSAGE_ERROR = "Số điện thoại không đúng định dạng";
        } elseif (!preg_match($email_check, $email)) {   //check định dang email
            $MESSAGE_ERROR = "Email không đúng định dạng";
        } elseif (user_exist_phone($dien_thoai)) {  //check số điện thoại đã tồn tại
            $MESSAGE_ERROR = "Số điện thoại đã tồn tại";
        } elseif (strlen($mat_khau) < 6) {
            $MESSAGE_ERROR = "Mật khẩu phải > 6 Ký tự";
        } elseif (!user_exist_email($email) == 0) {
            $MESSAGE_ERROR = "Email đã tồn tại";
        } else {
            try {
                if ($mat_khau == $mat_khau2) { //check mật khẩu nhập lại
                    user_insert( $Ho_ten, $dia_chi,$dien_thoai,  $email,md5($mat_khau), $vai_tro, $kich_hoat,$hinh_anh);
                    unset( $Ho_ten,$dia_chi,$dien_thoai,$email,$mat_khau, $vai_tro, $kich_hoat,$hinh_anh);
                    $MESSAGE_SUCCESS = "Tạo tài khoảng thành công";

                } else {
                    $MESSAGE_ERROR = "Nhập lại mật khẩu không đúng";
                }
            } catch (Exception $exc) {
                $MESSAGE_ERROR = "Tạo tài khoản thất bại" . $exc;
            }
        }
    }
}
require_once './site/views/user/signup.php';
