<?php

ob_start();
// Gộp tệp head.php
include '../index/head.php';

// Gộp tệp nav.php
include '../index/nav.php';
//delete product
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `nguoi_doc` WHERE id='$delete_id'") or die('query failed');
    echo '<script>alert("Xóa xong rồi ")</script>';
    header('location:listLogin.php');
}

?>
<section class="main_content dashboard_part">
    <?php
    include '../index/userAdmin.php';

    ?>


    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Table</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form active="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here...">
                                            </div>
                                            <button type="submit"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ms-2">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="list-tables QA_table">
                            <table class="tables table">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Điện thoại</th> 
                                        <th scope="col">Email</th>
                                        <th scope="col">User_name</th>
                                        <th scope="col">Password</th>
                                        

                                    </tr>
                                </thead>


                                <?php
                                $select_users = mysqli_query($conn, "SELECT*FROM `nguoi_doc`") or die('query failed');
                                $stt = 1;
                                if (mysqli_num_rows($select_users) > 0) {
                                    while ($fetch_users = mysqli_fetch_assoc($select_users)) {
                                ?>


                                        <tbody>
                                            <tr>
                                                <td class="td"><?= $stt++ ?></td>
                                                <td class="td"><?php echo $fetch_users['Ho_ten'] ?></td>
                                                <td class="td"><?php echo $fetch_users['dia_chi'] ?></td>
                                                <td class="td"><?php echo $fetch_users['dien_thoai'] ?></td>
                                                <td class="td"><?php echo $fetch_users['email'] ?></td>
                                                <td class="td"><?php echo $fetch_users['user_name'] ?></td>
                                                <td class="td"><?php echo $fetch_users['password'] ?></td>
                                                <td>
                                                    <a href="updetaLogin.php?edit=<?php echo $fetch_users['id']; ?>" class="status_btn">Edit</a>
                                                    <a href="listLogin.php?delete=<?php echo $fetch_users['id']; ?>" class="status_btn" style="background-color: red;">Delete</a>
                                                    <!-- <a href="./addLogin.php" class="status_btn" style="background-color: blue;">Add</a> -->

                                                </td>
                                            </tr>
                                        </tbody>

                                <?php
                                    }
                                } else {
                                    echo '<div class="empty">
                                    <p> no product added yet!</p>
                                     </div>';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../index/footer.php' ?>