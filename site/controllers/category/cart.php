<?php
$title = 'Giỏ sách - Projectz';
require_once './models/don_hang.php';
require_once './models/loai_hang.php';
require_once './models/hang_hoa.php';

// add cart
extract($_REQUEST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($btn_addCart)) {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        $i = 0;
        $flag = 0;
      

        //khi số lượng ban đầu không thay đổi thì thêm mới sản phẩm vào giỏng hàng
        if ($flag == 0) {
            $item_cart = [$Id_the_loai, $anh_san_pham, $Ten_sach, $so_luong, $Gia_bia];
            array_push($_SESSION['cart'], $item_cart);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']); // trả về URL cũ trước đó.
    }


    // Đơn đặt hàng
    if (isset($btn_buy)) {
        if (isset($_SESSION['user'])) {
            // Ngày đặt hàng.
            $ngay_dat_hang = date_format(date_create(), 'Y-m-d');
            while (true) {
                $ma_don_hang = "DH" . rand(10000, 99999);
                if (!phieu_muon_exit($id)) {
                    break;
                }
            }

            if (empty($dvvc)) {
                $MESSAGE_ERROR = "Vui lòng chọn đơn vị vận chuyển";
            } elseif (empty($_SESSION['cart'])) {
                $MESSAGE_ERROR = "Giỏ hàng không có sản phẩm";
            } else {
                if (isset($_SESSION['cart'])) {
                    $order_info = $_SESSION['cart'];
                    // thêm đơn hàng 
                    phieu_muon_insert($id,$id_nguoi_doc,$id_sach,$ngay_muon,$ngay_tra,$so_tien_muon,$so_ngay_gioi_han,$ghi_chu,$so_tien_phat,$tinh_trang);


                    //thêm chi tiết đơn hàng
                    // lấy data từ cart
                    foreach ($order_info as $order) {
                        $don_gia = $order[4];
                        $ma_san_pham_cart = $order[0];
                        $so_luong_cart = $order[3];
                        $don_gia_cart = filter_var($Gia_bia, FILTER_VALIDATE_INT);
                        $thanh_tien_cart = $don_gia_cart * $so_luong_cart;
                        hoa_don_insert($don_gia_cart, $so_luong_cart, $thanh_tien_cart, $ma_don_hang, $ma_san_pham_cart);

                        // xóa số lượng còn lại trong giỏ hàng
                        sach_remove_quantity($so_luong_cart, $ma_san_pham_cart);
                    }
                }
                unset($ngay_dat_hang_cart, $so_luong, $thanh_tien_cart, $trang_thai_cart, $ma_nguoi_dung, $dvvc);
                unset($don_gia_cart, $so_luong_cart, $tong_tien, $ma_don_hang, $ma_san_pham_cart);
                // $MESSAGE_ERROR = "Thành công";
                // sau khi thêm thành công thì xóa cart
                unset($_SESSION['cart'], $_SESSION['total2']);
                header("Location: $URL?mod=category&act=success-cart");
            }
        } else {
            $MESSAGE_ERROR = "Bạn chưa đăng nhập. Vui lòng đăng nhập 
            <a href='$URL?mod=user&act=login' style='color:blue;'>tại đây</a>";
        }
    }

}else{
    $site_view = "./site/views/category/cart.php";

}

// show đơn hàng
// $list_don_hang = don_hang_select_all();
if (isset($_SESSION['user'])) {
    $list_don_hang = don_hang_select_by_id_user($_SESSION['user']['id']);
}


$site_view = "./site/views/category/cart.php";
require_once './site/views/layout.php';
