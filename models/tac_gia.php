<?php
require_once 'pdo.php';
//Thêm tác giả mới

function tac_gia_insert($tac_gia)
{
    $sql = "INSERT INTO tac_gia(tac_gia) VALUES($tac_gia)";
    pdo_execute($sql, $tac_gia);
}

//Cập nhật tên tên tác giả
function tac_gia_update($tac_gia)
{
    $sql = "UPDATE tac_gia SET tac_gia = ? WHERE id = ?";
    pdo_execute($sql, $tac_gia, $id);
}

// Xóa một hoặc nhiều tác giả
function tac_gia_delete($id)
{
    $sql = "DELETE FROM tac_gia WHERE id = ?";
    if (is_array($id)) {
        foreach ($id as $ma) pdo_execute($sql, $ma);
    } else pdo_execute($sql, $id);
}

// Truy vấn tất cả theo tên tác giả
function tac_gia_select_all()
{
    $sql = "SELECT * FROM tac_gia";
    return pdo_query($sql);
}
//Truy vấn một loại theo mã
function tac_gia_select_by_id($id)
{
    $sql = "SELECT * FROM tac_gia WHERE id = ?";
    return pdo_query_one($sql, $id);
}

//Kiểm tra sự tồn tại của một loại
function tac_gia_exist($id)
{
    $sql = "SELECT count(*) FROM tac_gia WHERE id = ?";
    return pdo_query_value($sql, $id) > 0;
}
?>