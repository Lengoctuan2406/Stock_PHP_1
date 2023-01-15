<?php
session_start();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(isset($_REQUEST["name"]) && isset($_REQUEST["value"])) {
    $name = test_input($_REQUEST["name"]);
    $value = test_input($_REQUEST["value"]);
    $update_category = mysqli_query($_SESSION['con'], "UPDATE enterprises SET " . $name . "='" . $value . "' WHERE enterprise_id='" . $_SESSION['enterprise_id'] . "';");
    if ($update_category) {
        echo "Cập nhật thành công!";
    } else {
        echo "Cập nhật thất bại!";
    }
}
