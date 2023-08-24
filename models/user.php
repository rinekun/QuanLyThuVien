<?php
require_once 'pdo.php';

// Thêm người dùng mới
function user_insert($Ho_ten, $dia_chi, $dien_thoai, $email,$mat_khau,$vai_tro,$kich_hoat,$hinh_anh)
{
  $sql = "INSERT INTO nguoi_doc (Ho_ten,dia_chi,dien_thoai,email,mat_khau,vai_tro,kich_hoat,hinh_anh) VALUES (?,?,?,?,?,?,?,?)";
  pdo_execute($sql, $Ho_ten,  $dia_chi, $dien_thoai, $email, $mat_khau,$vai_tro==1,$kich_hoat==1,$hinh_anh);
}

//Cập nhật thông tin 1 người dùng
function user_update($id,$Ho_ten,  $dia_chi, $dien_thoai, $email,$mat_khau,$vai_tro,$kich_hoat,$hinh_anh)
{
  $sql = "UPDATE nguoi_doc SET dien_thoai = ?, mat_khau = ?, Ho_ten = ?, email = ?, dia_chi = ?, vai_tro = ?, kich_hoat = ?,hinh_anh =? WHERE id = ?";
  pdo_execute($sql, $Ho_ten,  $dia_chi, $dien_thoai, $email,$mat_khau,$vai_tro==1,$kich_hoat==1,$hinh_anh, $id);
}

// Xóa một hoặc nhiều NGƯỜI DÙNG
function user_delete($id)
{
  $sql = "DELETE FROM nguoi_doc  WHERE id=?";
  if (is_array($id)) {
    foreach ($id as $ma) {
      pdo_execute($sql, $ma);
    }
  } else {
    pdo_execute($sql, $id);
  }
}

// Truy vấn tất cả các người dùng
function user_select_all()
{
  $sql = "SELECT * FROM nguoi_doc";
  return pdo_query($sql);
}

//Truy vấn một nguòi dùng theo id
function user_select_by_id($id)
{
  $sql = "SELECT * FROM nguoi_doc WHERE id=?";
  return pdo_query_one($sql, $id);
}

//Truy vấn một nguòi dùng theo dien_thoai
function user_select_by_phone($dien_thoai)
{
  $sql = "SELECT * FROM nguoi_doc WHERE dien_thoai=?";
  return pdo_query_one($sql, $dien_thoai);
}

//Kiểm tra sự tồn tại của một nguoi dung
function user_exist_phone($dien_thoai) {
  $sql = "SELECT count(*) FROM nguoi_doc WHERE dien_thoai=?";
  return pdo_query_value($sql, $dien_thoai) > 0;
}
//Kiểm tra sự tồn tại của một nguoi dung by email
function user_exist_email($email) {
  $sql = "SELECT count(*) FROM nguoi_doc WHERE email=?";
  return pdo_query_value($sql, $email) > 0;
}

//Lấy danh sách ngươi dùng theo vai trò
function user_select_by_role($vai_tro)
{
  $sql = "SELECT * FROM nguoi_doc WHERE vai_tro=?";
  return pdo_query($sql, $vai_tro);
}

//Cập nhật mật khẩu của 1 nguoi dùng
function user_change_password($id, $mat_khau_moi)
{
  $sql = "UPDATE nguoi_doc SET password=? WHERE id=?";
  pdo_execute($sql, $mat_khau_moi, $id);
}

