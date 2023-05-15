<?php
session_start();
require_once '../config.php';



// Câu lệnh truy vấn SQL để lấy các trường sotien, description và thoigiannap
<<<<<<< HEAD
$sql = "SELECT * FROM dailygamevn";
=======
$sql = "SELECT * FROM dailygame";
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);

// Tạo bảng HTML để hiển thị kết quả truy vấn

<<<<<<< HEAD
echo "<tr><th>STT</th><th>số tiền nạp</th><th>mô tả</th><th>ngày</th></tr>";
=======
echo "<tr><th>Ngày</th><th>Mô tả</th><th>số tiền nạp</th><th>số dư</th></tr>";
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {

<<<<<<< HEAD
    echo "<tr><td>" . $row['id'] . "</td><td>" . separateString($row['sotiennap']) . "</td><td>" . $row['mota'] . "</td><td>" . $row['ngay'] . "</td></tr>";
=======
    echo "<tr><td>" . $row['ngay'] . "</td><td>" . $row['mota'] . "</td><td>" . $row['sotiennap'] . "</td><td>" . $row['sodu'] . "</td></tr>";
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05
}


// Đóng kết nối
mysqli_close($conn);
<<<<<<< HEAD
function separateString($string) {
        $reversed = strrev($string);
        $chunks = str_split($reversed, 3);
        $result = implode(',', $chunks);
        return strrev($result);
    }
=======

>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05
