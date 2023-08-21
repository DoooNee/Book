<?php
	    
    require_once '../config.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

// Nhận dữ liệu từ Ajax
$role = $_POST['role'];
// $game = $_POST['game'];
$id = $_POST['id'];
$nguoichuyen = $_POST['nguoichuyen'];


if ($role == 'admin') {
    // Câu lệnh truy vấn SQL để cập nhật trường status
    $sql = "UPDATE lognap_vodai SET status = 'Success', nguoi_chuyen = '$nguoichuyen' WHERE id = '$id'";

    // Thực thi câu lệnh truy vấn
    if (mysqli_query($conn, $sql)) {
        $data = array( "status" => 'success'); 
    } else {
        //$data = array( "status" => 'fail');
    echo "Lỗi: " . mysqli_error($connection);
    }
    echo json_encode($data);

    // Đóng kết nối
    mysqli_close($conn);

}

exit;

?>