<?php
	session_start();
    require_once '../config.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }


    $role = $_POST['role'];
    $game = $_POST['game'];


// Kiểm tra role
if ($role == 'admin') {
  // Truy vấn SQL
  $sql = "SELECT id, sotien, username, status, nguoi_chuyen FROM lognap_$game ORDER BY id DESC";
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

// 	$nguoichuyen = $_SESSION["username"];
// $sql = "SELECT id, sotien, username, nguoi_chuyen , status FROM webhook ORDER BY id DESC";

// // Thực thi câu lệnh truy vấn
// $result = mysqli_query($conn, $sql);

// // Tạo bảng HTML để hiển thị kết quả truy vấn

// echo "<tr><th>GP</th><th>Tên nhân vật</th><th>Trạng thái</th><th>Người chuyển</th><th></th></tr>";

// // Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
// while ($row = mysqli_fetch_assoc($result)) {
// $gp = separateString($row['sotien']);
// echo "<tr><td>" . $gp . "</td><td>" . $row['username'] . "</td><td>" . $row['status']  . "</td><td>" .  $row['nguoi_chuyen'] . "</td><td><div class='search disabled'><a href='javascript:submitStatus(`" . $row['id'] . "`,`". $nguoichuyen ."`);'>Submit</a></div></td></tr>";
    
// }

// Đóng kết nối
// mysqli_close($conn);
function separateString($string) {
        $reversed = strrev($string);
        $chunks = str_split($reversed, 3);
        $result = implode(',', $chunks);
        return strrev($result);
    }
?>