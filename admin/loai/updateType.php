<?php
ob_start();
// Gộp tệp head.php
include '../index/head.php';

// Gộp tệp nav.php
include '../index/nav.php';

if (isset($_POST['update_TL'])) {
    $update_name = $_POST['update_name'];
    $update_query = mysqli_query($conn, "UPDATE `the_loai` SET `the_loai`='$update_name' ")
        or die('query failed');
    if ($update_query) {
        ob_end_clean(); // Xóa bỏ nội dung đã lưu trong bộ đệm
        header('location:listType.php');
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
                                <h3 class="mb-0">Cập nhật thể loại</h3>
                            </div>
                        </div>

                        <?php
                        if (isset($_GET['edit'])) {
                            $edit_query = mysqli_query($conn, "SELECT*FROM `the_loai` ") or die('query failed');
                            if (mysqli_num_rows($edit_query) > 0) {
                                while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
                        ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row justify-content-center">
                                            <div class="mb-3 col-lg-4">
                                                <label class="form-label" for="exampleFormControlInput1">Tên Thể Loại</label>
                                                <input type="text" name="update_name" class="form-control" id="exampleFormControlInput1" value="<?php echo $fetch_edit['the_loai']; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="update_TL" class="btn btn-info" id="inputGroupFile01" style="float:right" value="CẬP NHẬT">
                                        </div>
                                    </form>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>


            </div>

        </div>

        <?php include '../index/footer.php' ?>