
<?php include '../index/head.php' ?>
<?php include '../index/nav.php';


//adding the products to database
if (isset($_POST['add_product'])) {
    $sach_name = mysqli_real_escape_string($conn, $_POST['tenSach']);
    $sach_price = mysqli_real_escape_string($conn, $_POST['price']);
    $sach_namXB = mysqli_real_escape_string($conn, $_POST['namXB']);
    $sach_namTB = mysqli_real_escape_string($conn, $_POST['namTB']);
    $sach_soLuong = mysqli_real_escape_string($conn, $_POST['soLuong']);
    $sach_moTa = mysqli_real_escape_string($conn, $_POST['moTa']);
    $sach_tinhTrang = mysqli_real_escape_string($conn, $_POST['tinhTrang']);
    $sach_theLoai = mysqli_real_escape_string($conn, $_POST['theLoai']);
    $sach_ngonNgu= mysqli_real_escape_string($conn, $_POST['ngonNgu']);
    $sach_tacGia = mysqli_real_escape_string($conn, $_POST['tacGia']);
    $sach_nxb = mysqli_real_escape_string($conn, $_POST['nxb']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../../hinh/' . $image;

        $insert_sach = mysqli_query($conn, "INSERT INTO `sach`(`Ten_sach`,`Gia_bia`,`Id_ten_tg`,`Id_nxb`,`Nam_xb`,`Nam_tb`,`So_luong`,`Id_the_loai`,`Id_ngon_ngu`,`Hinh_anh`,`Mo_ta`,`Tinh_trang`) 
       VALUES ('$sach_name','$sach_price','$sach_tacGia','$sach_nxb','$sach_namXB','$sach_namTB','$sach_soLuong','$sach_theLoai'
                  ,'$sach_ngonNgu','$image','$sach_moTa','$sach_tinhTrang')") or die('query failed');

        if ($insert_sach) {
            if ($image_size > 2000000) {
                 echo '<script>alert("Kích thước hình ảnh quá lớn")</script>';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                echo '<script>alert("Thêm mới thành công ")</script>';
            }
        }
    }

?>

<section class="main_content dashboard_part">
    <?php
    include '../index/userAdmin.php';

  ?>

    <?php

    $select_the_loai=mysqli_query($conn,"SELECT*FROM `the_loai`");
    $select_tac_gia=mysqli_query($conn,"SELECT*FROM `tac_gia`");
    $select_nxb=mysqli_query($conn,"SELECT*FROM `nxb`");
    $select_ngon_ngu=mysqli_query($conn,"SELECT*FROM `ngon_ngu`");
    ?>

    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Loại Sản Phẩm</h3>
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Tên Sách</label>
                                    <input type="text" name="tenSach" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Giá bìa</label>
                                    <input type="text" name="price" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Năm xuất bản</label>
                                    <input type="date" name="namXB" class="form-control" id="exampleFormControlInput1">
                                </div> 

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Năm tái bản</label>
                                    <input type="date"  name="namTB" class="form-control" id="exampleFormControlInput1">
                                </div> 

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Số lượng</label>
                                    <input type="number"  name="soLuong" class="form-control" id="exampleFormControlInput1">
                                </div> 

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Hình Ảnh</label>
                                    <input type="file" name="image" id="image" class="form-control" id="inputGroupFile01">
                                </div>
                                
                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Mô tả</label>
                                    <input type="text" name="moTa" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="mb-3 col-lg-4">
                                    <label class="form-label" for="exampleFormControlInput1">Tình trạng</label>
                                    <input type="text" name="tinhTrang" class="form-control" id="exampleFormControlInput1">
                                </div> 
                                
                                <div class="mb-3 col-lg-4 ">
                                    <label class="form-label" for="exampleFormControlInput1">Thể loại</label>
                                    <select class="form-select form-control-sm" name="theLoai">
                                        <?php                 
                                        foreach($select_the_loai as $sach)
                                        {
                                            echo"<option value='{$sach['id']}'>{$sach['the_loai']}</option>";
                                        }
                                        ?> 
                                    </select>
                                </div>

                                <div class="mb-3 col-lg-4 ">
                                    <label class="form-label" for="exampleFormControlInput1">Nhà xuất bản</label>
                                    <select class="form-select form-control-sm" name="nxb">
                                        <?php                 
                                        foreach($select_nxb as $sach)
                                        {
                                            echo"<option value='{$sach['Id_nxb']}'>{$sach['Ten_NXB']}</option>";
                                        }
                                        ?> 
                                    </select>
                                </div>

                                <div class="mb-3 col-lg-4 ">
                                    <label class="form-label" for="exampleFormControlInput1">Ngôn ngữ</label>
                                    <select class="form-select form-control-sm" name="ngonNgu">
                                        <?php                 
                                        foreach($select_ngon_ngu as $sach)
                                        {
                                            echo"<option value='{$sach['id']}'>{$sach['ngon_ngu']}</option>";
                                        }
                                        ?> 
                                    </select>
                                </div>

                                <div class="mb-3 col-lg-4 ">
                                    <label class="form-label" for="exampleFormControlInput1">Tác giả</label>
                                    <select class="form-select form-control-sm" name="tacGia">
                                        <?php                 
                                        foreach($select_tac_gia as $sach)
                                        {
                                            echo"<option value='{$sach['id']}'>{$sach['Ten_tg']}</option>";
                                        }
                                        ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="add_product" class="btn btn-info" id="inputGroupFile01" style="float:right" value="CẬP NHẬT">
                            </div>
                        </form>
                    </div>
                </div>


            </div>

        </div>

        <?php include '../index/footer.php' ?>