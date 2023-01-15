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
                        <td style="width: 20%"><button type="button" class="btn btn-outline-warning" disabled>Thiếu dữ liệu</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2021</td>
                        <td style="width: 20%"><button type="button" class="btn btn-outline-primary" disabled>Đầy đủ dữ liệu</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Sửa đổi</h5>
            <form class="row g-3">
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
            <form>
                <h5 class="card-title">Tài chính</h5>
                <h5 style="font-weight: bold">Kết quả kinh doanh</h5>
                <div class="row mb-3">
                    <label for="doanhthuthuan" class="col-sm-3 col-form-label">Doanh thu thuần</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="doanhthuthuan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="loinhuangop" class="col-sm-3 col-form-label">Lợi nhuận gộp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="loinhuangop">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lnthuantuhdkd" class="col-sm-3 col-form-label">LN thuần từ HĐKD</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lnthuantuhdkd">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lnstcuacdctyme" class="col-sm-3 col-form-label">LNST của CĐ cty mẹ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lnstcuacdctyme">
                    </div>
                </div>
                <h5 style="font-weight: bold">Cân đối kế toán</h5>
                <div class="row mb-3">
                    <label for="taisannganhan" class="col-sm-3 col-form-label">Tài sản ngắn hạn</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="taisannganhan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tongtaisan" class="col-sm-3 col-form-label">Tổng tài sản</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tongtaisan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nophaitra" class="col-sm-3 col-form-label">Nợ phải trả</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nophaitra">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nonganhan" class="col-sm-3 col-form-label">Nợ ngắn hạn</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nonganhan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="vonchusohuu" class="col-sm-3 col-form-label">Vốn chủ sở hữu</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="vonchusohuu">
                    </div>
                </div>
                <h5 style="font-weight: bold">EPS của 4 quý gần nhất</h5>
                <div class="row mb-3">
                    <label for="bvpscoban" class="col-sm-3 col-form-label">BVPS cơ bản</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="bvpscoban">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pecoban" class="col-sm-3 col-form-label">P/E cơ bản</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pecoban">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ros" class="col-sm-3 col-form-label">ROS</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="ros">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="roea" class="col-sm-3 col-form-label">ROEA</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="roea">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="roaa" class="col-sm-3 col-form-label">ROAA</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="roaa">
                    </div>
                </div>
<!--                <div class="text-center">-->
<!--                    <button type="submit" class="btn btn-primary">Submit</button>-->
<!--                    <button type="reset" class="btn btn-secondary">Reset</button>-->
<!--                </div>-->
            </form>
        </div>
    </div>


</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<?php include('_footer.php'); ?>
</body>
</html>
