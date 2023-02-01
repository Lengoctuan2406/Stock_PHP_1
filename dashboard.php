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

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    $ret = mysqli_query($_SESSION['con'], "SELECT * FROM enterprises WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "';");
                    $num = mysqli_fetch_array($ret);
                    if ($num > 0) {
                        ?>
                        <div class="col-12">
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
                        <div class="col-12">
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Mô tả doanh nghiệp</h5>
                                    <?php echo htmlentities($num['enterprise_tong_quan']); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Reports <span>/Today</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>
                                <?php
                                $GLOBALS['count2'] = 7;
                                $GLOBALS['quy_all'] = "";
                                $GLOBALS['financial_doanh_thu_thuan'] = "";
                                $GLOBALS['financial_loi_nhuan_gop'] = "";
                                $GLOBALS['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'] = "";
                                while ($GLOBALS['count2'] >= 1) {
                                    if ($GLOBALS['count2'] == 7) {
                                        $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' ORDER BY financial_year DESC, financial_quarter DESC LIMIT 1;");
                                        $num = mysqli_fetch_array($ret);
//                                        $infor1['financial_year'][$GLOBALS['count2']] = $num['financial_year'];
//                                        $infor1['financial_quarter'][$GLOBALS['count2']] = $num['financial_quarter'];

                                        $GLOBALS['quy_all'] = $GLOBALS['quy_all'] . "'Quý " . $num['financial_quarter'] . " / " . $num['financial_year'] . "' ,";
                                        $GLOBALS['financial_doanh_thu_thuan'] = $GLOBALS['financial_doanh_thu_thuan'] . $num['financial_doanh_thu_thuan'] . ",";
                                        $GLOBALS['financial_loi_nhuan_gop'] = $GLOBALS['financial_loi_nhuan_gop'] . $num['financial_loi_nhuan_gop'] . ",";
                                        $GLOBALS['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'] = $GLOBALS['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'] . $num['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'] . ",";

//                                        $infor1['financial_doanh_thu_thuan'][$GLOBALS['count2']] = $num['financial_doanh_thu_thuan'];
//                                        $infor1['financial_loi_nhuan_gop'][$GLOBALS['count2']] = $num['financial_loi_nhuan_gop'];
//                                        $infor1['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][$GLOBALS['count2']] = $num['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'];

                                        $GLOBALS['financial_year'] = $num['financial_year'];
                                        $GLOBALS['financial_quarter'] = $num['financial_quarter'];

                                        if ($GLOBALS['financial_quarter'] != 1) {
                                            $GLOBALS['financial_quarter']--;
                                        } else {
                                            $GLOBALS['financial_quarter'] = 4;
                                            $GLOBALS['financial_year']--;
                                        }
                                        $GLOBALS['count2']--;
                                    } else {
                                        $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' AND financial_year='" . $GLOBALS['financial_year'] . "' AND financial_quarter='" . $GLOBALS['financial_quarter'] . "';");
                                        $num = mysqli_fetch_array($ret);

                                        $GLOBALS['quy_all'] = $GLOBALS['quy_all'] . "'Quý " . $num['financial_quarter'] . " / " . $num['financial_year'] . "' ,";
                                        $GLOBALS['financial_doanh_thu_thuan'] = $GLOBALS['financial_doanh_thu_thuan'] . $num['financial_doanh_thu_thuan'] . ",";
                                        $GLOBALS['financial_loi_nhuan_gop'] = $GLOBALS['financial_loi_nhuan_gop'] . $num['financial_loi_nhuan_gop'] . ",";
                                        $GLOBALS['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'] = $GLOBALS['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'] . $num['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'] . ",";


//                                        $infor1['financial_year'][$GLOBALS['count2']] = $num['financial_year'];
//                                        $infor1['financial_quarter'][$GLOBALS['count2']] = $num['financial_quarter'];
//                                        $infor1['financial_doanh_thu_thuan'][$GLOBALS['count2']] = $num['financial_doanh_thu_thuan'];
//                                        $infor1['financial_loi_nhuan_gop'][$GLOBALS['count2']] = $num['financial_loi_nhuan_gop'];
//                                        $infor1['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'][$GLOBALS['count2']] = $num['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'];
                                        if ($GLOBALS['financial_quarter'] != 1) {
                                            $GLOBALS['financial_quarter']--;
                                        } else {
                                            $GLOBALS['financial_quarter'] = 4;
                                            $GLOBALS['financial_year']--;
                                        }
                                        $GLOBALS['count2']--;
                                    }
                                }

                                $GLOBALS['quy_all'] = substr($GLOBALS['quy_all'], 0, strlen($GLOBALS['quy_all']) - 1);
                                $GLOBALS['financial_doanh_thu_thuan'] = substr($GLOBALS['financial_doanh_thu_thuan'], 0, strlen($GLOBALS['financial_doanh_thu_thuan']) - 1);
                                $GLOBALS['financial_loi_nhuan_gop'] = substr($GLOBALS['financial_loi_nhuan_gop'], 0, strlen($GLOBALS['financial_loi_nhuan_gop']) - 1);
                                $GLOBALS['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'] = substr($GLOBALS['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep'], 0, strlen($GLOBALS['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep']) - 1);
                                ?>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'Doanh thu thuần',
                                                data: [<?php echo $GLOBALS['financial_doanh_thu_thuan']; ?>],
                                            }, {
                                                name: 'Lợi nhuận gộp',
                                                data: [<?php echo $GLOBALS['financial_loi_nhuan_gop']; ?>]
                                            }, {
                                                name: 'LNST thu nhập DN',
                                                data: [<?php echo $GLOBALS['financial_loi_nhuan_sau_thue_thu_nhap_doanh_nghiep']; ?>]
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'string',
                                                categories: [<?php echo $GLOBALS['quy_all']; ?>]
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'string',
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Phần trăm sở hữu:</h5>
                        <div id="pieChart"></div>
                        <?php
                        $query_all = mysqli_query($_SESSION['con'], "SELECT enterprise_phan_tram_so_huu FROM enterprises WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "';");
                        $row = mysqli_fetch_array($query_all);
                        if ($row > 0) {
                            $GLOBALS['explode'] = explode(";", $row['enterprise_phan_tram_so_huu']);
                        }
                        for ($i = 0; $i < count($GLOBALS['explode']); $i++) {
                            if ($i % 2 == 1) {
                                $GLOBALS['series'] = $GLOBALS['series'] . $GLOBALS['explode'][$i] . ",";
                            } else {
                                $GLOBALS['labels'] = $GLOBALS['labels'] . "'" . $GLOBALS['explode'][$i] . "' ,";
                            }
                        }
                        $GLOBALS['series'] = substr($GLOBALS['series'], 0, strlen($GLOBALS['series']) - 1);
                        $GLOBALS['labels'] = substr($GLOBALS['labels'], 0, strlen($GLOBALS['labels']) - 1);
                        ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#pieChart"), {
                                    series: [<?php echo $GLOBALS['series']; ?>],
                                    chart: {
                                        height: 350,
                                        type: 'pie',
                                        toolbar: {
                                            show: true
                                        }
                                    },
                                    labels: [<?php echo $GLOBALS['labels']; ?>]
                                }).render();
                            });
                        </script>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Doanh thu thuần</h5>
                        <div class="activity">
                            <?php
                            $GLOBALS['count1'] = 6;
                            while ($GLOBALS['count1'] >= 1) {
                                if ($GLOBALS['count1'] == 6) {
                                    $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' ORDER BY financial_year DESC, financial_quarter DESC LIMIT 1;");
                                    $num = mysqli_fetch_array($ret);
                                    $infor['financial_year'][$GLOBALS['count1']] = $num['financial_year'];
                                    $infor['financial_quarter'][$GLOBALS['count1']] = $num['financial_quarter'];
                                    $infor['financial_doanh_thu_thuan'][$GLOBALS['count1']] = dauphay($num['financial_doanh_thu_thuan']) . "đ";

                                    $GLOBALS['financial_year'] = $num['financial_year'];
                                    $GLOBALS['financial_quarter'] = $num['financial_quarter'];

                                    if ($GLOBALS['financial_quarter'] != 1) {
                                        $GLOBALS['financial_quarter']--;
                                    } else {
                                        $GLOBALS['financial_quarter'] = 4;
                                        $GLOBALS['financial_year']--;
                                    }
                                    $GLOBALS['count1']--;
                                } else {
                                    $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' AND financial_year='" . $GLOBALS['financial_year'] . "' AND financial_quarter='" . $GLOBALS['financial_quarter'] . "';");
                                    $num = mysqli_fetch_array($ret);
                                    $infor['financial_year'][$GLOBALS['count1']] = $num['financial_year'];
                                    $infor['financial_quarter'][$GLOBALS['count1']] = $num['financial_quarter'];
                                    $infor['financial_doanh_thu_thuan'][$GLOBALS['count1']] = dauphay($num['financial_doanh_thu_thuan']) . "đ";
                                    if ($GLOBALS['financial_quarter'] != 1) {
                                        $GLOBALS['financial_quarter']--;
                                    } else {
                                        $GLOBALS['financial_quarter'] = 4;
                                        $GLOBALS['financial_year']--;
                                    }
                                    $GLOBALS['count1']--;
                                }
                            }
                            ?>
                            <div class="activity-item d-flex">
                                <div class="activite-label">Quý <?php echo $infor['financial_quarter'][6]; ?>
                                    / <?php echo $infor['financial_year'][6]; ?></div>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <div class="activity-content">
                                    <?php echo $infor['financial_doanh_thu_thuan'][6]; ?>
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Quý <?php echo $infor['financial_quarter'][5]; ?>
                                    / <?php echo $infor['financial_year'][5]; ?></div>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                <div class="activity-content">
                                    <?php echo $infor['financial_doanh_thu_thuan'][5]; ?>
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Quý <?php echo $infor['financial_quarter'][4]; ?>
                                    / <?php echo $infor['financial_year'][4]; ?></div>
                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                <div class="activity-content">
                                    <?php echo $infor['financial_doanh_thu_thuan'][4]; ?>
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Quý <?php echo $infor['financial_quarter'][3]; ?>
                                    / <?php echo $infor['financial_year'][3]; ?></div>
                                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                <div class="activity-content">
                                    <?php echo $infor['financial_doanh_thu_thuan'][3]; ?>
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Quý <?php echo $infor['financial_quarter'][2]; ?>
                                    / <?php echo $infor['financial_year'][2]; ?></div>
                                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                <div class="activity-content">
                                    <?php echo $infor['financial_doanh_thu_thuan'][2]; ?>
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">Quý <?php echo $infor['financial_quarter'][1]; ?>
                                    / <?php echo $infor['financial_year'][1]; ?></div>
                                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                <div class="activity-content">
                                    <?php echo $infor['financial_doanh_thu_thuan'][1]; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="card">-->
<!--                    <div class="filter">-->
<!--                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>-->
<!--                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
<!--                            <li class="dropdown-header text-start">-->
<!--                                <h6>Filter</h6>-->
<!--                            </li>-->
<!---->
<!--                            <li><a class="dropdown-item" href="#">Today</a></li>-->
<!--                            <li><a class="dropdown-item" href="#">This Month</a></li>-->
<!--                            <li><a class="dropdown-item" href="#">This Year</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!---->
<!--                    <div class="card-body pb-0">-->
<!--                        <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>-->
<!---->
<!--                        <div class="news">-->
<!--                            <div class="post-item clearfix">-->
<!--                                <img src="assets/img/news-1.jpg" alt="">-->
<!--                                <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>-->
<!--                                <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>-->
<!--                            </div>-->
<!---->
<!--                            <div class="post-item clearfix">-->
<!--                                <img src="assets/img/news-2.jpg" alt="">-->
<!--                                <h4><a href="#">Quidem autem et impedit</a></h4>-->
<!--                                <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>-->
<!--                            </div>-->
<!---->
<!--                            <div class="post-item clearfix">-->
<!--                                <img src="assets/img/news-3.jpg" alt="">-->
<!--                                <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>-->
<!--                                <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>-->
<!--                            </div>-->
<!---->
<!--                            <div class="post-item clearfix">-->
<!--                                <img src="assets/img/news-4.jpg" alt="">-->
<!--                                <h4><a href="#">Laborum corporis quo dara net para</a></h4>-->
<!--                                <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>-->
<!--                            </div>-->
<!---->
<!--                            <div class="post-item clearfix">-->
<!--                                <img src="assets/img/news-5.jpg" alt="">-->
<!--                                <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>-->
<!--                                <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos-->
<!--                                    eius...</p>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </section>

</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
<?php include('_footer.php'); ?>
</body>
</html>
