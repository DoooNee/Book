<?php 
session_start();

unset($_SESSION["username"]);

header("Location: /"); // điều hướng về trang chủ
exit(); 