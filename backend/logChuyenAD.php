<?php
	session_start();
    require_once '../config.php';

$sql = "SELECT id, sotien, username, status FROM webhook";

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);

// Tạo bảng HTML để hiển thị kết quả truy vấn

echo "<tr><th>GP</th><th>Tên nhân vật</th><th>Trạng thái</th><th></th></tr>";

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {

echo "<tr><td>" . $row['sotien'] . "</td><td>" . $row['username'] . "</td><td>" . $row['status'] . "</td><td><div class='search disabled'><a href='javascript:submitStatus(`" . $row['id'] . "`);'>Submit</a></div></td></tr>";
    // echo "<tr><td>" . $row['sotien'] . "</td><td>" . $row['username'] . "</td><td>" . $row['status'] . "</td></tr>";
}

// Đóng kết nối
mysqli_close($conn);

?>