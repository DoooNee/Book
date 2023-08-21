<?php

	session_start();
    require_once '../config.php';

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }


    // Kiểm tra xem dữ liệu đã được gửi từ Ajax hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['role'])) {
    // Lấy giá trị role và game từ dữ liệu gửi từ Ajax
    $role = $_POST['role'];

    // Kiểm tra role có phải là 'admin' không
    if ($role === 'admin' or $role === 'ctv') {
        // Xây dựng câu truy vấn SQL
        $sql = "SELECT sotien, description, thoigiannap FROM lognap_vodai ORDER BY id DESC";
        $result = $conn->query($sql);

        // Kiểm tra và xử lý kết quả truy vấn
        if ($result->num_rows > 0) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                // Thêm các dòng dữ liệu vào mảng $data
                $data[] = $row;
            }

            // Đóng kết nối cơ sở dữ liệu
            $conn->close();

            // Chuyển đổi mảng $data thành chuỗi JSON
            $jsonResponse = json_encode($data);

            // Trả về kết quả dưới dạng JSON
            echo $jsonResponse;
        } else {
            echo "Không có dữ liệu phù hợp.";
        }
    } else {
        echo "Bạn không có quyền truy cập.";
    }
} else {
    echo "Dữ liệu không hợp lệ.";
}


?>