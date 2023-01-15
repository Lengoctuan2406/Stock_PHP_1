<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['search'])) {
    $queryEnterprises = test_input($_POST['queryEnterprises']);
    if ($queryEnterprises == "") {
        echo "<script>alert('Hãy nhập dữ liệu!');</script>";
    } else {
        $ret = mysqli_query($_SESSION['con'], "SELECT enterprise_id, enterprise_code, enterprise_name FROM enterprises WHERE enterprise_code LIKE '%" . $queryEnterprises . "%' OR enterprise_name LIKE '%" . $queryEnterprises . "%';");
        $num = mysqli_fetch_array($ret);
        if ($num > 0) {
            $_SESSION['enterprise_id'] = $num['enterprise_id'];
            $_SESSION['enterprise_code'] = $num['enterprise_code'];
            $_SESSION['enterprise_name'] = $num['enterprise_name'];
        } else {
            echo "<script>alert('Không có kết quả phù hợp');</script>";
        }
    }
}
