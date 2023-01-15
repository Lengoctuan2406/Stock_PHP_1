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
                    <tr>
                        <td>1</td>
                        <td>2021</td>
                        <td style="width: 20%"><button type="button" class="btn btn-outline-warning" disabled="">Thiếu dữ liệu</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2021</td>
                        <td style="width: 20%"><button type="button" class="btn btn-outline-primary" disabled="">Đầy đủ dữ liệu</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nhập dữ liệu cho biểu đồ</h5>
            <form class="row g-3">
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="chondulieucotthunhat" aria-label="Chọn dữ liệu cột thứ nhất">
                            <option selected=""></option>
                            <option value="1">Doanh thu thuần</option>
                            <option value="1">Lợi nhuận gộp</option>
                            <option value="2">LN thuần từ HĐKD</option>
                            <option value="3">LNST của CĐ cty mẹ</option>
                            <option value="4">Tài sản ngắn hạn</option>
                            <option value="5">Tổng tài sản</option>
                            <option value="6">Nợ phải trả</option>
                            <option value="7">Nợ ngắn hạn</option>
                            <option value="8">Vốn chủ sở hữu</option>
                            <option value="9">BVPS cơ bản</option>
                            <option value="10">P/E cơ bản</option>
                            <option value="11">ROS</option>
                            <option value="12">ROEA</option>
                            <option value="13">ROAA</option>
                        </select>
                        <label for="chondulieucotthunhat">Chọn dữ liệu cột thứ nhất</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="chondulieucotthuhai" aria-label="Chọn dữ liệu cột thứ hai">
                            <option selected=""></option>
                            <option value="1">Doanh thu thuần</option>
                            <option value="1">Lợi nhuận gộp</option>
                            <option value="2">LN thuần từ HĐKD</option>
                            <option value="3">LNST của CĐ cty mẹ</option>
                            <option value="4">Tài sản ngắn hạn</option>
                            <option value="5">Tổng tài sản</option>
                            <option value="6">Nợ phải trả</option>
                            <option value="7">Nợ ngắn hạn</option>
                            <option value="8">Vốn chủ sở hữu</option>
                            <option value="9">BVPS cơ bản</option>
                            <option value="10">P/E cơ bản</option>
                            <option value="11">ROS</option>
                            <option value="12">ROEA</option>
                            <option value="13">ROAA</option>
                        </select>
                        <label for="chondulieucotthuhai">Chọn dữ liệu cột thứ hai</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="chondulieucotthuba" aria-label="Chọn dữ liệu cột thứ ba">
                            <option selected=""></option>
                            <option value="1">Doanh thu thuần</option>
                            <option value="1">Lợi nhuận gộp</option>
                            <option value="2">LN thuần từ HĐKD</option>
                            <option value="3">LNST của CĐ cty mẹ</option>
                            <option value="4">Tài sản ngắn hạn</option>
                            <option value="5">Tổng tài sản</option>
                            <option value="6">Nợ phải trả</option>
                            <option value="7">Nợ ngắn hạn</option>
                            <option value="8">Vốn chủ sở hữu</option>
                            <option value="9">BVPS cơ bản</option>
                            <option value="10">P/E cơ bản</option>
                            <option value="11">ROS</option>
                            <option value="12">ROEA</option>
                            <option value="13">ROAA</option>
                        </select>
                        <label for="chondulieucotthuba">Chọn dữ liệu cột thứ ba</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="tuquy" aria-label="Từ quý">
                            <option selected=""></option>
                            <option value="1">Quý 1</option>
                            <option value="1">Quý 2</option>
                            <option value="2">Quý 3</option>
                            <option value="3">Quý 4</option>
                        </select>
                        <label for="tuquy">Từ quý</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="nam" aria-label="Từ năm">
                            <option selected="">2021</option>
                            <option value="1">2022</option>
                        </select>
                        <label for="tunam">Từ năm</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="quy" aria-label="Đến quý">
                            <option selected="">Quý 1</option>
                            <option value="1">Quý 2</option>
                            <option value="2">Quý 3</option>
                            <option value="3">Quý 4</option>
                        </select>
                        <label for="denquy">Đến quý</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="nam" aria-label="Đến năm">
                            <option selected="">2021</option>
                            <option value="1">2022</option>
                        </select>
                        <label for="dennam">Đến năm</label>
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
            <h5 class="card-title">Column Chart</h5>

            <!-- Column Chart -->
            <div id="columnChart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#columnChart"), {
                        series: [{
                            name: 'Net Profit',
                            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                        }, {
                            name: 'Revenue',
                            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                        }, {
                            name: 'Free Cash Flow',
                            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
                        }],
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
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                        },
                        yaxis: {
                            title: {
                                text: '$ (thousands)'
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return "$ " + val + " thousands"
                                }
                            }
                        }
                    }).render();
                });
            </script>
            <!-- End Column Chart -->

        </div>
    </div>

</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<?php include('_footer.php'); ?>
</body>
</html>
