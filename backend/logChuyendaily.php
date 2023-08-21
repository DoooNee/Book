<?php
session_start();
require_once '../config.php';
$current_daily  = $_SESSION["vdtt-daily"];


// Lấy giá trị role và game từ Ajax
$role = $_POST['role'];
// $game = $_POST['game'];
$game = 'vodai';


$sql = "SELECT sotien, username, status FROM lognap_$game WHERE daily = '$current_daily' ORDER BY id DESC";

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

  // Đóng kết nối cơ sở dữ liệu
$conn->close();