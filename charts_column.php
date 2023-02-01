<?php
session_start();
include('database/connect.php');
function chuyendoi($translate) {
    switch ($translate) {
        case "financial_doanh_thu_thuan":
            return "Doanh thu thuần";
        case "financial_loi_nhuan_gop":
            return "Lợi nhuận gộp";
        case "financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh":
            return "LN thuần từ HĐKD";
        case "financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep":
            return "LNST thu nhập DN";
        case "financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me":
            return "LNST của CĐ cty mẹ";
        case "financial_tai_san_ngan_han":
            return "Tài sản ngắn hạn";
        case "financial_tong_tai_san":
            return "Tổng tài sản";
        case "financial_no_phai_tra":
            return "Nợ phải trả";
        case "financial_no_ngan_han":
            return "Nợ ngắn hạn";
        case "financial_von_chu_so_huu":
            return "Vốn chủ sở hữu";
        case "financial_eps_4_quy_gan_nhat":
            return "EPS của 4 quý gần nhất";
        case "financial_bvps_co_ban":
            return "BVPS cơ bản";
        case "financial_pe_co_ban":
            return "P/E cơ bản";
        case "financial_ros_co_ban":
            return "ROS";
        case "financial_roea":
            return "ROEA";
        case "financial_roaa":
            return "ROAA";
    }
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
            <h5 class="card-title">Nhập dữ liệu cho biểu đồ</h5>
            <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select name="cotthunhat" class="form-select" id="chondulieucotthunhat"
                                aria-label="Chọn dữ liệu cột thứ nhất">
                            <option value="" selected></option>
                            <option value="financial_doanh_thu_thuan">Doanh thu thuần</option>
                            <option value="financial_loi_nhuan_gop">Lợi nhuận gộp</option>
                            <option value="financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh">LN thuần từ HĐKD</option>
                            <option value="financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep">LNST thu nhập DN</option>
                            <option value="financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me">LNST của CĐ cty mẹ
                            </option>
                            <option value="financial_tai_san_ngan_han">Tài sản ngắn hạn</option>
                            <option value="financial_tong_tai_san">Tổng tài sản</option>
                            <option value="financial_no_phai_tra">Nợ phải trả</option>
                            <option value="financial_no_ngan_han">Nợ ngắn hạn</option>
                            <option value="financial_von_chu_so_huu">Vốn chủ sở hữu</option>
                            <option value="financial_eps_4_quy_gan_nhat">EPS của 4 quý gần nhất</option>
                            <option value="financial_bvps_co_ban">BVPS cơ bản</option>
                            <option value="financial_pe_co_ban">P/E cơ bản</option>
                            <option value="financial_ros_co_ban">ROS</option>
                            <option value="financial_roea">ROEA</option>
                            <option value="financial_roaa">ROAA</option>
                        </select>
                        <label for="chondulieucotthunhat">Chọn dữ liệu cột thứ nhất</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select name="cotthuhai" class="form-select" id="chondulieucotthuhai"
                                aria-label="Chọn dữ liệu cột thứ hai">
                            <option value="" selected></option>
                            <option value="financial_doanh_thu_thuan">Doanh thu thuần</option>
                            <option value="financial_loi_nhuan_gop">Lợi nhuận gộp</option>
                            <option value="financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh">LN thuần từ HĐKD</option>
                            <option value="financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep">LNST thu nhập DN</option>
                            <option value="financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me">LNST của CĐ cty mẹ
                            </option>
                            <option value="financial_tai_san_ngan_han">Tài sản ngắn hạn</option>
                            <option value="financial_tong_tai_san">Tổng tài sản</option>
                            <option value="financial_no_phai_tra">Nợ phải trả</option>
                            <option value="financial_no_ngan_han">Nợ ngắn hạn</option>
                            <option value="financial_von_chu_so_huu">Vốn chủ sở hữu</option>
                            <option value="financial_eps_4_quy_gan_nhat">EPS của 4 quý gần nhất</option>
                            <option value="financial_bvps_co_ban">BVPS cơ bản</option>
                            <option value="financial_pe_co_ban">P/E cơ bản</option>
                            <option value="financial_ros_co_ban">ROS</option>
                            <option value="financial_roea">ROEA</option>
                            <option value="financial_roaa">ROAA</option>
                        </select>
                        <label for="chondulieucotthuhai">Chọn dữ liệu cột thứ hai</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select name="cotthuba" class="form-select" id="chondulieucotthuba"
                                aria-label="Chọn dữ liệu cột thứ ba">
                            <option value="" selected></option>
                            <option value="financial_doanh_thu_thuan">Doanh thu thuần</option>
                            <option value="financial_loi_nhuan_gop">Lợi nhuận gộp</option>
                            <option value="financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh">LN thuần từ HĐKD</option>
                            <option value="financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep">LNST thu nhập DN</option>
                            <option value="financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me">LNST của CĐ cty mẹ
                            </option>
                            <option value="financial_tai_san_ngan_han">Tài sản ngắn hạn</option>
                            <option value="financial_tong_tai_san">Tổng tài sản</option>
                            <option value="financial_no_phai_tra">Nợ phải trả</option>
                            <option value="financial_no_ngan_han">Nợ ngắn hạn</option>
                            <option value="financial_von_chu_so_huu">Vốn chủ sở hữu</option>
                            <option value="financial_eps_4_quy_gan_nhat">EPS của 4 quý gần nhất</option>
                            <option value="financial_bvps_co_ban">BVPS cơ bản</option>
                            <option value="financial_pe_co_ban">P/E cơ bản</option>
                            <option value="financial_ros_co_ban">ROS</option>
                            <option value="financial_roea">ROEA</option>
                            <option value="financial_roaa">ROAA</option>
                        </select>
                        <label for="chondulieucotthuba">Chọn dữ liệu cột thứ ba</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select name="tuquy" class="form-select" id="tuquy" aria-label="Từ quý">
                            <option value="" selected></option>
                            <option value="1">Quý 1</option>
                            <option value="2">Quý 2</option>
                            <option value="3">Quý 3</option>
                            <option value="4">Quý 4</option>
                        </select>
                        <label for="tuquy">Từ quý</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select name="tunam" class="form-select" id="tunam" aria-label="Từ năm">
                            <option value="" selected></option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <label for="tunam">Từ năm</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select name="denquy" class="form-select" id="denquy" aria-label="Đến quý">
                            <option value="" selected></option>
                            <option value="1">Quý 1</option>
                            <option value="2">Quý 2</option>
                            <option value="3">Quý 3</option>
                            <option value="4">Quý 4</option>
                        </select>
                        <label for="denquy">Đến quý</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select name="dennam" class="form-select" id="dennam" aria-label="Đến năm">
                            <option value="" selected></option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <label for="dennam">Đến năm</label>
                    </div>
                </div>
                <div class="text-center">
                    <button name="see_charts_column" type="submit" class="btn btn-primary">Xem biểu đồ</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['see_charts_column'])) {
        $GLOBALS['count_charts1'] = 1;

        $GLOBALS['denquy1'] = (int)$_POST['denquy'];
        $GLOBALS['dennam1'] = (int)$_POST['dennam'];

        $GLOBALS['tunam1'] = (int)$_POST['tunam'];
        $GLOBALS['tuquy1'] = (int)$_POST['tuquy'];
        while ($GLOBALS['tunam1'] != $GLOBALS['dennam1'] || $GLOBALS['tuquy1'] != $GLOBALS['denquy1']) {
            $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' AND financial_year='" . $GLOBALS['tunam1'] . "' AND financial_quarter='" . $GLOBALS['tuquy1'] . "';");
            $num = mysqli_fetch_array($ret);
            $info['financial_year'][$GLOBALS['count_charts1']] = $num['financial_year'];
            $info['financial_quarter'][$GLOBALS['count_charts1']] = $num['financial_quarter'];
            $info['financial_doanh_thu_thuan'][$GLOBALS['count_charts1']] = $num['financial_doanh_thu_thuan'];
            $info['financial_loi_nhuan_gop'][$GLOBALS['count_charts1']] = $num['financial_loi_nhuan_gop'];
            $info['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'][$GLOBALS['count_charts1']] = $num['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'];
            $info['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][$GLOBALS['count_charts1']] = $num['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'];
            $info['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'][$GLOBALS['count_charts1']] = $num['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'];
            $info['financial_tai_san_ngan_han'][$GLOBALS['count_charts1']] = $num['financial_tai_san_ngan_han'];
            $info['financial_tong_tai_san'][$GLOBALS['count_charts1']] = $num['financial_tong_tai_san'];
            $info['financial_no_phai_tra'][$GLOBALS['count_charts1']] = $num['financial_no_phai_tra'];
            $info['financial_no_ngan_han'][$GLOBALS['count_charts1']] = $num['financial_no_ngan_han'];
            $info['financial_von_chu_so_huu'][$GLOBALS['count_charts1']] = $num['financial_von_chu_so_huu'];
            $info['financial_eps_4_quy_gan_nhat'][$GLOBALS['count_charts1']] = $num['financial_eps_4_quy_gan_nhat'];
            $info['financial_bvps_co_ban'][$GLOBALS['count_charts1']] = $num['financial_bvps_co_ban'];
            $info['financial_pe_co_ban'][$GLOBALS['count_charts1']] = $num['financial_pe_co_ban'];
            $info['financial_ros_co_ban'][$GLOBALS['count_charts1']] = $num['financial_ros_co_ban'];
            $info['financial_roea'][$GLOBALS['count_charts1']] = $num['financial_roea'];
            $info['financial_roaa'][$GLOBALS['count_charts1']] = $num['financial_roaa'];
            if ($GLOBALS['tuquy1'] != 4) {
                $GLOBALS['tuquy1']++;
            } else {
                $GLOBALS['tuquy1'] = 1;
                $GLOBALS['tunam1']++;
            }
            $GLOBALS['count_charts1']++;
        }
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Biểu đồ cột</h5>
                <div id="columnChart"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#columnChart"), {
                            series: [<?php
                                if($_POST['cotthunhat'] != "") {
                                $gia = "";
                                $count_tien = 1;
                                while ($count_tien != $GLOBALS['count_charts1']) {
                                    $gia = $gia . $info[$_POST['cotthunhat']][$count_tien] . ",";
                                    $count_tien++;
                                }
                                $gia = substr($gia, 0, strlen($gia) - 1);
                                ?>
                                {
                                    name: '<?php echo chuyendoi($_POST['cotthunhat']); ?>',
                                    data: [<?php echo $gia; ?>]
                                },
                                <?php
                                }
                                ?>

                                <?php
                                if($_POST['cotthuhai'] != "")
                                {
                                $gia1 = "";
                                $count_tien = 1;
                                while ($count_tien != $GLOBALS['count_charts1']) {
                                    $gia1 = $gia1 . $info[$_POST['cotthuhai']][$count_tien].",";
                                    $count_tien++;
                                }
                                $gia1 = substr($gia1, 0, strlen($gia1) - 1);
                                ?>
                                {
                                    name: '<?php echo chuyendoi($_POST['cotthuhai']); ?>',
                                    data: [<?php echo $gia1; ?>]
                                },
                                <?php
                                }
                                ?>

                                <?php
                                if($_POST['cotthuba'] != "")
                                {
                                $gia2 = "";
                                $count_tien = 1;
                                while ($count_tien != $GLOBALS['count_charts1']) {
                                    $gia2 = $gia2 . $info[$_POST['cotthuba']][$count_tien].",";
                                    $count_tien++;
                                }
                                $gia2 = substr($gia2, 0, strlen($gia2) - 1);
                                ?>
                                {
                                    name: '<?php echo chuyendoi($_POST['cotthuba']); ?>',
                                    data: [<?php echo $gia2; ?>]
                                },
                                <?php
                                }
                                ?>
                            ],
                        chart: {
                            type: 'bar',
                                height: 350
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width:2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: [
                                <?php
                                $quy = "";
                                $count_quy = 1;
                                while ($count_quy != $GLOBALS['count_charts1']) {
                                    $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                    $count_quy++;
                                }
                                $quy = substr($quy, 0, strlen($quy) - 1);
                                echo $quy;
                                ?>
                            ],
                        },
                        yaxis: {
                            title: {
                                text: 'đ (đồng)'
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val + "đ"
                                }
                            }
                        }
                    }
                    ).render();
                    });
                </script>
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
