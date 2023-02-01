<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Doanh nghiệp</title>
    <link href="#" rel="icon">
    <link href="#" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
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
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin cơ bản</h5>
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>Mã chứng khoán</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_code']); ?></th>
                            </tr>
                            <tr>
                                <td>Năm thành lập</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_nam_thanh_lap']); ?></th>
                            </tr>
                            <tr>
                                <td>Vốn điều lệ</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_von_dieu_le']); ?></th>
                            </tr>
                            <tr>
                                <td>Số lượng nhân sự</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_so_luong_nhan_su']); ?></th>
                            </tr>
                            <tr>
                                <td>Số lượng chi nhánh</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_so_luong_chi_nhanh']); ?></th>
                            </tr>
                            <tr>
                                <td>Số lượng công ty con & liên kết</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_so_luong_cong_ty_con_lien_ket']); ?></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin niêm yết</h5>
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>Ngày niêm yết</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_ngay_niem_yet']); ?></th>
                            </tr>
                            <tr>
                                <td>Nơi niêm yết</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_noi_niem_yet']); ?></th>
                            </tr>
                            <tr>
                                <td>Giá chào sàn</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_gia_chao_san']); ?></th>
                            </tr>
                            <tr>
                                <td>Giá ngày GD đầu tiên</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_gia_ngay_giao_dich_dau_tien']); ?></th>
                            </tr>
                            <tr>
                                <td>Ngày phát hành cuối</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_ngay_phat_hanh_cuoi']); ?></th>
                            </tr>
                            <tr>
                                <td>KL niêm yết lần đầu</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_khoi_luong_niem_yet_lan_dau']); ?></th>
                            </tr>
                            <tr>
                                <td>KL đang niêm yết</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_khoi_luong_dang_niem_yet']); ?></th>
                            </tr>
                            <tr>
                                <td>KL cổ phiếu đang lưu hành</td>
                                <th style="text-align: right"><?php echo htmlentities($num['enterprise_khoi_luong_co_phieu_dang_luu_hanh']); ?></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mô tả doanh nghiệp</h5>
                <?php echo htmlentities($num['enterprise_tong_quan']); ?>
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
