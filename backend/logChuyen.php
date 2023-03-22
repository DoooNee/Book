<?php
session_start();
require_once '../config.php';
$current_daily  = $_SESSION["username"];
$sql = "SELECT sotien, username, status FROM webhook WHERE daily = '$current_daily'";

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);

// Tạo bảng HTML để hiển thị kết quả truy vấn

echo "<tr><th>GP</th><th>username</th><th>status</th></tr>";

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row['sotien'] . "</td><td>" . $row['username'] . "</td><td>" . $row['status'] . "</td></tr>";
}

// Đóng kết nối
mysqli_close($conn);
        