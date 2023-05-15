<?php
session_start();
require_once '../config.php';
$current_daily  = $_SESSION["username"];
$sql = "SELECT sotien, username, status FROM webhook WHERE daily = '$current_daily' ORDER BY id DESC";

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);

// Tạo bảng HTML để hiển thị kết quả truy vấn

echo "<tr><th>GP</th><th>username</th><th>status</th></tr>";

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {
  	$gp = separateString($row['sotien']);
    echo "<tr><td>" . $gp . "</td><td>" . $row['username'] . "</td><td>" . $row['status'] . "</td></tr>";
}

// Đóng kết nối
mysqli_close($conn);
        
function separateString($string) {
        $reversed = strrev($string);
        $chunks = str_split($reversed, 3);
        $result = implode(',', $chunks);
        return strrev($result);
    }