<?php
$title = 'Sản phẩm - Tech Orange';
require_once './models/loai_hang.php';
require_once './models/hang_hoa.php';
require_once './models/tac_gia.php';
require_once './models/pdo.php';
extract($_REQUEST);
if (isset($_GET['ma_loai'])) {
    $ma_loai = $_GET['ma_loai'];
    $items = san_pham_select_by_ml($ma_loai);
}
if (isset($_GET['ma_tg'])) {
    $ma_tg = $_GET['ma_tg'];
    $items = san_pham_select_by_ten_tg($ma_tg);
}
if (isset($_GET['order']) && ($_GET['order'] == 'new')) {
    $items = san_pham_select_new();
}

$site_view = "./site/views/product/product-search.php";
require_once './site/views/layout.php';
