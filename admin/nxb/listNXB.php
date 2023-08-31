<?php include '../index/head.php' ?>
<?php include '../index/nav.php' ?>
<section class="main_content dashboard_part">
    <?php
    include '../index/userAdmin.php';
    ob_start();
    ?>

<?php 
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `nxb` WHERE Id_nxb='$delete_id'") or die('query failed');
    header('location: listNXB.php');
}
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
                                    <a href="addNXB.php" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên tác giả</th>

                                    </tr>
                                </thead>
                                 <?php
                                $select_NXB = mysqli_query($conn, "SELECT*FROM `nxb`") or die('query failed');
                        
                                if (mysqli_num_rows($select_NXB) > 0) {
                                    while ($fetch_NXB = mysqli_fetch_assoc($select_NXB)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fetch_NXB['Id_nxb']  ?></td>
                                        <td><?php echo $fetch_NXB['Ten_NXB'] ?></td>
                                        <td>
                                            <a href="listNXB.php?delete=<?php echo $fetch_NXB['Id_nxb']; ?>" class="status_btn" style="background-color: red;">Xóa</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../index/footer.php' ?>