<?php
if (isset($_POST['dudoan'])) {
    $myfile = fopen("assets/files/code_model.py", "r") or die("Không thể mở file!");
    //đọc file csv ra
    $tring = fread($myfile, filesize("assets/files/code_model.py"));

    $file = fopen("assets/files/" . $_SESSION['file_name'], "r");
    $date = "";
    fgetcsv($file);
    while ($csv = fgetcsv($file)) {
        $date = $csv[0];
    }
    $ngay = substr($date, 0, 2);
    $thang = substr($date, 3, 2);
    $nam = substr($date, 6, 4);
    fclose($file);
    //thay đổi một số chỗ để được code chạy dự đoán
    $tring = str_replace('[date]', (int) $ngay, $tring);
    $tring = str_replace('[month]', (int) $thang, $tring);
    $tring = str_replace('[year]', (int) $nam, $tring);
    $tring = str_replace('[date_predict]', (int)$_POST['songay'], $tring);
    $tring = str_replace('[filecsv]', $_SESSION['file_name'], $tring);
    $tring = str_replace('[train]', 1900, $tring);

    fclose($myfile);
    //gán lại file và chạy dự đoán
    $myfile_replace = fopen("assets/files/handling.py", "w") or die("Không thể mở file!");
    fwrite($myfile_replace, $tring);
    fclose($myfile_replace);

    $command = escapeshellcmd('assets/files/handling.py');
    shell_exec($command);
}
if (isset($_POST['add_csv'])) {
    $allowUpload = true;
    if (isset($_FILES["fileupload"]["name"])) {
        if (strlen($_FILES["fileupload"]["name"]) != 0) {
            //Vị trí file lưu tạm
            $target_dir = "assets/files/";
            $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
            $_SESSION['file_name'] = basename($_FILES["fileupload"]["name"]);

            //Lấy phần mở rộng của file (csv)
            $FileType = pathinfo($target_file, PATHINFO_EXTENSION);

            //Những loại file được phép upload
            $allowtypes = array('csv');

            //Kiểm tra kiểu file
            if (!in_array($FileType, $allowtypes)) {
                echo "<script>alert('Chỉ được upload định dạng csv!');</script>";
                $allowUpload = false;
            }
            if ($allowUpload) {
                //xóa đường dẫn file ảnh hiện tại
                $status = unlink($target_file);
                //Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                    echo "<script>alert('Thêm file csv thành công!');</script>";
                } else {
                    echo "<script>alert('Có một số lỗi trong quá trình thêm file csv!');</script>";
                }
            } else {
                echo "<script>alert('Không thể thêm file!');</script>";
            }
        }
    }
}
?>
