<?php
if (isset($_POST['update_basic'])) {
    $tendoanhnghiep = $_POST['tendoanhnghiep'];
    $machungkhoan = $_POST['machungkhoan'];
    $ngayniemyet = $_POST['ngayniemyet'];
    $namthanhlap = $_POST['namthanhlap'];
    $noiniemyet = $_POST['noiniemyet'];
    $noiniemyet = $_POST['noiniemyet'];
    $vondieule = $_POST['vondieule'];
    $giachaosan = $_POST['giachaosan'];
    $soluongnhansu = $_POST['soluongnhansu'];
    $giangaygddautien = $_POST['giangaygddautien'];
    $soluongchinhanh = $_POST['soluongchinhanh'];
    $ngayphathanhcuoi = $_POST['ngayphathanhcuoi'];
    $soluongchinhanh = $_POST['soluongchinhanh'];
    $soluongcongtyconlienket = $_POST['soluongcongtyconlienket'];
    $klniemyetlandau = $_POST['klniemyetlandau'];
    $kldangniemyet = $_POST['kldangniemyet'];
    $klcophieudangluuhanh = $_POST['klcophieudangluuhanh'];
    $update_category = mysqli_query($_SESSION['con'], "UPDATE enterprises SET
    enterprise_code='$machungkhoan'
    , enterprise_name='$tendoanhnghiep'
    , enterprise_nam_thanh_lap='$namthanhlap'
    , enterprise_von_dieu_le='$vondieule'
    , enterprise_so_luong_nhan_su='$soluongnhansu'
    , enterprise_so_luong_chi_nhanh='$soluongchinhanh'
    , enterprise_so_luong_cong_ty_con_lien_ket='$soluongcongtyconlienket'
    , enterprise_ngay_niem_yet='$ngayniemyet'
    , enterprise_noi_niem_yet='$noiniemyet'
    , enterprise_gia_chao_san='$giachaosan'
    , enterprise_gia_ngay_giao_dich_dau_tien='$giangaygddautien'
    , enterprise_ngay_phat_hanh_cuoi='$ngayphathanhcuoi'
    , enterprise_khoi_luong_niem_yet_lan_dau='$klniemyetlandau'
    , enterprise_khoi_luong_dang_niem_yet='$kldangniemyet'
    , enterprise_khoi_luong_co_phieu_dang_luu_hanh='$klcophieudangluuhanh'
    WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "';");
    if ($update_category) {
        echo "<script>alert('Cập nhật thành công!');</script>";
    } else {
        echo "<script>alert('Cập nhật thất bại!');</script>";
    }
}
if (isset($_POST['update_description'])) {
    $motadoanhnghiep = $_POST['motadoanhnghiep'];
    $update_category = mysqli_query($_SESSION['con'], "UPDATE enterprises SET
    enterprise_tong_quan='$motadoanhnghiep' WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "';");
    if ($update_category) {
        echo "<script>alert('Cập nhật mô tả thành công!');</script>";
    } else {
        echo "<script>alert('Cập nhật mô tả thất bại!');</script>";
    }
}
