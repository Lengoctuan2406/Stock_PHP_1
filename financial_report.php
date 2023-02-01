<?php
session_start();
include('database/connect.php');
function dauphay($number)
{
    $GLOBALS['handle'] = "";
    $GLOBALS['phay'] = -3;
    $GLOBALS['handle'] = substr((string)$number, $GLOBALS['phay']) . $GLOBALS['handle'];
    while (substr((string)$number, $GLOBALS['phay'] - 3, $GLOBALS['phay']) != "") {
        $GLOBALS['handle'] = substr((string)$number, $GLOBALS['phay'] - 3, $GLOBALS['phay']) . "," . $GLOBALS['handle'];
        $GLOBALS['phay'] = $GLOBALS['phay'] - 3;
    }
    return $GLOBALS['handle'];
}
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
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Thông tin các quý</h5>
            <div style="overflow-x: unset; overflow-y: scroll; height: 200pt">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Quý</th>
                        <th scope="col">Năm</th>
                        <th scope="col" style="width: 20%">Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query_all = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' ORDER BY financial_year DESC, financial_quarter DESC;");
                    while ($row = mysqli_fetch_array($query_all)) {
                        if ($row['financial_doanh_thu_thuan'] == ""
                            || $row['financial_loi_nhuan_gop'] == ""
                            || $row['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'] == ""
                            || $row['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'] == ""
                            || $row['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'] == ""
                            || $row['financial_tai_san_ngan_han'] == ""
                            || $row['financial_tong_tai_san'] == ""
                            || $row['financial_no_phai_tra'] == ""
                            || $row['financial_no_ngan_han'] == ""
                            || $row['financial_von_chu_so_huu'] == ""
                            || $row['financial_eps_4_quy_gan_nhat'] == ""
                            || $row['financial_bvps_co_ban'] == ""
                            || $row['financial_pe_co_ban'] == ""
                            || $row['financial_ros_co_ban'] == ""
                            || $row['financial_roea'] == ""
                            || $row['financial_roaa'] == ""
                        ) { ?>
                            <tr>
                                <td><?php echo $row['financial_quarter']; ?></td>
                                <td><?php echo $row['financial_year']; ?></td>
                                <td style="width: 20%">
                                    <button type="button" class="btn btn-outline-warning" disabled>Đang xử lý</button>
                                </td>
                            </tr>
                            <?php
                        } else {
                            ?>
                            <tr>
                                <td><?php echo $row['financial_quarter']; ?></td>
                                <td><?php echo $row['financial_year']; ?></td>
                                <td style="width: 20%">
                                    <button type="button" class="btn btn-outline-primary" disabled>Có thể xem</button>
                                </td>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tìm kiếm</h5>
            <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <select name="type_of_searching" class="form-select" id="loaitimkiem"
                                aria-label="Loại tìm kiếm">
                            <option value="timkiemtheoquy">Tìm kiếm theo từng quý</option>
                            <option value="timkiemtheobonquylienke">Tìm kiếm theo bốn quý liền kề</option>
                        </select>
                        <label for="loaitimkiem">Loại tìm kiếm</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select name="financial_quarter" class="form-select" id="quy" aria-label="Quý">
                            <option value="1" selected>Quý 1</option>
                            <option value="2">Quý 2</option>
                            <option value="3">Quý 3</option>
                            <option value="4">Quý 4</option>
                        </select>
                        <label for="quy">Quý</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select name="financial_year" class="form-select" id="nam" aria-label="Năm">
                            <option value="2018" selected>2018</option>
                            <option value="2019">2019</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <label for="nam">Năm</label>
                    </div>
                </div>
                <div class="text-center">
                    <button style="width: 100%" name="searching_financial_report" type="submit" class="btn btn-primary">
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['searching_financial_report']) && $_POST['type_of_searching'] == "timkiemtheoquy") {
        $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' AND financial_year='" . $_POST['financial_year'] . "' AND financial_quarter='" . $_POST['financial_quarter'] . "';");
        $num = mysqli_fetch_array($ret);
        if ($num > 0) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tài chính</h5>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Kết quả kinh doanh</th>
                            <th style="text-align: right">Quý <?php echo $num['financial_quarter']; ?>
                                / <?php echo $num['financial_year']; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Doanh thu thuần</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_doanh_thu_thuan'])."đ"; ?></td>
                        </tr>
                        <tr>
                            <td>Lợi nhuận gộp</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_loi_nhuan_gop'])."đ"; ?></td>
                        </tr>
                        <tr>
                            <td>LN thuần từ HĐKD</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'])."đ"; ?></td>
                        </tr>
                        <tr>
                            <td>LNST thu nhập DN</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'])."đ"; ?></td>
                        </tr>
                        <tr>
                            <td>LNST của CĐ cty mẹ</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'])."đ"; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="height: 10px"></div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Cân đối kế toán</th>
                            <th style="text-align: right">Quý <?php echo $num['financial_quarter']; ?>
                                / <?php echo $num['financial_year']; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Tài sản ngắn hạn</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_tai_san_ngan_han'])."đ"; ?></td>
                        </tr>
                        <tr>
                            <td>Tổng tài sản</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_tong_tai_san'])."đ"; ?></td>
                        </tr>
                        <tr>
                            <td>Nợ phải trả</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_no_phai_tra'])."đ"; ?></td>
                        </tr>
                        <tr>
                            <td>Nợ ngắn hạn</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_no_ngan_han'])."đ"; ?></td>
                        </tr>
                        <tr>
                            <td>Vốn chủ sở hữu</td>
                            <td style="text-align: right"><?php echo dauphay($num['financial_von_chu_so_huu'])."đ"; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="height: 10px"></div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>EPS của 4 quý gần nhất</th>
                            <th style="text-align: right"><?php echo $num['financial_eps_4_quy_gan_nhat']; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>BVPS cơ bản</td>
                            <td style="text-align: right"><?php echo $num['financial_bvps_co_ban']; ?></td>
                        </tr>
                        <tr>
                            <td>P/E cơ bản</td>
                            <td style="text-align: right"><?php echo $num['financial_pe_co_ban']; ?></td>
                        </tr>
                        <tr>
                            <td>ROS</td>
                            <td style="text-align: right"><?php echo $num['financial_ros_co_ban']; ?></td>
                        </tr>
                        <tr>
                            <td>ROEA</td>
                            <td style="text-align: right"><?php echo $num['financial_roea']; ?></td>
                        </tr>
                        <tr>
                            <td>ROAA</td>
                            <td style="text-align: right"><?php echo $num['financial_roaa']; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }
    } else if (isset($_POST['searching_financial_report']) && $_POST['type_of_searching'] == "timkiemtheobonquylienke") {
        $GLOBALS['count'] = 4;
        $GLOBALS['financial_year'] = (int)$_POST['financial_year'];
        $GLOBALS['financial_quarter'] = (int)$_POST['financial_quarter'];
        while ($GLOBALS['count'] >= 1) {
            $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' AND financial_year='" . $GLOBALS['financial_year'] . "' AND financial_quarter='" . $GLOBALS['financial_quarter'] . "';");
            $num = mysqli_fetch_array($ret);
            $info['financial_year'][$GLOBALS['count']] = $num['financial_year'];
            $info['financial_quarter'][$GLOBALS['count']] = $num['financial_quarter'];
            $info['financial_doanh_thu_thuan'][$GLOBALS['count']] = dauphay($num['financial_doanh_thu_thuan'])."đ";
            $info['financial_loi_nhuan_gop'][$GLOBALS['count']] = dauphay($num['financial_loi_nhuan_gop'])."đ";
            $info['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'][$GLOBALS['count']] = dauphay($num['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'])."đ";
            $info['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][$GLOBALS['count']] = dauphay($num['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'])."đ";
            $info['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'][$GLOBALS['count']] = dauphay($num['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'])."đ";
            $info['financial_tai_san_ngan_han'][$GLOBALS['count']] = dauphay($num['financial_tai_san_ngan_han'])."đ";
            $info['financial_tong_tai_san'][$GLOBALS['count']] = dauphay($num['financial_tong_tai_san'])."đ";
            $info['financial_no_phai_tra'][$GLOBALS['count']] = dauphay($num['financial_no_phai_tra'])."đ";
            $info['financial_no_ngan_han'][$GLOBALS['count']] = dauphay($num['financial_no_ngan_han'])."đ";
            $info['financial_von_chu_so_huu'][$GLOBALS['count']] = dauphay($num['financial_von_chu_so_huu'])."đ";
            $info['financial_eps_4_quy_gan_nhat'][$GLOBALS['count']] = $num['financial_eps_4_quy_gan_nhat'];
            $info['financial_bvps_co_ban'][$GLOBALS['count']] = $num['financial_bvps_co_ban'];
            $info['financial_pe_co_ban'][$GLOBALS['count']] = $num['financial_pe_co_ban'];
            $info['financial_ros_co_ban'][$GLOBALS['count']] = $num['financial_ros_co_ban'];
            $info['financial_roea'][$GLOBALS['count']] = $num['financial_roea'];
            $info['financial_roaa'][$GLOBALS['count']] = $num['financial_roaa'];
            if ($GLOBALS['financial_quarter'] != 1) {
                $GLOBALS['financial_quarter']--;
            } else {
                $GLOBALS['financial_quarter'] = 4;
                $GLOBALS['financial_year']--;
            }
            $GLOBALS['count']--;
        }
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tài chính</h5>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th style="width: 25%">Kết quả kinh doanh</th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][1]; ?>
                            / <?php echo $info['financial_year'][1]; ?></th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][2]; ?>
                            / <?php echo $info['financial_year'][2]; ?></th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][3]; ?>
                            / <?php echo $info['financial_year'][3]; ?></th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][4]; ?>
                            / <?php echo $info['financial_year'][4]; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width: 25%">Doanh thu thuần</td>
                        <td style="text-align: right"><?php echo $info['financial_doanh_thu_thuan'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_doanh_thu_thuan'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_doanh_thu_thuan'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_doanh_thu_thuan'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">Lợi nhuận gộp</td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_gop'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_gop'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_gop'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_gop'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">LN thuần từ HĐKD</td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'][4]; ?></td>

                    </tr>
                    <tr>
                        <td style="width: 25%">LNST thu nhập DN</td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">LNST của CĐ cty mẹ</td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'][4]; ?></td>
                    </tr>
                    </tbody>
                </table>
                <div style="height: 10px"></div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th style="width: 25%">Cân đối kế toán</th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][1]; ?>
                            / <?php echo $info['financial_year'][1]; ?></th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][2]; ?>
                            / <?php echo $info['financial_year'][2]; ?></th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][3]; ?>
                            / <?php echo $info['financial_year'][3]; ?></th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][4]; ?>
                            / <?php echo $info['financial_year'][4]; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width: 25%">Tài sản ngắn hạn</td>
                        <td style="text-align: right"><?php echo $info['financial_tai_san_ngan_han'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_tai_san_ngan_han'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_tai_san_ngan_han'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_tai_san_ngan_han'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">Tổng tài sản</td>
                        <td style="text-align: right"><?php echo $info['financial_tong_tai_san'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_tong_tai_san'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_tong_tai_san'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_tong_tai_san'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">Nợ phải trả</td>
                        <td style="text-align: right"><?php echo $info['financial_no_phai_tra'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_no_phai_tra'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_no_phai_tra'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_no_phai_tra'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">Nợ ngắn hạn</td>
                        <td style="text-align: right"><?php echo $info['financial_no_ngan_han'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_no_ngan_han'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_no_ngan_han'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_no_ngan_han'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">Vốn chủ sở hữu</td>
                        <td style="text-align: right"><?php echo $info['financial_von_chu_so_huu'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_von_chu_so_huu'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_von_chu_so_huu'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_von_chu_so_huu'][4]; ?></td>
                    </tr>
                    </tbody>
                </table>
                <div style="height: 10px"></div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th style="width: 25%">EPS của 4 quý gần nhất</th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][1]; ?>
                            / <?php echo $info['financial_year'][1]; ?></th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][2]; ?>
                            / <?php echo $info['financial_year'][2]; ?></th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][3]; ?>
                            / <?php echo $info['financial_year'][3]; ?></th>
                        <th style="text-align: right">Quý <?php echo $info['financial_quarter'][4]; ?>
                            / <?php echo $info['financial_year'][4]; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="width: 25%">BVPS cơ bản</td>
                        <td style="text-align: right"><?php echo $info['financial_bvps_co_ban'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_bvps_co_ban'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_bvps_co_ban'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_bvps_co_ban'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">P/E cơ bản</td>
                        <td style="text-align: right"><?php echo $info['financial_pe_co_ban'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_pe_co_ban'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_pe_co_ban'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_pe_co_ban'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">ROS</td>
                        <td style="text-align: right"><?php echo $info['financial_ros_co_ban'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_ros_co_ban'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_ros_co_ban'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_ros_co_ban'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">ROEA</td>
                        <td style="text-align: right"><?php echo $info['financial_roea'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_roea'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_roea'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_roea'][4]; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">ROAA</td>
                        <td style="text-align: right"><?php echo $info['financial_roaa'][1]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_roaa'][2]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_roaa'][3]; ?></td>
                        <td style="text-align: right"><?php echo $info['financial_roaa'][4]; ?></td>
                    </tr>
                    </tbody>
                </table>
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
