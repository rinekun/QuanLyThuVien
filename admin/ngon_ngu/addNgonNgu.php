<?php include '../index/head.php' ?>
<?php include '../index/nav.php' ?>
<?php
if (isset($_POST['add_NN'])) {
    $tenNN = mysqli_real_escape_string($conn, $_POST['tenNN']);

    $select_NN_name =  mysqli_query($conn, "SELECT*FROM `ngon_ngu`") or die('query failed');


        $insert_NN = mysqli_query($conn, "INSERT INTO `ngon_ngu` (`ngon_ngu`) 
       VALUES ('$tenNN')") or die('query failed');
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
                                <h3 class="mb-0">Ngôn ngữ sách</h3>
                            </div>
                        </div>
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">Ngôn ngữ</label>
                                <input type="text" class="form-control" id="inputGroupFile01" name="tenNN">
                            </div>
                            <div class="mb-3">
                            <input type="submit" class="btn btn-info" id="inputGroupFile01" name="add_NN" style="float:right" value="Thêm thể loại">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../index/footer.php' ?>