<?php
session_start();
require_once '../config.php';
$current_daily  = $_SESSION["vdtt-daily"];


$sql = "SELECT tendaily, madaily,game, cuphap_nap , facebook, sdt, stk_dangky, stk_nhan, tongnap FROM daily_acc WHERE role = 'daily' and login_name = '{$_SESSION['vdtt-daily']}'";
echo $sql;