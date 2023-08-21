<?php
	session_start();
    require_once '../config.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }


    $role = $_POST['role'];
    // $game = $_POST['game'];


// Kiểm tra role
if ($role == 'admin' or $role == 'ctv') {
  // Truy vấn SQL
  $sql = "SELECT id, sotien, username, status, nguoi_chuyen FROM lognap_vodai ORDER BY id DESC";
  $result = $conn->query($sql);
  // Kiểm tra kết quả truy vấn
  if ($result->num_rows > 0) {
    $data = array();
    
    // Lấy từng dòng kết quả và thêm vào mảng $data
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    
    // Chuyển mảng $data thành định dạng JSON
    $json = json_encode($data);
    
    // Trả về kết quả dưới dạng JSON
    echo $json;
  } else {
    echo "Không có dữ liệu.";
  }
  $conn->close();
}
else {
    echo "Role không hợp lệ.";
  }

///////////////////////////////////

// Đóng kết nối
// mysqli_close($conn);
function separateString($string) {
        $reversed = strrev($string);
        $chunks = str_split($reversed, 3);
        $result = implode(',', $chunks);
        return strrev($result);
    }
?>