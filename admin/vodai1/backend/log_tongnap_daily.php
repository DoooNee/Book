<?php
	session_start();
    require_once '../config.php';
	//$sql = "SELECT tendaily, tongnap,tong_thangtruoc FROM daily_acc WHERE id < 8";
	$sql = "SELECT tendaily, tongnap,tong_thangtruoc, hoahong_thangtruoc , stk_nhan, stk_dangky, sdt FROM daily_acc WHERE role = 'daily'";	

// Thực thi câu lệnh truy vấn
$result = mysqli_query($conn, $sql);
// Tạo bảng HTML để hiển thị kết quả truy vấn

echo "<tr><th>Tên đại lý</th><th>Tổng tháng 7</th><th>Hoa hồng tháng 7</th><th>Tổng tháng 6</th><th>Hoa hồng tháng 6</th><th>STK đăng ký đại lý</th><th>STK nhận hoa hồng</th><th>SĐT</th></tr>";

// Duyệt qua các bản ghi trả về từ câu lệnh truy vấn
while ($row = mysqli_fetch_assoc($result)) {
  $thangnay = separateString($row['tongnap']);
  $thangtruoc = separateString($row['tong_thangtruoc']);
  $hoahong_thangtruoc = separateString($row['hoahong_thangtruoc']);
  $hoahong = tinhHoaHong($row['tongnap']);
  
  
  echo "<tr><td>" . $row['tendaily'] . "</td><td>" . $thangnay . "</td><td>" . $hoahong . "</td><td>" . $thangtruoc . "</td><td>" . $hoahong_thangtruoc ."</td><td class='stk'>" . $row['stk_dangky'] . "</td><td class='stk'>" . $row['stk_nhan'] . "</td><td>" . $row['sdt'] . "</td></tr>";

}

// Đóng kết nối
mysqli_close($conn);
function separateString($string) {
        $reversed = strrev($string);
        $chunks = str_split($reversed, 3);
        $result = implode(',', $chunks);
        return strrev($result);
    }




function tinhHoaHong($thangnay) {
//  intval($stringNumber)
  if ($thangnay < 200000000) {
    $hoaHong = $thangnay * 0.04;
  } else {
    $hoaHong = $thangnay * 0.05;
  }
  return number_format($hoaHong, 0, ",", ",");
}