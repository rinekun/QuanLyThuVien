<?php 
    $title = "Chi tết sach";
    require_once './models/loai_hang.php';
    require_once './models/hang_hoa.php';

    extract($_REQUEST);
    if(san_pham_exist($Id_the_loai)) {
        $items = sach_select_by_id($Id_the_loai);
        extract($items);
        $_SESSION['image_product'] = array($hinh_anh);
    } 
    if(san_pham_exist($Id_ten_tg)) {
        $items = sach_select_by_id($Id_ten_tg);
        extract($items);
        $_SESSION['image_product'] = array($hinh_anh);
    } 
    $site_view = "./site/views/product/product-details.php";
    require_once './site/views/layout.php';
?>
else {
        header('location: ./404.php');
    }