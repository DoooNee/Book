<?php
	session_start();
    require_once '../config.php';
	//$sql = "SELECT tendaily, tongnap,tong_thangtruoc FROM daily_acc WHERE id < 8";
	$sql = "SELECT tendaily, tongnap,tong_thangtruoc FROM daily_acc WHERE role = 'daily'";	

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);
// Tạo bảng HTML để hiển thị kết quả truy vấn

echo "<tr><th>Tên đại lý</th><th>Tổng tháng này</th><th>Tổng tháng trước</th></tr>";

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {
  $thangnay = separateString($row['tongnap']);
  $thangtruoc = separateString($row['tong_thangtruoc']);
  echo "<tr><td>" . $row['tendaily'] . "</td><td>" . $thangnay . "</td><td>" . $thangtruoc . "</td></tr>";

}

// Đóng kết nối
mysqli_close($conn);
function separateString($string) {
        $reversed = strrev($string);
        $chunks = str_split($reversed, 3);
        $result = implode(',', $chunks);
        return strrev($result);
    }