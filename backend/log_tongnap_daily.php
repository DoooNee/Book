<?php
	session_start();
    require_once '../config.php';
	//$sql = "SELECT tendaily, tongnap,tong_thangtruoc FROM daily_acc WHERE id < 8";
<<<<<<< HEAD
	$sql = "SELECT tendaily, tongnap,tong_thangtruoc, hoahong_thangtruoc FROM daily_acc WHERE role = 'daily'";	
=======
	$sql = "SELECT tendaily, tongnap,tong_thangtruoc FROM daily_acc WHERE role = 'daily'";	
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);
// Tạo bảng HTML để hiển thị kết quả truy vấn

<<<<<<< HEAD
echo "<tr><th>Tên đại lý</th><th>Tổng tháng này</th><th>Hoa hồng tháng này</th><th>Tổng tháng trước</th><th>Hoa hồng tháng trước</th></tr>";
=======
echo "<tr><th>Tên đại lý</th><th>Tổng tháng này</th><th>Tổng tháng trước</th></tr>";
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {
  $thangnay = separateString($row['tongnap']);
  $thangtruoc = separateString($row['tong_thangtruoc']);
<<<<<<< HEAD
  $hoahong_thangtruoc = separateString($row['hoahong_thangtruoc']);
  $hoahong = tinhHoaHong($row['tongnap']);
  
  
  echo "<tr><td>" . $row['tendaily'] . "</td><td>" . $thangnay . "</td><td>" . $hoahong . "</td><td>" . $thangtruoc . "</td><td>" . $hoahong_thangtruoc . "</td></tr>";
=======
  echo "<tr><td>" . $row['tendaily'] . "</td><td>" . $thangnay . "</td><td>" . $thangtruoc . "</td></tr>";
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05

}

// Đóng kết nối
mysqli_close($conn);
function separateString($string) {
        $reversed = strrev($string);
        $chunks = str_split($reversed, 3);
        $result = implode(',', $chunks);
        return strrev($result);
<<<<<<< HEAD
    }




function tinhHoaHong($thangnay) {
  if ($sotienthangnay < 200000000) {
    $hoaHong = $thangnay * 0.04;
  } else {
    $hoaHong = $thangnay * 0.05;
  }
  return number_format($hoaHong, 0, ",", ",");
}
=======
    }
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05
