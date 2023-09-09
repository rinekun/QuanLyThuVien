<?php include '../index/head.php' ?>
<?php include '../index/nav.php';


//adding the products to database

if (isset($_POST['add_user'])) {

    $user_Ho_ten = mysqli_real_escape_string($conn, $_POST['Ho_ten']);
    $user_Gioi_tinh = mysqli_real_escape_string($conn, $_POST['role']);
    $user_Ngay_sinh = mysqli_real_escape_string($conn, $_POST['ngay_sinh']);
    $user_dia_chi = mysqli_real_escape_string($conn, $_POST['dia_chi']);
    $user_dien_thoai = mysqli_real_escape_string($conn, $_POST['dien_thoai']);
    $user_email = mysqli_real_escape_string($conn, $_POST['Email']);
    $user_so_thich = mysqli_real_escape_string($conn, $_POST['so_thich']);
    $user_user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_password = mysqli_real_escape_string($conn, $_POST['password']);

    $select_user_email =  mysqli_query($conn, "SELECT email FROM `nguoi_doc` WHERE email='$user_email'") or die('query failed');
    $select_user_ten =  mysqli_query($conn, "SELECT user_name FROM `nguoi_doc` WHERE user_name='$user_user_name'") or die('query failed');

    if (mysqli_num_rows($select_user_email) > 0 || mysqli_num_rows($select_user_ten) > 0) {
        echo '<script>alert("Trùng rồi đó ")</script>';
    } else {
        mysqli_query($conn, "INSERT INTO `nguoi_doc`(`Ho_ten`,`Gioi_tinh`,`Ngay_sinh`,`dia_chi`,`dien_thoai`,`email`,`so_thich`,`user_name`,`password`) 
      VALUES ('$user_Ho_ten','$user_Gioi_tinh','$user_Ngay_sinh','$user_dia_chi','$user_dien_thoai','$user_email',''$user_so_thich'','$user_user_name','$user_password')") or die('query failed');
      echo '<script>alert("Thêm oki rồi  ")</script>';
    }
}

?>

<section class="main_content dashboard_part">
    <?php
    include '../index/userAdmin.php';

    ?>




    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">

                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">ADD USER</h3>
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Họ Và Tên</label>
                                    <input type="text" name="Ho_ten" class="form-control" id="exampleFormControlInput1">
                                </div>

                                 <div class="mb-3 col-lg-4 ">
                                    <label class="form-label" for="exampleFormControlInput1">Giới tính</label><br>
                                    <input type="radio" name="role" value="nam" class=""><span>Nam</span><br>
                                    <input type="radio" name="role" value="nữ" class="" checked> <span>Nữ</span>
                                </div>

                                 <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Ngày sinh</label>
                                    <input type="date" name="ngay_sinh" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Địa chỉ</label>
                                    <input type="text" name="dia_chi" class="form-control" id="exampleFormControlInput1">
                                </div>
                                
                                 <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Điện thoại</label>
                                    <input type="text" name="dien_thoai" class="form-control" id="exampleFormControlInput1">
                                </div>
                                 
                                 <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Email</label>
                                    <input type="email" name="Email" class="form-control" id="exampleFormControlInput1">
                                </div>

                                 <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Sở thích</label>
                                    <input type="text" name="so_thich" class="form-control" id="exampleFormControlInput1">
                                </div>

                                 <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">User_name</label>
                                    <input type="text" name="user_name" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Mật Khẩu</label>
                                    <input type="text" name="password" id="image" class="form-control" id="inputGroupFile01">
                                </div>

                               


                            </div>
                            <div class="mb-3">
                                <input type="submit" name="add_user" class="btn btn-info" id="inputGroupFile01" style="float:right" value="CẬP NHẬT">
                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </div>

        <?php include '../index/footer.php' ?>