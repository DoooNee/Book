<?php
session_start();
require_once '../config.php';



// Câu lệnh truy vấn SQL để lấy các trường sotien, description và thoigiannap
$sql = "SELECT * FROM kunbanthe";

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);

// Tạo bảng HTML để hiển thị kết quả truy vấn

echo "<tr><th>Ngày</th><th>Mô tả</th><th>số tiền nạp</th><th>số dư</th></tr>";

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr><td>" . $row['ngay'] . "</td><td>" . $row['mota'] . "</td><td>" . $row['sotiennap'] . "</td><td>" . $row['sodu'] . "</td></tr>";
}


// Đóng kết nối
mysqli_close($conn);

