<?php
session_start();
include('database/connect.php');
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
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select name="tuquy" class="form-select" id="tuquy" aria-label="Từ quý">
                            <option value="1" selected>Quý 1</option>
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
                            <option value="2018" selected>2018</option>
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
                        <select name="denquy" class="form-select" id="quy" aria-label="Đến quý">
                            <option value="1" selected>Quý 1</option>
                            <option value="2">Quý 2</option>
                            <option value="3">Quý 3</option>
                            <option value="4">Quý 4</option>
                        </select>
                        <label for="denquy">Đến quý</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select name="dennam" class="form-select" id="nam" aria-label="Đến năm">
                            <option value="2018" selected>2018</option>
                            <option value="2019">2019</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <label for="dennam">Đến năm</label>
                    </div>
                </div>
                <div class="text-center">
                    <button name="see_charts" style="width: 100%" type="submit" class="btn btn-primary">Xem biểu đồ
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['see_charts'])) {
        $GLOBALS['count_charts'] = 1;

        $GLOBALS['denquy'] = (int)$_POST['denquy'];
        $GLOBALS['dennam'] = (int)$_POST['dennam'];
        //echo "<script>alert(".$GLOBALS['test'].");</script>";

        $GLOBALS['tunam'] = (int)$_POST['tunam'];
        $GLOBALS['tuquy'] = (int)$_POST['tuquy'];
        while ($GLOBALS['tunam'] != $GLOBALS['dennam'] || $GLOBALS['tuquy'] != $GLOBALS['denquy']) {
            $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' AND financial_year='" . $GLOBALS['tunam'] . "' AND financial_quarter='" . $GLOBALS['tuquy'] . "';");
            $num = mysqli_fetch_array($ret);
            $info['financial_year'][$GLOBALS['count_charts']] = $num['financial_year'];
            $info['financial_quarter'][$GLOBALS['count_charts']] = $num['financial_quarter'];
            $info['financial_doanh_thu_thuan'][$GLOBALS['count_charts']] = $num['financial_doanh_thu_thuan'];
            $info['financial_loi_nhuan_gop'][$GLOBALS['count_charts']] = $num['financial_loi_nhuan_gop'];
            $info['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'][$GLOBALS['count_charts']] = $num['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'];
            $info['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][$GLOBALS['count_charts']] = $num['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'];
            $info['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'][$GLOBALS['count_charts']] = $num['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'];
            $info['financial_tai_san_ngan_han'][$GLOBALS['count_charts']] = $num['financial_tai_san_ngan_han'];
            $info['financial_tong_tai_san'][$GLOBALS['count_charts']] = $num['financial_tong_tai_san'];
            $info['financial_no_phai_tra'][$GLOBALS['count_charts']] = $num['financial_no_phai_tra'];
            $info['financial_no_ngan_han'][$GLOBALS['count_charts']] = $num['financial_no_ngan_han'];
            $info['financial_von_chu_so_huu'][$GLOBALS['count_charts']] = $num['financial_von_chu_so_huu'];
            $info['financial_eps_4_quy_gan_nhat'][$GLOBALS['count_charts']] = $num['financial_eps_4_quy_gan_nhat'];
            $info['financial_bvps_co_ban'][$GLOBALS['count_charts']] = $num['financial_bvps_co_ban'];
            $info['financial_pe_co_ban'][$GLOBALS['count_charts']] = $num['financial_pe_co_ban'];
            $info['financial_ros_co_ban'][$GLOBALS['count_charts']] = $num['financial_ros_co_ban'];
            $info['financial_roea'][$GLOBALS['count_charts']] = $num['financial_roea'];
            $info['financial_roaa'][$GLOBALS['count_charts']] = $num['financial_roaa'];
            if ($GLOBALS['tuquy'] != 4) {
                $GLOBALS['tuquy']++;
            } else {
                $GLOBALS['tuquy'] = 1;
                $GLOBALS['tunam']++;
            }
            $GLOBALS['count_charts']++;
        }
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Doanh thu thuần</h5>
                <div id="doanhthuthuan"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_doanhthuthuan = 1;
                                    while ($count_doanhthuthuan != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_doanh_thu_thuan'][$count_doanhthuthuan] . ",";
                                        $count_doanhthuthuan++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#doanhthuthuan"), {
                            series: [{
                                name: "STOCK ABC",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Doanh thu thuần',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Lợi nhuận gộp</h5>
                <div id="loinhuangop"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_loi_nhuan_gop'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#loinhuangop"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">LN thuần từ HĐKD</h5>
                <div id="lnthuantuhdkd"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_loi_nhuan_thuan_tu_hoat_dong_kinh_doanh'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#lnthuantuhdkd"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">LNST thu nhập DN</h5>
                <div id="lnstthunhapdn"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#lnstthunhapdn"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">LNST của CĐ cty mẹ</h5>
                <div id="lnstcuacdctyme"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_loi_nhuan_sau_thue_cua_co_dong_cong_ty_me'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#lnstcuacdctyme"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tài sản ngắn hạn</h5>
                <div id="taisannganhan"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_tai_san_ngan_han'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#taisannganhan"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tổng tài sản</h5>
                <div id="tongtaisan"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_tong_tai_san'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#tongtaisan"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nợ phải trả</h5>
                <div id="nophaitra"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_no_phai_tra'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#nophaitra"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nợ ngắn hạn</h5>
                <div id="nonganhan"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_no_ngan_han'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#nonganhan"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Vốn chủ sở hữu</h5>
                <div id="vonchusohuu"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_von_chu_so_huu'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#vonchusohuu"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">EPS của 4 quý gần nhất</h5>
                <div id="epscua4quygannhat"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_eps_4_quy_gan_nhat'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#epscua4quygannhat"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">BVPS cơ bản</h5>
                <div id="bvpscoban"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_bvps_co_ban'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#bvpscoban"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">P/E cơ bản</h5>
                <div id="pecoban"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_pe_co_ban'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#pecoban"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ROS</h5>
                <div id="ros"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_ros_co_ban'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#ros"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ROEA</h5>
                <div id="roea"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_roea'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#roea"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
                    });
                </script>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ROAA</h5>
                <div id="roaa"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": [
                                    <?php
                                    $gia = "";
                                    $count_tien = 1;
                                    while ($count_tien != $GLOBALS['count_charts']) {
                                        $gia = $gia . $info['financial_roaa'][$count_tien] . ",";
                                        $count_tien++;
                                    }
                                    $gia = substr($gia, 0, strlen($gia) - 1);
                                    echo $gia;
                                    ?>
                                ],
                                "dates": [
                                    <?php
                                    $quy = "";
                                    $count_quy = 1;
                                    while ($count_quy != $GLOBALS['count_charts']) {
                                        $quy = $quy . "'Quý " . $info['financial_quarter'][$count_quy] . " / " . $info['financial_year'][$count_quy] . "' ,";
                                        $count_quy++;
                                    }
                                    $quy = substr($quy, 0, strlen($quy) - 1);
                                    echo $quy;
                                    ?>
                                ]
                            }
                        }
                        new ApexCharts(document.querySelector("#roaa"), {
                            series: [{
                                name: "Mã <?php echo $_SESSION['enterprise_code']; ?>",
                                data: series.monthDataSeries1.prices
                            }],
                            chart: {
                                type: 'area',
                                height: 350,
                                zoom: {
                                    enabled: false
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'straight'
                            },
                            subtitle: {
                                text: 'Price Movements',
                                align: 'left'
                            },
                            labels: series.monthDataSeries1.dates,
                            xaxis: {
                                type: 'string',
                            },
                            yaxis: {
                                opposite: true
                            },
                            legend: {
                                horizontalAlign: 'left'
                            }
                        }).render();
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
