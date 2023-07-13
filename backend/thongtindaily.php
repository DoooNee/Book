<?php
	session_start();
    require_once '../config.php';
    // Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


// Lấy giá trị role và game từ Ajax
$role = $_POST['role'];
$game = $_POST['game'];

// Kiểm tra nếu role là admin
if ($role == 'admin') {
  // Truy vấn SQL để lấy dữ liệu từ bảng daily_acc
  $sql = "SELECT tendaily, tongnap, tong_thangtruoc, hoahong_thangtruoc, stk_nhan, stk_dangky, sdt FROM daily_acc WHERE role = 'daily' and game = '$game'";

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
} else if($role == 'daily') {
    // Truy vấn SQL để lấy dữ liệu từ bảng daily_acc
    $sql = "SELECT tendaily, madaily, facebook, sdt, stk_dangky, stk_nhan, tongnap, tong_thangtruoc, hoahong_thangtruoc FROM daily_acc WHERE role = 'daily' and game = '$game' and login_name = '$_SESSION[username]'";

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
}

else {
  echo "Bạn không có quyền truy cập.";

}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
