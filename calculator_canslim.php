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
                        <select name="tunam" class="form-select" id="tunam" aria-label="Từ năm">
                            <option value="2018" selected>2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <label for="tunam">Từ năm</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select name="dennam" class="form-select" id="nam" aria-label="Đến năm">
                            <option value="2018" selected>2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <label for="dennam">Đến năm</label>
                    </div>
                </div>
                <div class="text-center">
                    <button name="see_canslim" style="width: 100%" type="submit" class="btn btn-primary">Xem tính toán
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['see_canslim'])) {
        $GLOBALS['count_charts'] = 0;

        $GLOBALS['denquy5'] = 4;
        $GLOBALS['dennam5'] = (int)$_POST['dennam'];

        $GLOBALS['tunam5'] = (int)$_POST['tunam']-1;
        $GLOBALS['tuquy5'] = 4;
        while ($GLOBALS['tunam5'] != $GLOBALS['dennam5'] || $GLOBALS['tuquy5'] != $GLOBALS['denquy5']) {
            $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' AND financial_year='" . $GLOBALS['tunam5'] . "' AND financial_quarter='" . $GLOBALS['tuquy5'] . "';");
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
            if ($GLOBALS['tuquy5'] != 4) {
                $GLOBALS['tuquy5']++;
            } else {
                $GLOBALS['tuquy5'] = 1;
                $GLOBALS['tunam5']++;
            }
            $GLOBALS['count_charts']++;
            if ($GLOBALS['tunam5'] == $GLOBALS['dennam5'] && $GLOBALS['tuquy5'] == $GLOBALS['denquy5']) {
                $ret = mysqli_query($_SESSION['con'], "SELECT * FROM financial_reports WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "' AND financial_year='" . $GLOBALS['tunam5'] . "' AND financial_quarter='" . $GLOBALS['tuquy5'] . "';");
                $num = mysqli_fetch_array($ret);
                $info['financial_year'][$GLOBALS['count_charts']] = $num['financial_year'];
                $info['financial_quarter'][$GLOBALS['count_charts']] = $num['financial_quarter'];
                $info['financial_doanh_thu_thuan'][$GLOBALS['count_charts']] = $num['financial_doanh_thu_thuan'];
                $info['financial_eps_4_quy_gan_nhat'][$GLOBALS['count_charts']] = $num['financial_eps_4_quy_gan_nhat'];
            }
        }
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bảng tính canslim</h5>
                <div style="overflow-x: scroll; overflow-y: unset">
                    <?php
                    function calculatorCanslim($tiletangtruong, $thamchieu, $titrongtungthanhphan)
                    {
                        $result = 0.00;
                        if ($tiletangtruong > 0.00) {
                            if ($tiletangtruong < $thamchieu) {
                                $result = ($tiletangtruong / $thamchieu) * $titrongtungthanhphan;
                            } else {
                                $result = $titrongtungthanhphan;
                            }
                        }
                        return $result;
                    }

                    $table1['2'][0] = substr((string)$info['financial_doanh_thu_thuan'][4], 0, -9);
                    $table1['2'][1] = substr((string)$info['financial_doanh_thu_thuan'][8], 0, -9);
                    $table1['2'][2] = round((($info['financial_doanh_thu_thuan'][8] - $info['financial_doanh_thu_thuan'][4]) / $info['financial_doanh_thu_thuan'][4]) * 100, 2);
                    $table1['2'][3] = 25;
                    $table1['2'][4] = 15;
                    $table1['2'][5] = round(calculatorCanslim($table1['2'][2], $table1['2'][3], $table1['2'][4]), 2);

                    $table1['3'][0] = substr((string)$info['financial_doanh_thu_thuan'][3], 0, -9);;//14188
                    $table1['3'][1] = substr((string)$info['financial_doanh_thu_thuan'][7], 0, -9);//15087
                    $table1['3'][2] = round((($info['financial_doanh_thu_thuan'][7] - $info['financial_doanh_thu_thuan'][3]) / $info['financial_doanh_thu_thuan'][3]) * 100, 2);;//6.34
                    $table1['3'][3] = 25;
                    $table1['3'][4] = 10;
                    $table1['3'][5] = round(calculatorCanslim($table1['3'][2], $table1['3'][3], $table1['3'][4]), 2);

                    //echo $table1['3'][2];
                    $table1['4'][0] = substr((string)$info['financial_doanh_thu_thuan'][1], 0, -9);//13001
                    $table1['4'][1] = substr((string)$info['financial_doanh_thu_thuan'][2], 0, -9);//14261
                    $table1['4'][2] = substr((string)$info['financial_doanh_thu_thuan'][3], 0, -9);//14188
                    $table1['4'][3] = substr((string)$info['financial_doanh_thu_thuan'][4], 0, -9);//14386
                    $table1['4'][4] = substr((string)$info['financial_doanh_thu_thuan'][5], 0, -9);//14963
                    $table1['4'][5] = substr((string)$info['financial_doanh_thu_thuan'][6], 0, -9);//15097
                    $table1['4'][6] = substr((string)$info['financial_doanh_thu_thuan'][7], 0, -9);//15087
                    $table1['4'][7] = substr((string)$info['financial_doanh_thu_thuan'][8], 0, -9);//17975
                    $tong1 = $info['financial_doanh_thu_thuan'][1]+$info['financial_doanh_thu_thuan'][2]+$info['financial_doanh_thu_thuan'][3]+$info['financial_doanh_thu_thuan'][4];
                    $tong2 = $info['financial_doanh_thu_thuan'][5]+$info['financial_doanh_thu_thuan'][6]+$info['financial_doanh_thu_thuan'][7]+$info['financial_doanh_thu_thuan'][8];
                    $table1['4'][8] = round((($tong2 - $tong1) / $tong1) * 100, 2);//13.05
                    $table1['4'][9] = 20;
                    $table1['4'][10] = 10;
                    $table1['4'][11] = round(calculatorCanslim($table1['4'][8], $table1['4'][9], $table1['4'][10]), 2);;//0.07

                    $table1['5'][0] = substr((string)$info['financial_doanh_thu_thuan'][0], 0, -9);//12745
                    $table1['5'][1] = substr((string)$info['financial_doanh_thu_thuan'][1], 0, -9);//13001
                    $table1['5'][2] = substr((string)$info['financial_doanh_thu_thuan'][2], 0, -9);//14261
                    $table1['5'][3] = substr((string)$info['financial_doanh_thu_thuan'][3], 0, -9);//14188
                    $table1['5'][4] = substr((string)$info['financial_doanh_thu_thuan'][4], 0, -9);//14386
                    $table1['5'][5] = substr((string)$info['financial_doanh_thu_thuan'][5], 0, -9);//14963
                    $table1['5'][6] = substr((string)$info['financial_doanh_thu_thuan'][6], 0, -9);//15097
                    $table1['5'][7] = substr((string)$info['financial_doanh_thu_thuan'][7], 0, -9);//15087
                    $tong1 = $info['financial_doanh_thu_thuan'][0]+$info['financial_doanh_thu_thuan'][1]+$info['financial_doanh_thu_thuan'][2]+$info['financial_doanh_thu_thuan'][3];
                    $tong2 = $info['financial_doanh_thu_thuan'][4]+$info['financial_doanh_thu_thuan'][5]+$info['financial_doanh_thu_thuan'][6]+$info['financial_doanh_thu_thuan'][7];
                    $table1['5'][8] = round((($tong2 - $tong1) / $tong1) * 100, 2);//9.85
                    $table1['5'][9] = 20;
                    $table1['5'][10] = 5;
                    $table1['5'][11] = round(calculatorCanslim($table1['5'][8], $table1['5'][9], $table1['5'][10]), 2);//0.02;

                    $table1['21'][0] = $info['financial_eps_4_quy_gan_nhat'][4];//5468
                    $table1['21'][1] = $info['financial_eps_4_quy_gan_nhat'][8];//3169
                    $table1['21'][2] = round((($info['financial_eps_4_quy_gan_nhat'][8] - $info['financial_eps_4_quy_gan_nhat'][4]) / $info['financial_eps_4_quy_gan_nhat'][4]) * 100, 2);//-42.05
                    $table1['21'][3] = 25;//25
                    $table1['21'][4] = 20;//20
                    $table1['21'][5] = round(calculatorCanslim($table1['21'][2], $table1['21'][3], $table1['21'][4]), 2);//0.00

                    $table1['31'][0] = $info['financial_eps_4_quy_gan_nhat'][3];//5997
                    $table1['31'][1] = $info['financial_eps_4_quy_gan_nhat'][7];//3714
                    $table1['31'][2] = round((($info['financial_eps_4_quy_gan_nhat'][7] - $info['financial_eps_4_quy_gan_nhat'][3]) / $info['financial_eps_4_quy_gan_nhat'][3]) * 100, 2);//-38.07
                    $table1['31'][3] = 25;
                    $table1['31'][4] = 15;
                    $table1['31'][5] = round(calculatorCanslim($table1['31'][2], $table1['31'][3], $table1['31'][4]), 2);//0.00

                    //echo $table1['3'][2];
                    $table1['41'][0] = $info['financial_eps_4_quy_gan_nhat'][1];//6522
                    $table1['41'][1] = $info['financial_eps_4_quy_gan_nhat'][2];//943.88
                    $table1['41'][2] = $info['financial_eps_4_quy_gan_nhat'][3];//1052.33
                    $table1['41'][3] = $info['financial_eps_4_quy_gan_nhat'][4];//1334.33
                    $table1['41'][4] = $info['financial_eps_4_quy_gan_nhat'][5];//4653
                    $table1['41'][5] = $info['financial_eps_4_quy_gan_nhat'][6];//4117
                    $table1['41'][6] = $info['financial_eps_4_quy_gan_nhat'][7];//3714
                    $table1['41'][7] = $info['financial_eps_4_quy_gan_nhat'][8];//3169
                    $tong1 = $info['financial_eps_4_quy_gan_nhat'][1]+$info['financial_eps_4_quy_gan_nhat'][2]+$info['financial_eps_4_quy_gan_nhat'][3]+$info['financial_eps_4_quy_gan_nhat'][4];
                    $tong2 = $info['financial_eps_4_quy_gan_nhat'][5]+$info['financial_eps_4_quy_gan_nhat'][6]+$info['financial_eps_4_quy_gan_nhat'][7]+$info['financial_eps_4_quy_gan_nhat'][8];
                    $table1['41'][8] = round((($tong2 - $tong1) / $tong1) * 100, 2);//58.87
                    $table1['41'][9] = 20;
                    $table1['41'][10] = 15;
                    $table1['41'][11] = round(calculatorCanslim($table1['41'][8], $table1['41'][9], $table1['41'][10]), 2);//0.00

                    $table1['51'][0] = $info['financial_eps_4_quy_gan_nhat'][0];//7183
                    $table1['51'][1] = $info['financial_eps_4_quy_gan_nhat'][1];//6522
                    $table1['51'][2] = $info['financial_eps_4_quy_gan_nhat'][2];//5978
                    $table1['51'][3] = $info['financial_eps_4_quy_gan_nhat'][3];//5997
                    $table1['51'][4] = $info['financial_eps_4_quy_gan_nhat'][4];//5468
                    $table1['51'][5] = $info['financial_eps_4_quy_gan_nhat'][5];//4653
                    $table1['51'][6] = $info['financial_eps_4_quy_gan_nhat'][6];//4117
                    $table1['51'][7] = $info['financial_eps_4_quy_gan_nhat'][7];//3714
                    $tong1 = $info['financial_eps_4_quy_gan_nhat'][0]+$info['financial_eps_4_quy_gan_nhat'][1]+$info['financial_eps_4_quy_gan_nhat'][2]+$info['financial_eps_4_quy_gan_nhat'][3];
                    $tong2 = $info['financial_eps_4_quy_gan_nhat'][4]+$info['financial_eps_4_quy_gan_nhat'][5]+$info['financial_eps_4_quy_gan_nhat'][6]+$info['financial_eps_4_quy_gan_nhat'][7];
                    $table1['51'][8] = round((($tong2 - $tong1) / $tong1) * 100, 2);//-30.09
                    $table1['51'][9] = 20;
                    $table1['51'][10] = 10;
                    $table1['51'][11] = round(calculatorCanslim($table1['51'][8], $table1['51'][9], $table1['51'][10]), 2);//0.00

                    $table1['1'][0] = $table1['2'][5] + $table1['3'][5] + $table1['21'][5] + $table1['31'][5];
                    $table1['1'][1] = $table1['4'][11] + $table1['5'][11] + $table1['41'][11] + $table1['51'][11];

                    $table1['2'][6] = $table1['1'][0]+$table1['1'][1];
                    ?>

                    <table class="table table-bordered table1"
                           style="width: 1500px; height: auto;border: solid black 2px">
                        <thead>
                        <tr style="border: solid black 2px">
                            <th rowspan="2" colspan="10" class="calculator"></th>
                            <th rowspan="2" class="calculator" style="background-color: #04d9d9">
                                Tỉ lệ tăng
                            </th>
                            <th rowspan="2" class="calculator" style="background-color: #04d9d9">
                                Tham chiếu
                            </th>
                            <th rowspan="2" class="calculator" style="background-color: #04d9d9">
                                TỶ TRỌNG TỪNG PHẦN
                            </th>
                            <th class="calculator" style="background-color: #04d9d9">C</th>
                            <th class="calculator" style="background-color: #04d9d9">A</th>
                            <th rowspan="2" class="calculator">TỔNG ĐIỂM</th>
                        </tr>
                        <tr style="border: solid black 2px">
                            <th class="calculator"><?php echo $table1['1'][0]; ?></th>
                            <th class="calculator"><?php echo $table1['1'][1]; ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="border: solid black 2px">
                            <td rowspan="8" style="width: 4%; background-color: #f2d98d">
                                Tiêu chí SALE
                            </td>
                            <td rowspan="2" class="title" style="background-color: #84d9d0">
                                1 Quý gần nhất
                            </td>
                            <td rowspan="4" colspan="3"></td>
                            <td class="num" style="background-color: #ecad8f">Q4 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #5e96ae">Q4 <?php echo $_POST['dennam']; ?></td>
                            <td rowspan="4" colspan="3"></td>
                            <td rowspan="2" class="calculator"><?php echo $table1['2'][2]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['2'][3]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['2'][4]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['2'][5]; ?></td>
                            <td rowspan="2" class="calculator"></td>
                            <td rowspan="16" class="calculator"><?php echo $table1['2'][6]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td class="num"><?php echo $table1['2'][0]; ?></td>
                            <td class="num"><?php echo $table1['2'][1]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td rowspan="2" class="title" style="background-color: #84d9d0">
                                1 Quý trước đó gần nhất (C)
                            </td>
                            <td class="num" style="background-color: #ecad8f">Q3 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #5e96ae">Q3 <?php echo $_POST['dennam']; ?></td>
                            <td rowspan="2" class="calculator"><?php echo $table1['3'][2]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['3'][3]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['3'][4]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['3'][5]; ?></td>
                            <td rowspan="2" class="calculator"></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td class="num"><?php echo $table1['3'][0]; ?></td>
                            <td class="num"><?php echo $table1['3'][1]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td rowspan="2" class="title" style="background-color: #f2a7ad">
                                Trailing 12 tháng gần nhất (A)
                            </td>
                            <td class="num" style="background-color: #70ae98">Q1 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #70ae98">Q2 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #70ae98">Q3 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #70ae98">Q4 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #fb8e7e">Q1 <?php echo $_POST['dennam']; ?></td>
                            <td class="num" style="background-color: #fb8e7e" style="background-color: #fb8e7e">
                                Q2 <?php echo $_POST['dennam']; ?>
                            </td>
                            <td class="num" style="background-color: #fb8e7e" style="background-color: #fb8e7e">
                                Q3 <?php echo $_POST['dennam']; ?>
                            </td>
                            <td class="num" style="background-color: #fb8e7e" style="background-color: #fb8e7e">
                                Q4 <?php echo $_POST['dennam']; ?>
                            </td>
                            <td rowspan="2" class="calculator"><?php echo $table1['4'][8]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['4'][9]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['4'][10]; ?>%</td>
                            <td rowspan="2" class="calculator"></td>
                            <td rowspan="2" class="calculator"><?php echo $table1['4'][11]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td class="num"><?php echo $table1['4'][0]; ?></td>
                            <td class="num"><?php echo $table1['4'][1]; ?></td>
                            <td class="num"><?php echo $table1['4'][2]; ?></td>
                            <td class="num"><?php echo $table1['4'][3]; ?></td>
                            <td class="num"><?php echo $table1['4'][4]; ?></td>
                            <td class="num"><?php echo $table1['4'][5]; ?></td>
                            <td class="num"><?php echo $table1['4'][6]; ?></td>
                            <td class="num"><?php echo $table1['4'][7]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td rowspan="2" class="title" style="background-color: #f2a7ad">
                                Trailing 12 tháng gần nhất trước đó (A)
                            </td>
                            <td class="num" style="background-color: #f2cf59">Q4 <?php echo $_POST['tunam']-1; ?></td>
                            <td class="num" style="background-color: #f2cf59">Q1 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #f2cf59">Q2 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #f2cf59">Q3 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #b2d9ea">Q4 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #b2d9ea">Q1 <?php echo $_POST['dennam']; ?></td>
                            <td class="num" style="background-color: #b2d9ea">Q2 <?php echo $_POST['dennam']; ?></td>
                            <td class="num" style="background-color: #b2d9ea">Q3 <?php echo $_POST['dennam']; ?></td>
                            <td rowspan="2" class="calculator"><?php echo $table1['5'][8]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['5'][9]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['5'][10]; ?>%</td>
                            <td rowspan="2" class="calculator"></td>
                            <td rowspan="2" class="calculator"><?php echo $table1['5'][11]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td class="num"><?php echo $table1['5'][0]; ?></td>
                            <td class="num"><?php echo $table1['5'][1]; ?></td>
                            <td class="num"><?php echo $table1['5'][2]; ?></td>
                            <td class="num"><?php echo $table1['5'][3]; ?></td>
                            <td class="num"><?php echo $table1['5'][4]; ?></td>
                            <td class="num"><?php echo $table1['5'][5]; ?></td>
                            <td class="num"><?php echo $table1['5'][6]; ?></td>
                            <td class="num"><?php echo $table1['5'][7]; ?></td>
                        </tr>


                        <tr style="border: solid black 2px">
                            <td rowspan="8" style="width: 4%; background-color: #079dd9">
                                Tiêu chí EPS
                            </td>
                            <td rowspan="2" class="title" style="background-color: #84d9d0">
                                1 Quý gần nhất
                            </td>
                            <td rowspan="4" colspan="3"></td>
                            <td class="num" style="background-color: #ecad8f">Q4 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #5e96ae">Q4 <?php echo $_POST['dennam']; ?></td>
                            <td rowspan="4" colspan="3"></td>
                            <td rowspan="2" class="calculator"><?php echo $table1['21'][2]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['21'][3]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['21'][4]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['21'][5]; ?></td>
                            <td rowspan="2" class="calculator"></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td class="num"><?php echo $table1['21'][0]; ?></td>
                            <td class="num"><?php echo $table1['21'][1]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td rowspan="2" class="title" style="background-color: #84d9d0">
                                1 Quý trước đó gần nhất (C)
                            </td>
                            <td class="num" style="background-color: #ecad8f">Q3 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #5e96ae">Q3 <?php echo $_POST['dennam']; ?></td>
                            <td rowspan="2" class="calculator"><?php echo $table1['31'][2]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['31'][3]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['31'][4]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['31'][5]; ?></td>
                            <td rowspan="2" class="calculator"></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td class="num"><?php echo $table1['31'][0]; ?></td>
                            <td class="num"><?php echo $table1['31'][1]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td rowspan="2" class="title" style="background-color: #f2a7ad">
                                Trailing 12 tháng gần nhất (A)
                            </td>
                            <td class="num" style="background-color: #70ae98">Q1 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #70ae98">Q2 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #70ae98">Q3 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #70ae98">Q4 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #fb8e7e">Q1 <?php echo $_POST['dennam']; ?></td>
                            <td class="num" style="background-color: #fb8e7e" style="background-color: #fb8e7e">
                                Q2 <?php echo $_POST['dennam']; ?>
                            </td>
                            <td class="num" style="background-color: #fb8e7e" style="background-color: #fb8e7e">
                                Q3 <?php echo $_POST['dennam']; ?>
                            </td>
                            <td class="num" style="background-color: #fb8e7e" style="background-color: #fb8e7e">
                                Q4 <?php echo $_POST['dennam']; ?>
                            </td>
                            <td rowspan="2" class="calculator"><?php echo $table1['41'][8]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['41'][9]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['41'][10]; ?>%</td>
                            <td rowspan="2" class="calculator"></td>
                            <td rowspan="2" class="calculator"><?php echo $table1['41'][11]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td class="num"><?php echo $table1['41'][0]; ?></td>
                            <td class="num"><?php echo $table1['41'][1]; ?></td>
                            <td class="num"><?php echo $table1['41'][2]; ?></td>
                            <td class="num"><?php echo $table1['41'][3]; ?></td>
                            <td class="num"><?php echo $table1['41'][4]; ?></td>
                            <td class="num"><?php echo $table1['41'][5]; ?></td>
                            <td class="num"><?php echo $table1['41'][6]; ?></td>
                            <td class="num"><?php echo $table1['41'][7]; ?></td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td rowspan="2" class="title" style="background-color: #f2a7ad">
                                Trailing 12 tháng gần nhất trước đó (A)
                            </td>
                            <td class="num" style="background-color: #f2cf59">Q4 <?php echo $_POST['tunam']-1; ?></td>
                            <td class="num" style="background-color: #f2cf59">Q1 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #f2cf59">Q2 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #f2cf59">Q3 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #b2d9ea">Q4 <?php echo $_POST['tunam']; ?></td>
                            <td class="num" style="background-color: #b2d9ea">Q1 <?php echo $_POST['dennam']; ?></td>
                            <td class="num" style="background-color: #b2d9ea">Q2 <?php echo $_POST['dennam']; ?></td>
                            <td class="num" style="background-color: #b2d9ea">Q3 <?php echo $_POST['dennam']; ?></td>
                            <td rowspan="2" class="calculator"><?php echo $table1['51'][8]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['51'][9]; ?>%</td>
                            <td rowspan="2" class="calculator"><?php echo $table1['51'][10]; ?>%</td>
                            <td rowspan="2" class="calculator"></td>
                            <!--                            --><?php //echo $table1['51'][11]; ?>
                            <td rowspan="2" class="calculator">0</td>
                        </tr>
                        <tr style="border: solid black 2px">
                            <td class="num"><?php echo $table1['51'][0]; ?></td>
                            <td class="num"><?php echo $table1['51'][1]; ?></td>
                            <td class="num"><?php echo $table1['51'][2]; ?></td>
                            <td class="num"><?php echo $table1['51'][3]; ?></td>
                            <td class="num"><?php echo $table1['51'][4]; ?></td>
                            <td class="num"><?php echo $table1['51'][5]; ?></td>
                            <td class="num"><?php echo $table1['51'][6]; ?></td>
                            <td class="num"><?php echo $table1['51'][7]; ?></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
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
