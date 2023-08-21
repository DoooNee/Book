<?php
	session_start();
    require_once '../config.php';
    // Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy giá trị role và game từ Ajax
$role = $_POST['role'];
// $game = $_POST['game']
$game = 'vodai';
//$daily = strtolower($_POST['daily']);
$daily = $_POST['daily'];
// Kiểm tra nếu role là admin
if ($role == 'admin' or $role == 'ctv') {
    // Thực hiện truy vấn để lấy dữ liệu từ bảng $daily với điều kiện
    $sql = "SELECT id, sotiennap, mota, ngay FROM $daily";
  
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
} else {
echo "Bạn không có quyền truy cập.";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();