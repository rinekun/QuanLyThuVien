<?php
    require_once "pdo.php";

    function phieu_muon_insert($id,$id_nguoi_doc,$id_sach,$ngay_muon,$ngay_tra,$so_tien_muon,$so_ngay_gioi_han,$ghi_chu,$so_tien_phat,$tinh_trang) {
        $sql = "INSERT INTO don_hang(id,id_nguoi_doc,id_sach,ngay_muon,ngay_tra,so_tien_muon,so_ngay_gioi_han,ghi_chu,so_tien_phat,tinh_trang ) VALUES (?,?,?,?,?,?,?,?,?,?)";
        pdo_execute($sql, $id,$id_nguoi_doc,$id_sach,$ngay_muon,$ngay_tra,$so_tien_muon,$so_ngay_gioi_han,$ghi_chu,$so_tien_phat,$tinh_trang );
    }

    function phieu_muon_select_all() {
        $sql = "SELECT * FROM phieu_muon";
        return pdo_query($sql);
    }

    function phieu_muon_delete($ma_don_hang){
    $sql = "DELETE FROM don_hang WHERE ma_don_hang =?";
    if (is_array($ma_don_hang)) {
        foreach ($ma_don_hang as $ma) pdo_execute($sql, $ma);
    } else pdo_execute($sql, $ma_don_hang);
    }

    function don_hang_update($ma_don_hang, $ngay_dat_hang, $so_luong, $tong_tien,$trang_thai){
    $sql = "UPDATE don_hang SET $ma_don_hang = ?, ngay_dat_hang = ?, so_luong = ? , tong_tien = ? , trang_thai = ? WHERE ma_don_hang = ?";
    pdo_execute($sql, $ma_don_hang, $ngay_dat_hang, $so_luong, $tong_tien,$trang_thai);
    }

    

    function phieu_muon_exit($id) {
        $sql = "SELECT count(*) FROM phieu_muon WHERE id = ?";
        return pdo_query_value($sql, $id) > 0;
    }

    function don_hang_select_by_id($ma_don_hang) {
        $sql = "SELECT * FROM don_hang WHERE ma_don_hang = ?";
        return pdo_query_one($sql, $ma_don_hang);
    }


    function hoa_don_insert($don_gia, $so_luong, $thanh_tien, $ma_don_hang, $ma_san_pham){
        $sql = "INSERT INTO chi_tiet_hoa_don(don_gia, so_luong, thanh_tien, ma_don_hang, ma_san_pham) VALUE (?,?,?,?,?)";
        pdo_execute($sql, $don_gia, $so_luong, $thanh_tien, $ma_don_hang, $ma_san_pham);
    }

    function hoa_don_select_by_id($ma_don_hang) {
        $sql = "SELECT ct.*, hinh_anh, ten_san_pham FROM chi_tiet_hoa_don ct, san_pham sp WHERE ct.ma_san_pham = sp.ma_san_pham AND ma_don_hang=?";
        return pdo_query($sql, $ma_don_hang);
    }

    function update_trang_thai($ma_don_hang, $trang_thai){
        $sql = "UPDATE don_hang SET trang_thai = ? WHERE ma_don_hang = ?";
        pdo_execute($sql, $trang_thai, $ma_don_hang);
    }

    // đơn hàng chờ xác nhận
    function don_hang_cho(){
        $sql = "SELECT * FROM don_hang WHERE trang_thai=0";
        return pdo_query($sql);
    }
    // đơn đang vận chuyển
    function don_hang_van_chuyen(){
        $sql = "SELECT * FROM don_hang WHERE trang_thai=1";
        return pdo_query($sql);
    }
    // đơn hàng hủy
    function don_hang_huy(){
        $sql = "SELECT * FROM don_hang WHERE trang_thai=2";
        return pdo_query($sql);
    }
    // đơn hoàn thành
    function don_hoan_thanh(){
        $sql = "SELECT * FROM don_hang WHERE trang_thai=3";
        return pdo_query($sql);
    }

    // hủy đơn hàng
    function huy_don_hang($ma_don_hang){
        $sql = "UPDATE don_hang SET trang_thai = 4 WHERE ma_don_hang = ?";
        pdo_execute($sql, $ma_don_hang);
    }

    function don_hang_select_by_id_user($ma_nguoi_dung) {
        $sql = "SELECT * FROM don_hang WHERE ma_nguoi_dung = ?"; 
        return pdo_query($sql, $ma_nguoi_dung);
    }