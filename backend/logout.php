<?php 
session_start();

unset($_SESSION["vdtt-daily"]);

header("Location: /"); // điều hướng về trang chủ
exit(); 