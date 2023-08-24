<?php 
    $title = "Chi tết sach";
    require_once './models/loai_hang.php';
    require_once './models/hang_hoa.php';
    require_once './models/binh_luan.php';

    extract($_REQUEST);
    // if(isset($_POST['text_comment']) && $_POST['text_comment'] != '') {
    //     $ngay_binh_luan = date('Y-m-d H:i:s');
    //     $noi_dung = $_POST['text_comment'];
    //     $ma_nguoi_dung = $_SESSION['user']['ma_nguoi_dung'];
    //     $ma_san_pham = $_GET['Id_the_loai'];
    //     try {
    //         binh_luan_insert($ngay_binh_luan, $noi_dung, $ma_nguoi_dung, $ma_san_pham);
    //         unset($_POST['text_comment']);
    //     } catch (PDOException $e) {
    //         echo "Không thể thêm bình luận này vì: " . $e->getMessage();
    //     }
    // }

    if(san_pham_exist($Id_the_loai)) {
        $items = sach_select_by_id($Id_the_loai);
        extract($items);
        $_SESSION['image_product'] = array($hinh_anh);
        // hang_hoa_tang_so_luot_xem($id);
        // $pictures = sach_anh_chi_tiet($id);
        // foreach ($pictures as $picture) {
        //     array_push($_SESSION['image_product'],$picture['hinh_anh']);
        // }
        // $binh_luan_list = binh_luan_select_by_ma_sp($id);
    } 
    $site_view = "./site/views/product/product-details.php";
    require_once './site/views/layout.php';
?>
<!-- else {
        header('location: ./404.php');
    } -->