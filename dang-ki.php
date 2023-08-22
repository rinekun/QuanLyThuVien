<?php
include_once "./config/config.php";
if (isset($_POST['submit-btn'])) {
    $filter_Hoten = filter_var($_POST['Ho_ten'], FILTER_SANITIZE_STRING);
    $Ho_ten = mysqli_real_escape_string($conn, $filter_Hoten);

    $filter_Username = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
    $user_name = mysqli_real_escape_string($conn, $filter_Username);

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_diachi = filter_var($_POST['dia_chi'], FILTER_SANITIZE_STRING);
    $dia_chi = mysqli_real_escape_string($conn, $filter_diachi);

    $filter_dienthoai = filter_var($_POST['dien_thoai'], FILTER_SANITIZE_STRING);
    $dien_thoai = mysqli_real_escape_string($conn, $filter_dienthoai);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
    $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);


    $select_user = mysqli_query($conn, "SELECT*FROM `nguoi_doc` WHERE `user_name` = '$user_name'") 
    or die('query failed');

    if (mysqli_num_rows($select_user) > 0) {
       echo "<script>alert('Tên này đã có người sử dụng')</script>";
    } else {
        if ($user_name == '' || $email == '' | $password == '' || $cpassword == '') {
            echo "<script>alert('Information cannot be left blank')</script>";
        } else if ($password != $cpassword) {
            echo "<script>alert('Mật khẩu và xác nhận mật khẩu không trùng nhau')</script>";
        } else {
           mysqli_query($conn,"INSERT INTO `nguoi_doc` (`Ho_ten`,`user_name`,`password`,`dia_chi`,`email`,`dien_thoai`) VALUES('$Ho_ten', '$user_name', '$password','$dia_chi','$email','$dien_thoai')")
           or die('Failed to insert');
            echo "<script>alert('Đăng kí thành công')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <img src="./hinh/banner.jpg.png" alt="" class="banner">
    <img src="./hinh/hinh2.jpg" alt="" class="banner1">
    <div class="container">
<form  class="dang-nhap" method="post" enctype="">
    <h1>Tạo Tài khoản mới</h1>
    <div class="input-dn">
        <label>Tên</label><br>
        <input type="text" name="Ho_ten" placeholder="Họ và tên" require>
    </div>
     <div class="input-dn">
        <label>Tên đăng nhập</label><br>
        <input type="text" name="user_name" placeholder=" Tên đăng nhập" require>
    </div>
    <div class="input-dn">
        <label>Địa chỉ</label><br>
        <input type="text" name="dia_chi" placeholder="Nhập địa chỉ" require>
    </div>
    <div class="input-dn">
        <label>Địa chỉ email</label><br>
        <input type="email" name="email" placeholder="user@gmail.com" require>
    </div>
    <div class="input-dn">
        <label>Số điện thoại</label><br>
        <input type="number" name="dien_thoai" placeholder="nhập số điện thoại" require>
    </div>
    <div class="input-dn">
        <label>Mật khẩu</label><br>
        <input type="password" name="password" placeholder="nhập mật khẩu " require>
    </div>
    <div class="input-dn">
        <label>Xác nhận mật khẩu</label><br>
        <input type="password" name="cpassword" placeholder="Nhập lại mật khẩu " require>
    </div>
    <div class="oke2">
    <input type="submit" name="submit-btn" value="Tạo tài khoản" class="oke3">
    </div>  
   <p class="dangki">Bạn đã có tài khoản<br><a href="dang-nhap_user.php">Đăng nhập</a></p>
</form>
    </div>
</body>
</html>