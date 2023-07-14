<?php
	session_start();
    require_once '../config.php';
    // Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy giá trị role và game từ Ajax
$game = $_POST['game'];
$daily = $_SESSION['username'];


// Xây dựng truy vấn SQL
$sql = "SELECT tongnap FROM daily_acc WHERE login_name = '$daily' AND game = '$game'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Tạo một mảng để chứa kết quả
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row['tongnap'];
    }

    // Chuyển đổi mảng thành định dạng JSON
    $json = json_encode($data);

    // Xuất kết quả dưới dạng JSON
    echo $json;
} else {
    echo "Không tìm thấy kết quả.";
}

$conn->close();
?>