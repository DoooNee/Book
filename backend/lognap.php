<?php
session_start();
require_once '../config.php';
$current_daily  = $_SESSION["vdtt-daily"];


// Câu lệnh truy vấn SQL để lấy các trường sotien, description và thoigiannap
$sql = "SELECT sotien, description, thoigiannap FROM webhook WHERE daily = '$current_daily' ORDER BY id DESC";

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);

// Tạo bảng HTML để hiển thị kết quả truy vấn

echo "<tr><th>Số tiền</th><th>Mô tả</th><th>Thời gian</th></tr>";

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {
  $sotien = separateString($row['sotien']);
    echo "<tr><td>" . $sotien . "</td><td>" . $row['description'] . "</td><td>" . $row['thoigiannap'] . "</td></tr>";
}


// Đóng kết nối
mysqli_close($conn);


function separateString($string) {
        $reversed = strrev($string);
        $chunks = str_split($reversed, 3);
        $result = implode(',', $chunks);
        return strrev($result);
    }