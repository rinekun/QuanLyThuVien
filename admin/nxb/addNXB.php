<?php include '../index/head.php' ?>
<?php include '../index/nav.php' ?>
<?php
if (isset($_POST['add_nxb'])) {
    $tenNXB = mysqli_real_escape_string($conn, $_POST['tenNXB']);

    $select_NXB_name =  mysqli_query($conn, "SELECT*FROM `nxb`") or die('query failed');


        $insert_NXB = mysqli_query($conn, "INSERT INTO `nxb` (`Ten_NXB`) 
       VALUES ('$tenNXB')") or die('query failed');
       echo '<script>alert("Thêm ok rồi đó")</script>';
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
                                <h3 class="mb-0">Nhà xuất bản</h3>
                            </div>
                        </div>
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Tên nhà xuất bản</label>
                                <input type="text" class="form-control" id="inputGroupFile01" name="tenNXB">
                            </div>
                            <div class="mb-3">
                            <input type="submit" class="btn btn-info" id="inputGroupFile01" name="add_nxb" style="float:right" value="Thêm thể loại">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../index/footer.php' ?>