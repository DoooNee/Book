<?php 
    session_start();
    require_once '../config.php';
	// Kiểm tra kết nối
	if ($conn->connect_error) {
	    die("Kết nối không thành công: " . $conn->connect_error);
	}


    $name = $_POST['name'];

   // Escape biến 'name' để tránh SQL injection
   $escapedName = $conn->real_escape_string($name);

   // Tạo câu truy vấn SQL
   $sql = "SELECT game FROM daily_acc WHERE login_name = '$escapedName'";

   // Thực thi truy vấn SQL
   $result = $conn->query($sql);

   // Kiểm tra và xử lý kết quả truy vấn
   if ($result->num_rows > 0) {
       // Lặp qua từng dòng kết quả
       while ($row = $result->fetch_assoc()) {
           // Lấy dữ liệu cột 'game'
           $game = $row['game'];

           // Xử lý dữ liệu hoặc trả về kết quả cho Ajax
           // ...

           // Thêm giá trị vào mảng
           $data[] = $game;
       }
   } else {
       // Không tìm thấy kết quả phù hợp
       // ...
   }

   echo json_encode($data);

   // Đóng kết nối
   $conn->close();