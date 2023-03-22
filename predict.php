<?php
session_start();
include('database/connect.php');
include('handling/handling_predict.php');
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
        <div class="card-body" style="margin-top: 20px;">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                  enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Thêm file csv</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="fileupload">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button name="add_csv" type="submit" class="btn btn-primary">Thêm tệp dữ liệu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body" style="margin-top: 20px;">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                  enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-4 col-form-label">Nhập số lượng ngày muốn dự đoán:</label>
                    <div class="col-sm-8">
                        <textarea name="songay" type="text" class="form-control" rows="1"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button name="dudoan" type="submit" class="btn btn-primary">Dự đoán</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Biểu đồ dự đoán</h5>
            <div id="areaChart"></div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const series = {
                        "monthDataSeries1": {
                            "prices": [
                                <?php
                                // đọc file csv để vẽ biểu đồ
                                $file = fopen("assets/files/dudoan.csv", "r");
                                $gia = "";
                                $gia1 = "";
                                fgetcsv($file);
                                while ($csv = fgetcsv($file)) {
                                    $gia = $gia . "$csv[1],";
                                }
                                $gia = substr($gia, 0, strlen($gia) - 1);
                                $cat = explode(",", $gia);
                                for ($i = count($cat); $i >= count($cat) - 50; $i--) {
                                    $gia1 = "$cat[$i]," . $gia1;
                                }
                                $gia1 = substr($gia1, 0, strlen($gia1) - 1);
                                echo $gia1;
                                fclose($file);
                                ?>],
                            "dates": [
                                <?php
                                // đọc file csv để vẽ biểu đồ
                                $file = fopen("assets/files/dudoan.csv", "r");
                                $gia = "";
                                $gia1 = "";
                                fgetcsv($file);
                                while ($csv = fgetcsv($file)) {
                                    $gia = $gia . "'$csv[0]',";
                                }
                                $gia = substr($gia, 0, strlen($gia) - 1);
                                $cat = explode(",", $gia);
                                for ($i = count($cat); $i >= count($cat) - 50; $i--) {
                                    $gia1 = "$cat[$i]," . $gia1;
                                }
                                $gia1 = substr($gia1, 0, strlen($gia1) - 1);
                                echo $gia1;
                                fclose($file);
                                ?>
                            ]
                        }
                    }

                    new ApexCharts(document.querySelector("#areaChart"), {
                        series: [{
                            name: "Giá",
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
                            text: 'Dự đoán giá chứng khoáng',
                            align: 'left'
                        },
                        labels: series.monthDataSeries1.dates,
                        xaxis: {
                            type: 'string'
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

</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
<?php include('_footer.php'); ?>
</body>
</html>
