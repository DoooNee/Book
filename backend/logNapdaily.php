<?php
session_start();
require_once '../config.php';
$current_daily  = $_SESSION["username"];


// Lấy giá trị role và game từ Ajax
$role = $_POST['role'];
$game = $_POST['game'];


// Câu lệnh truy vấn SQL để lấy các trường sotien, description và thoigiannap
$sql = "SELECT sotien, description, thoigiannap FROM lognap_$game WHERE daily = '$current_daily' ORDER BY id DESC";

// Thực thi câu lệnh truy vấn
$result = $conn->query($sql);

  // Kiểm tra kết quả truy vấn
  if ($result->num_rows > 0) {
      $data = array();
      // Lặp qua các hàng dữ liệu
      while ($row = $result->fetch_assoc()) {
          $data[] = $row;
      }
      // Trả về dữ liệu dưới dạng JSON
      echo json_encode($data);
  } else {
      echo "Không có dữ liệu.";
  }


// Đóng kết nối
mysqli_close($conn);
