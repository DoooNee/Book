<?php
session_start();
require_once '../config.php';



// Câu lệnh truy vấn SQL để lấy các trường sotien, description và thoigiannap
$sql = "SELECT * FROM nguyenquangtung1";

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);

// Tạo bảng HTML để hiển thị kết quả truy vấn

echo "<tr><th>STT</th><th>số tiền nạp</th><th>mô tả</th><th>ngày</th></tr>";

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr><td>" . $row['id'] . "</td><td>" . separateString($row['sotiennap']) . "</td><td>" . $row['mota'] . "</td><td>" . $row['ngay'] . "</td></tr>";
}


// Đóng kết nối
mysqli_close($conn);

function separateString($string) {
        $reversed = strrev($string);
        $chunks = str_split($reversed, 3);
        $result = implode(',', $chunks);
        return strrev($result);
    }
