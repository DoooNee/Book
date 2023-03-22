<?php
	    
    require_once '../config.php';

// Nhận dữ liệu từ Ajax
$username = $_POST['username'];

// Câu lệnh truy vấn SQL để cập nhật trường status
$sql = "UPDATE webhook SET status = 'Success' WHERE id = '$username'";

// Thực thi câu lệnh truy vấn
if (mysqli_query($conn, $sql)) {
    $data = array( "status" => 'success'); 
} else {
    $data = array( "status" => 'fail');
}
echo json_encode($data);

// Đóng kết nối
mysqli_close($conn);
exit;

?>