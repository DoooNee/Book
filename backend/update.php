<?php
	session_start();
    require_once '../config.php';



// Giá trị mới cho trường "game"
$newGameValue = "VÕ ĐÀI";

// Câu lệnh SQL UPDATE
$sql = "UPDATE daily_acc SET game = '$newGameValue' WHERE id = 5";

if ($conn->query($sql) === TRUE) {
    echo "Cập nhật thành công";
} else {
    echo "Lỗi cập nhật: " . $conn->error;
}