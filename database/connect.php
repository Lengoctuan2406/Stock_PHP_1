<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'enterprises');
$_SESSION['con'] = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

//if (mysqli_connect_errno()) {
//    echo "<script>alert('Không thể kết nối với mysql! mã lỗi:".mysqli_connect_error()."');</script>";
//}
