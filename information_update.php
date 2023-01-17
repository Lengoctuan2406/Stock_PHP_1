<?php
session_start();
include('database/connect.php');
include('handling/handling_information_update.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Doanh nghiệp</title>
    <link href="#" rel="icon">
    <link href="#" rel="apple-touch-icon">
    <?php include('_header.php'); ?>
</head>
<body style="background-image: url('assets/img/city_background_1.jpg'); background-size: cover">
<?php include('navigation.php'); ?>
<main id="main" class="main">
    <?php
    $ret = mysqli_query($_SESSION['con'], "SELECT * FROM enterprises WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "';");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        ?>
        <div class="card">
            <div class="card-body">
                <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="col-md-6">
                        <h5 class="card-title">Thông tin cơ bản</h5>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Thông tin niêm yết</h5>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="tendoanhnghiep" value="<?php echo htmlentities($num['enterprise_name']); ?>"
                                   type="text" class="form-control" id="tendoanhnghiep" placeholder="Tên doanh nghiệp">
                            <label for="tendoanhnghiep">Tên doanh nghiệp</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="machungkhoan" value="<?php echo htmlentities($num['enterprise_code']); ?>"
                                   type="text" class="form-control" id="machungkhoan" placeholder="Mã chứng khoáng">
                            <label for="machungkhoan">Mã chứng khoán</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="ngayniemyet"
                                   value="<?php echo htmlentities($num['enterprise_ngay_niem_yet']); ?>" type="text"
                                   class="form-control" id="ngayniemyet" placeholder="Ngày niêm yết">
                            <label for="ngayniemyet">Ngày niêm yết</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="namthanhlap"
                                   value="<?php echo htmlentities($num['enterprise_nam_thanh_lap']); ?>" type="text"
                                   class="form-control" id="namthanhlap" placeholder="Năm thành lập">
                            <label for="namthanhlap">Năm thành lập</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="noiniemyet"
                                   value="<?php echo htmlentities($num['enterprise_noi_niem_yet']); ?>" type="text"
                                   class="form-control" id="noiniemyet" placeholder="Nơi niêm yết">
                            <label for="noiniemyet">Nơi niêm yết</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="vondieule" value="<?php echo htmlentities($num['enterprise_von_dieu_le']); ?>"
                                   type="text" class="form-control" id="vondieule" placeholder="Vốn điều lệ">
                            <label for="vondieule">Vốn điều lệ</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="giachaosan"
                                   value="<?php echo htmlentities($num['enterprise_gia_chao_san']); ?>" type="text"
                                   class="form-control" id="giachaosan" placeholder="Giá chào sàn">
                            <label for="giachaosan">Giá chào sàn</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="soluongnhansu"
                                   value="<?php echo htmlentities($num['enterprise_so_luong_nhan_su']); ?>" type="text"
                                   class="form-control" id="soluongnhansu" placeholder="Số lượng nhân sự">
                            <label for="soluongnhansu">Số lượng nhân sự</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="giangaygddautien"
                                   value="<?php echo htmlentities($num['enterprise_gia_ngay_giao_dich_dau_tien']); ?>"
                                   type="text" class="form-control" id="giangaygddautien"
                                   placeholder="Giá ngày GD đầu tiên">
                            <label for="giangaygddautien">Giá ngày GD đầu tiên</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="soluongchinhanh"
                                   value="<?php echo htmlentities($num['enterprise_so_luong_chi_nhanh']); ?>"
                                   type="text" class="form-control" id="soluongchinhanh"
                                   placeholder="Số lượng chi nhánh">
                            <label for="soluongchinhanh">Số lượng chi nhánh</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="ngayphathanhcuoi"
                                   value="<?php echo htmlentities($num['enterprise_ngay_phat_hanh_cuoi']); ?>"
                                   type="text" class="form-control" id="ngayphathanhcuoi"
                                   placeholder="Ngày phát hành cuối">
                            <label for="ngayphathanhcuoi">Ngày phát hành cuối</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="soluongcongtyconlienket"
                                   value="<?php echo htmlentities($num['enterprise_so_luong_cong_ty_con_lien_ket']); ?>"
                                   type="text" class="form-control" id="soluongcongtyconlienket"
                                   placeholder="Số lượng công ty con & liên kết">
                            <label for="soluongcongtyconlienket">Số lượng công ty con & liên kết</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="klniemyetlandau"
                                   value="<?php echo htmlentities($num['enterprise_khoi_luong_niem_yet_lan_dau']); ?>"
                                   type="text" class="form-control" id="klniemyetlandau"
                                   placeholder="KL niêm yết lần đầu">
                            <label for="klniemyetlandau">KL niêm yết lần đầu</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="kldangniemyet"
                                   value="<?php echo htmlentities($num['enterprise_khoi_luong_dang_niem_yet']); ?>"
                                   type="text" class="form-control" id="kldangniemyet" placeholder="KL đang niêm yết">
                            <label for="kldangniemyet">KL đang niêm yết</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="klcophieudangluuhanh"
                                   value="<?php echo htmlentities($num['enterprise_khoi_luong_co_phieu_dang_luu_hanh']); ?>"
                                   type="text" class="form-control" id="klcophieudangluuhanh"
                                   placeholder="KL cổ phiếu đang lưu hành">
                            <label for="klcophieudangluuhanh">KL cổ phiếu đang lưu hành</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button name="update_basic" style="width: 200px" type="submit" class="btn btn-primary">Cập
                            nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mô tả doanh nghiệp</h5>
                <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="quill-editor-full">
                            <textarea
                                name="motadoanhnghiep"  class="quill-editor-full"><?php echo html_entity_decode($num['enterprise_tong_quan']); ?></textarea>
                    </div>
                    <div class="text-center">
                        <button name="update_description" style="width: 200px" type="submit" class="btn btn-primary">Cập
                            nhập
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
    ?>
</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<?php include('_footer.php'); ?>
</body>
</html>
