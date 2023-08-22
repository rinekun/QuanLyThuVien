<?php
include_once './config/config.php';
session_start();

if (isset($_POST['submit-btn'])) {
    $filter_username = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
    $user_name = mysqli_real_escape_string($conn, $filter_username);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $select_user = mysqli_query($conn, "SELECT*FROM `nguoi_doc` WHERE user_name = '$user_name'") or die('query failed');

    if (mysqli_num_rows($select_user) > 0) {
        $row = mysqli_fetch_assoc($select_user);
        if ($row['password'] == $password) {
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            header('location:./user/user.php');
        } 
        else 
        {
            echo "<script>alert('Sai mật khẩu')</script>";
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
    <img src="./hinh/hinh1.jpg.png" alt="" class="banner2">
    <div class="container2">
     <form action="" class="dang-nhap" method="post">
     <h1>Đăng nhập ngay User</h1>
     <div class="input-dn">
        <label>Tên đăng nhập </label><br>
        <input type="text" name="user_name" placeholder="Nhập tên đăng nhập" require>
    </div>
    <div class="input-dn">
        <label>Mật khẩu</label><br>
        <input type="password" name="password" placeholder="nhập mật khẩu " require>
    </div>
    <div class="oke">
    <input type="submit" name="submit-btn" value="Đăng Nhập" class="oke1">
    </div>
    <h2>----------- Đăng nhập bằng -----------</h2>
       <a href="dang-nhap.php" class="dnadmins">Đăng nhập bằng admin</a>
   <p>Don’t have an account yet?<br><a href="dang-ki.php">Tạo tài khoản mới !</a></p>
   </form>
    </div>
</body>
</html>