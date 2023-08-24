<?php
require_once 'pdo.php';

//Thêm loại mới
function the_loai_insert($the_loai)
{
    $sql = "INSERT INTO the_loai(the_loai) VALUES(?)";
    pdo_execute($sql, $the_loai);
}

//Cập nhật tên loại
function the_loai_update($the_loai)
{
    $sql = "UPDATE the_loai SET the_loai = ? WHERE id = ?";
    pdo_execute($sql, $the_loai, $id);
}

// Xóa một hoặc nhiều loại
function the_loai_delete($id)
{
    $sql = "DELETE FROM the_loai WHERE id = ?";
    if (is_array($id)) {
        foreach ($id as $ma) pdo_execute($sql, $ma);
    } else pdo_execute($sql, $id);
}

// Truy vấn tất cả các loại
function the_loai_select_all()
{
    $sql = "SELECT * FROM the_loai";
    return pdo_query($sql);
}

//Truy vấn một loại theo mã
function loai_select_by_id($id)
{
    $sql = "SELECT * FROM the_loai WHERE id = ?";
    return pdo_query_one($sql, $id);
}

//Kiểm tra sự tồn tại của một loại
function loai_exist($id)
{
    $sql = "SELECT count(*) FROM the_loai WHERE id = ?";
    return pdo_query_value($sql, $id) > 0;
}

// Đếm số lượng sp thuộc mỗi loại
function count_product()
{
    $sql = "SELECT tl.*,count(ma_sach) AS so_luong_sp FROM the_loai tl, sach sp WHERE tl.id = sp.Id_the_loai GROUP BY tl.id ORDER BY count(ma_sach) DESC LIMIT 4";
    return pdo_query($sql);
}
