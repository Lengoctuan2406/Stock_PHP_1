<?php
session_start();
$_SESSION['enterprise_id']="";
$_SESSION['enterprise_code']="Doanh nghiệp";
$_SESSION['enterprise_name']="";
include('database/connect.php');
header('location:dashboard.php');
