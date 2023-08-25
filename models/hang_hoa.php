<?php
require_once 'pdo.php';

// INSERT sách mới
function sach_add($id, $Ten_sach, $Gia_bia, $Id_ten_tg, $Id_nxb, $Nam_xb, $Nam_tb, $Tinh_trang, $ma_sach, $Id_the_loai, $Id_ngon_ngu, $hinh_anh,$Mo_ta,$luot_muon,$so_luong)
{
    $sql = "INSERT INTO sach (id, Ten_sach, Gia_bia, Id_ten_tg, Id_nxb, Nam_xb, Nam_tb, Tinh_trang, ma_sach, Id_the_loai, Id_ngon_ngu, hinh_anh,Mo_ta,luot_muon,so_luong) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $id, $Ten_sach, $Gia_bia, $Id_ten_tg, $Id_nxb, $Nam_xb, $Nam_tb, $Tinh_trang, $ma_sach, $Id_the_loai, $Id_ngon_ngu, $hinh_anh,$Mo_ta,$luot_muon,$so_luong);
}

// INSERT anh_chi_tiet
function anh_chi_tiet_add($Nam_tb, $id)
{
    $sql = "INSERT INTO anh_chi_tiet (Nam_tb, id) VALUES (?,?)";
    pdo_execute($sql, $Nam_tb, $id);
}

// UPDATE sách
function sach_update($Ten_sach, $Gia_bia, $Id_ten_tg, $Id_nxb, $Nam_xb, $Nam_tb, $Tinh_trang, $ma_sach, $Id_the_loai, $Id_ngon_ngu, $hinh_anh,$Mo_ta, $luot_xem,$so_luong,$id)
{
    $sql = "UPDATE sach SET Ten_sach =?, Gia_bia =?, Id_ten_tg =?, Id_nxb =?, Nam_xb =?, Nam_tb =?, Tinh_trang =?, ma_sach =?, Id_the_loai =?, Id_ngon_ngu =?, hinh_anh=?,Mo_ta =?, luot_xem = ?,so_luong=?, where id = ?";
    pdo_execute($sql, $Ten_sach, $Gia_bia, $Id_ten_tg, $Id_nxb, $Nam_xb, $Nam_tb, $Tinh_trang, $ma_sach, $Id_the_loai, $Id_ngon_ngu, $hinh_anh,$Mo_ta,$luot_xem,$so_luong, $id);
}

// DELETE một hoặc nhiều sách
function sach_delete($id)
{
    $sql = "DELETE FROM sach WHERE id =?";
    if (is_array($id)) {
        foreach ($id as $ma) pdo_execute($sql, $ma);
    } else pdo_execute($sql, $id);
}

// Truy vấn tất cả các sách
function sach_select_all()
{
    $sql = "SELECT * FROM sach";
    return pdo_query($sql);
}

// Truy vấn 4 cuỗn sách được mượn nhiều nhất
function sach_top_4()
{
    $sql = "SELECT * FROM sach ORDER BY luot_muon DESC LIMIT 4";
    return pdo_query($sql);
}
// Truy vấn  sách được theo chính trị
function sach_chinh_tri()
{
    $sql = "SELECT * FROM sach WHERE Id_the_loai =5";
    return pdo_query($sql);
}
// Truy vấn  sách được theo chính trị
function sach_tin_tuc()
{
    $sql = "SELECT * FROM sach WHERE Id_the_loai =6";
    return pdo_query($sql);
}
// Truy vấn sach mới nhất
function san_pham_select_new()
{
    $sql = "SELECT * FROM sach ORDER BY Nam_xb DESC";
    return pdo_query($sql);
}

// Truy vấn một sản phẩm theo mã sản phẩm
function sach_select_by_id($Id_the_loai)
{
    $sql = "SELECT * FROM sach WHERE Id_the_loai=?";
    return pdo_query_one($sql, $Id_the_loai);
}

// Truy vấn danh sách sách theo mã loại
function sach_select_by_ma_loai($ma_loai)
{
    $sql = "SELECT * FROM sach WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}

// Kiểm tra sự tồn tại của một sách
function san_pham_exist($Id_the_loai)
{
    $sql = "SELECT count(*) FROM sach WHERE Id_the_loai =?";
    return pdo_query_value($sql, $Id_the_loai) > 0;
}


// Show san pham sach theo mã loại
function san_pham_select_by_ml($Id_the_loai)
{
    $sql = "SELECT * FROM the_loai tl JOIN sach sp ON tl.id = sp.Id_the_loai WHERE sp.Id_the_loai = ?";
    return pdo_query($sql, $Id_the_loai);
}
// Show san pham sach theo tên tác giả
function san_pham_select_by_ten_tg($Id_ten_tg)
{
    $sql = "SELECT * FROM tac_gia tg JOIN sach sp ON tg.id = sp.Id_ten_tg WHERE sp.Id_ten_tg = ?";
    return pdo_query($sql, $Id_ten_tg);
}

// Truy vấn sách sách theo từ khóa
function hang_hoa_select_keyword($keywords)
{
    $sql = "SELECT * FROM sach WHERE Ten_sach like ?";
    return pdo_query($sql, '%' . $keywords . '%');
}

function hang_hoa_tang_so_luot_xem($id)
{
    $sql = "UPDATE sach SET luot_xem = luot_xem + 1 WHERE id = ?";
    return pdo_execute($sql, $id);
}


// Show ảnh chi tiết (Gallery)
function sach_anh_chi_tiet($Id_the_loai)
{
    $sql = "SELECT Nam_tb FROM anh_chi_tiet WHERE Id_the_loai=?";
    return pdo_query($sql, $Id_the_loai);
}

// Truy vấn sách bán chạy
function hang_hoa_ban_chay()
{
    $sql = "SELECT sp.* FROM chi_tiet_hoa_don ct, sach sp WHERE ct.id = sp.id GROUP BY id ORDER BY sum(ct.Id_nxb) DESC LIMIT 3";
    return pdo_query($sql);
}

// Truy vấn sách sắp hết
function sach_sap_het_hang()
{
    $sql = "SELECT * FROM sach WHERE Id_nxb < 10 ORDER BY Id_nxb ASC";
    return pdo_query($sql);
}

// trừ 1 sản phẩm khi mua hàng thành công
function sach_remove_quantity($Id_nxb,$id) {
    $sql = "UPDATE sach SET Id_nxb = Id_nxb - ? WHERE id =?";
    pdo_execute($sql, $Id_nxb, $id);
}

function sach_select_images_by_id($Id_the_loai) {
    $sql = "SELECT Nam_tb, Ten_sach FROM sach WHERE Id_the_loai = ?";
    return pdo_query_one($sql,$Id_the_loai);
}

