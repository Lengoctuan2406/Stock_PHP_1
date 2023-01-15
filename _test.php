<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'enterprises');
$_SESSION['con'] = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    echo "<script>alert('Không thể kết nối với mysql! mã lỗi:".mysqli_connect_error()."');</script>";
}
$ret = mysqli_query($_SESSION['con'], "SELECT enterprise_id, enterprise_code, enterprise_name FROM enterprises WHERE enterprise_code LIKE '%M%' OR enterprise_name LIKE '%M%';");
$num = mysqli_fetch_array($ret);
if ($num > 0) {
    echo $num['enterprise_id']." ".$num['enterprise_code']." ".$num['enterprise_name'];
}
