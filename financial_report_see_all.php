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
            <h5 class="card-title">Tìm kiếm</h5>
            <form class="row g-3">
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="loaitimkiem" aria-label="Loại tìm kiếm">
                            <option selected="">Tìm kiếm theo từng quý</option>
                            <option value="1">Tìm kiếm theo bốn quý liền kề</option>
                        </select>
                        <label for="loaitimkiem">Loại tìm kiếm</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="quy" aria-label="Quý">
                            <option selected="">Quý 1</option>
                            <option value="1">Quý 2</option>
                            <option value="2">Quý 3</option>
                            <option value="3">Quý 4</option>
                        </select>
                        <label for="quy">Quý</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="nam" aria-label="Năm">
                            <option selected="">2021</option>
                            <option value="1">2022</option>
                        </select>
                        <label for="nam">Năm</label>
                    </div>
                </div>
<!--                <div class="text-center">-->
<!--                    <button type="submit" class="btn btn-primary">Submit</button>-->
<!--                    <button type="reset" class="btn btn-secondary">Reset</button>-->
<!--                </div>-->
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tài chính</h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Kết quả kinh doanh</th>
                    <th style="text-align: right">Quý 1 / 2021</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Doanh thu thuần</td>
                    <td style="text-align: right">34,457,826</td>
                </tr>
                <tr>
                    <td>Lợi nhuận gộp</td>
                    <td style="text-align: right">8,239,986</td>
                </tr>
                <tr>
                    <td>LN thuần từ HĐKD</td>
                    <td style="text-align: right">-2,876,914</td>
                </tr>
                <tr>
                    <td>LNST của CĐ cty mẹ</td>
                    <td style="text-align: right">-5,964,033</td>
                </tr>
                </tbody>
            </table>
            <div style="height: 10px"></div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Cân đối kế toán</th>
                    <th style="text-align: right">Quý 1 / 2021</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Tài sản ngắn hạn</td>
                    <td style="text-align: right">163,350,836</td>
                </tr>
                <tr>
                    <td>Tổng tài sản</td>
                    <td style="text-align: right">427,323,934</td>
                </tr>
                <tr>
                    <td>Nợ phải trả</td>
                    <td style="text-align: right">268,177,346</td>
                </tr>
                <tr>
                    <td>Nợ ngắn hạn</td>
                    <td style="text-align: right">144,444,929</td>
                </tr>
                <tr>
                    <td>Vốn chủ sở hữu</td>
                    <td style="text-align: right">159,146,588</td>
                </tr>
                </tbody>
            </table>
            <div style="height: 10px"></div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>EPS của 4 quý gần nhất</th>
                    <th style="text-align: right">-852.00</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>BVPS cơ bản</td>
                    <td style="text-align: right">41,823.00</td>
                </tr>
                <tr>
                    <td>P/E cơ bản</td>
                    <td style="text-align: right">-111.68</td>
                </tr>
                <tr>
                    <td>ROS</td>
                    <td style="text-align: right">-26.84</td>
                </tr>
                <tr>
                    <td>ROEA</td>
                    <td style="text-align: right">-3.69</td>
                </tr>
                <tr>
                    <td>ROAA</td>
                    <td style="text-align: right">-1.39</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tài chính</h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="width: 25%">Kết quả kinh doanh</th>
                    <th style="text-align: right">Quý 1 / 2021</th>
                    <th style="text-align: right">Quý 2 / 2021</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 25%">Doanh thu thuần</td>
                    <td style="text-align: right">34,457,826</td>
                    <td style="text-align: right">34,457,826</td>
                </tr>
                <tr>
                    <td style="width: 25%">Lợi nhuận gộp</td>
                    <td style="text-align: right">8,239,986</td>
                    <td style="text-align: right">8,239,986</td>
                </tr>
                <tr>
                    <td style="width: 25%">LN thuần từ HĐKD</td>
                    <td style="text-align: right">-2,876,914</td>
                    <td style="text-align: right">-2,876,914</td>
                </tr>
                <tr>
                    <td style="width: 25%">LNST của CĐ cty mẹ</td>
                    <td style="text-align: right">-5,964,033</td>
                    <td style="text-align: right">-5,964,033</td>
                </tr>
                </tbody>
            </table>
            <div style="height: 10px"></div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="width: 25%">Cân đối kế toán</th>
                    <th style="text-align: right">Quý 1 / 2021</th>
                    <th style="text-align: right">Quý 2 / 2021</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 25%">Tài sản ngắn hạn</td>
                    <td style="text-align: right">163,350,836</td>
                    <td style="text-align: right">163,350,836</td>
                </tr>
                <tr>
                    <td style="width: 25%">Tổng tài sản</td>
                    <td style="text-align: right">427,323,934</td>
                    <td style="text-align: right">427,323,934</td>
                </tr>
                <tr>
                    <td style="width: 25%">Nợ phải trả</td>
                    <td style="text-align: right">268,177,346</td>
                    <td style="text-align: right">268,177,346</td>
                </tr>
                <tr>
                    <td style="width: 25%">Nợ ngắn hạn</td>
                    <td style="text-align: right">144,444,929</td>
                    <td style="text-align: right">144,444,929</td>
                </tr>
                <tr>
                    <td style="width: 25%">Vốn chủ sở hữu</td>
                    <td style="text-align: right">159,146,588</td>
                    <td style="text-align: right">159,146,588</td>
                </tr>
                </tbody>
            </table>
            <div style="height: 10px"></div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th style="width: 25%">EPS của 4 quý gần nhất</th>
                    <th style="text-align: right">Quý 1 / 2021</th>
                    <th style="text-align: right">Quý 2 / 2021</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 25%">BVPS cơ bản</td>
                    <td style="text-align: right">41,823.00</td>
                    <td style="text-align: right">41,823.00</td>
                </tr>
                <tr>
                    <td style="width: 25%">P/E cơ bản</td>
                    <td style="text-align: right">-111.68</td>
                    <td style="text-align: right">-111.68</td>
                </tr>
                <tr>
                    <td style="width: 25%">ROS</td>
                    <td style="text-align: right">-26.84</td>
                    <td style="text-align: right">-26.84</td>
                </tr>
                <tr>
                    <td style="width: 25%">ROEA</td>
                    <td style="text-align: right">-3.69</td>
                    <td style="text-align: right">-3.69</td>
                </tr>
                <tr>
                    <td style="width: 25%">ROAA</td>
                    <td style="text-align: right">-1.39</td>
                    <td style="text-align: right">-1.39</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<?php include('_footer.php'); ?>
</body>
</html>
