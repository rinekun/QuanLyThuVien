<?php
ob_start();
// Gộp tệp head.php
include '../index/head.php';

// Gộp tệp nav.php
include '../index/nav.php'; ?>


<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo
        '
              <div class="message">
               <span>
                 ' . $message . '
               </span>
               <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
              </div>
            ';
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `order` WHERE id='$delete_id'") or die('query failed');
    $message[] = 'order removed successfully';
    ob_end_clean();
    header('location:listOrder.php');
}
if (isset($_POST['update_order'])) {
    $order_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];

    mysqli_query($conn, "UPDATE `order` SET payment_status='$update_payment' WHERE id='$order_id' ") or die('query failed');
}
?>

<style>
    .input_list_order {
        margin: 0px 1vh;
    }
</style>
<section class="main_content dashboard_part">
    <?php
    include '../index/userAdmin.php';

    ?>

    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-xl- ">
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
                                        <th scope="col">KHÁCH HÀNG</th>
                                        <th scope="col">SỐ ĐIỆN THOẠI</th>
                                        <th scope="col">EMAIL</th>
                                        <!-- <th scope="col">TỔNG TIỀN</th> -->
                                        <th scope="col">THANH TOÁN</th>
                                        <th scope="col">ĐỊA CHỈ</th>
                                        <th scope="col">Trạng thái</th>


                                    </tr>
                                </thead>
                                <?php
                                $stt = 1;

                                $list_order = isset($_GET['list']) ? $_GET['list'] : '';


                                if ($list_order) {

                                    $select_orders = mysqli_query($conn, "SELECT * FROM `order` WHERE `payment_status` LIKE '%" . $list_order . "%'");
                                } else {
                                    $select_orders = mysqli_query($conn, "SELECT * FROM `order` ");
                                }


                                // $select_orders = null;
                                // $select_order_pay = mysqli_query($conn, "SELECT * FROM `order_pay`") or die('query failed');

                                // while ($select_order_pays = mysqli_fetch_assoc($select_order_pay)) {
                                //     $order_id = $select_order_pays['id_order'];

                                //     $select_orders = mysqli_query($conn, "SELECT * FROM `order` WHERE `id` = $order_id");
                                // }
                                if (mysqli_num_rows($select_orders) > 0) {
                                    while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {

                                ?>

                                        <tbody>
                                            <tr>
                                                <td class="td" style="text-align: center;"><?= $stt++ ?></td>
                                                <td class="td"><?php echo $fetch_orders['name'] ?></td>
                                                <td class="td"><?php echo $fetch_orders['number']; ?></td>
                                                <td class="td"><?php echo $fetch_orders['email']; ?></td>
                                                <!-- <td class="td"><?php echo $fetch_orders['total_price']; ?></td> -->
                                                <td class="td"><?php echo $fetch_orders['method']; ?></td>
                                                <td class="td"><?php echo $fetch_orders['address']; ?></td>
                                                <td>
                                                    <?php
                                                    $pending = 'Chưa Giải Quyết';
                                                    if ($fetch_orders['payment_status'] === 'complete') {
                                                        $complete = 'Vận chuyển';
                                                    ?>
                                                        <strong> <?php echo  $complete ?></strong>
                                                    <?php } else if ($fetch_orders['payment_status'] === 'receive') {
                                                        $complete = 'Đã Nhận Hàng';
                                                    ?>
                                                        <strong> <?php echo '<p style="color:blue;">' . $complete . '</p>' ?></strong>
                                                    <?php } else if ($fetch_orders['payment_status'] === 'cancelorder') {
                                                        $complete = 'Đơn Bị Hủy';
                                                    ?>
                                                        <strong> <?php echo '<p style="color:red;">' . $complete . '</p>' ?></strong>
                                                    <?php } else { ?>
                                                        <strong> <?php echo   $pending ?></strong>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    <a href="listOrder.php?delete=<?php echo $fetch_orders['id']; ?>" class="status_btn" style="background-color: red;">Xóa</a>
                                                    <a href="detail.php?delail=<?php echo $fetch_orders['id'] ?>" class="status_btn" style="background-color: blue;">Chi Tiết</a>
                                                </td>
                                            </tr>
                                        </tbody>

                                <?php
                                    }
                                }
                                ?>

                            </table>

                        </div>

                        <form action="" method="get">

                            <div class="mb-12">

                            
                                <div class="mb-3 ">
                                    <input type="submit" name="list" class="btn btn-info input_list_order" id="inputGroupFile01" style="float:right; background-color: red;" value="cancelorder">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="list" class="btn btn-info input_list_order" id="inputGroupFile01" style="float:right" value="complete">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="list" class="btn btn-info input_list_order" id="inputGroupFile01" style="float:right" value="receive">
                                </div>
                                <div class="mb-3">
                                   <a href="./listOrder.php"><input type="submit" name="" class="btn btn-info input_list_order" id="inputGroupFile01" style="float:right" value="Tất cả"></a> 
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
        <?php include '../index/footer.php' ?>