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
            <form>
                <h5 class="card-title">Nhập quý và năm</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="nhapquy" placeholder="Nhập quý">
                            <label for="nhapquy">Nhập quý</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="nhapnam" placeholder="Nhập năm">
                            <label for="nhapnam">Nhập năm</label>
                        </div>
                    </div>
                </div>
                <h5 class="card-title">Tài chính</h5>
                <h5 style="font-weight: bold">Kết quả kinh doanh</h5>
                <div class="row mb-3">
                    <label for="nhapdoanhthuthuan" class="col-sm-3 col-form-label">Nhập doanh thu thuần</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhapdoanhthuthuan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhaploinhuangop" class="col-sm-3 col-form-label">Nhập lợi nhuận gộp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhaploinhuangop">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhaplnthuantuhdkd" class="col-sm-3 col-form-label">Nhập LN thuần từ HĐKD</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhaplnthuantuhdkd">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhaplnstcuacdctyme" class="col-sm-3 col-form-label">Nhập LNST của CĐ cty mẹ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhaplnstcuacdctyme">
                    </div>
                </div>
                <h5 style="font-weight: bold">Cân đối kế toán</h5>
                <div class="row mb-3">
                    <label for="nhaptaisannganhan" class="col-sm-3 col-form-label">Nhập tài sản ngắn hạn</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhaptaisannganhan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhaptongtaisan" class="col-sm-3 col-form-label">Nhập tổng tài sản</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhaptongtaisan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhapnophaitra" class="col-sm-3 col-form-label">Nhập nợ phải trả</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhapnophaitra">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhapnonganhan" class="col-sm-3 col-form-label">Nhập nợ ngắn hạn</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhapnonganhan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhapvonchusohuu" class="col-sm-3 col-form-label">Nhập vốn chủ sở hữu</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhapvonchusohuu">
                    </div>
                </div>
                <h5 style="font-weight: bold">EPS của 4 quý gần nhất</h5>
                <div class="row mb-3">
                    <label for="nhapbvpscoban" class="col-sm-3 col-form-label">Nhập BVPS cơ bản</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhapbvpscoban">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhappecoban" class="col-sm-3 col-form-label">Nhập P/E cơ bản</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhappecoban">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhapros" class="col-sm-3 col-form-label">Nhập ROS</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhapros">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhaproea" class="col-sm-3 col-form-label">Nhập ROEA</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhaproea">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nhaproaa" class="col-sm-3 col-form-label">Nhập ROAA</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nhaproaa">
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
