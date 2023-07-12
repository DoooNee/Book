<?php

	session_start();
    require_once '../config.php';

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }


    // Kiểm tra xem dữ liệu đã được gửi từ Ajax hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['role']) && isset($_POST['game'])) {
    // Lấy giá trị role và game từ dữ liệu gửi từ Ajax
    $role = $_POST['role'];
    $game = $_POST['game'];

    // Kiểm tra role có phải là 'admin' không
    if ($role === 'admin') {
        // Xây dựng câu truy vấn SQL
        $sql = "SELECT sotien, description, thoigiannap FROM lognap_$game WHERE game = '$game' ORDER BY id DESC";
        // echo $sql;
        // exit;
        // Thực hiện truy vấn SQL
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

// // Câu lệnh truy vấn SQL để lấy các trường sotien, description và thoigiannap
// $sql = "SELECT sotien, description, thoigiannap FROM webhook ORDER BY id DESC";

// // Thực thi câu lệnh truy vấn
// $result = mysqli_query($conn, $sql);

// // Tạo bảng HTML để hiển thị kết quả truy vấn

// echo "<tr><th>Số tiền</th><th>Mô tả</th><th>Thời gian</th></tr>";

// // Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
//     while ($row = mysqli_fetch_assoc($result)) {
//       $sotien = separateString($row['sotien']);
//         echo "<tr><td>" . $sotien . "</td><td>" . $row['description'] . "</td><td>" . $row['thoigiannap'] . "</td></tr>";
//     }



//     // Đóng kết nối
//     mysqli_close($conn);
//     function separateString($string) {
//         $reversed = strrev($string);
//         $chunks = str_split($reversed, 3);
//         $result = implode(',', $chunks);
//         return strrev($result);
//     }


?>