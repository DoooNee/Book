<?php
require_once '../config.php';

// Lấy dữ liệu từ webhook
$data = file_get_contents('php://input');

// Phân tích dữ liệu JSON
$json = json_decode($data);



$sotien =  $json->data[0]->amount;
$mota =  $json->data[0]->description;
$thoigiannap =  $json->data[0]->when;

$daily = findDaiLy($mota);

$chuoicodinh = "NAPDL ";
$username = sliceUsername($mota, $chuoicodinh);
$status = "";

function sliceUsername($str_input, $codinh){

    //$str = "Hello, world!";
    $start = strpos($str_input, $codinh) + strlen($codinh);
    $result = substr($str_input, $start);
    // echo $result; // Output: "!" 
    
    $first_space_position = strpos($result, ' ');
    $substring = substr($result, 0, $first_space_position);
    // echo $first_space_position;
    return $substring;
}

function findDaiLy($input) {
    if (strpos($input, 'DLDG') !== false) {
        return 'DailyGameVN';
    }
//    if (strpos($input, 'DLNK') !== false) {
//        return 'NgocKenGaming';
 //   }

//  	if (strpos($input, 'DLBG') !== false) {
//          return 'BreakerG';
//     }
    if (strpos($input, 'DLQQ') !== false) {
          return 'QuyenQuyen';
      }
    if (strpos($input, 'DLQT') !== false) {
          return 'QuangTung';
      }
  if (strpos($input, 'DLWE') !== false) {
          return 'Weacc';
      }
  if (strpos($input, 'DLMT') !== false) {
          return 'Minato';
      }
  if (strpos($input, 'DLSH') !== false) {
          return 'SonHero';
      }


  else return '';
}

// Lưu thông tin cần thiết từ JSON vào cơ sở dữ liệu
$sql = "INSERT INTO webhook (daily, sotien, description, username,status , nguoi_chuyen, thoigiannap) VALUES ('$daily' ,'$sotien', '$mota', '$username', '' , '', '$thoigiannap')";
$result = mysqli_query($conn, $sql);


$sql_money = "UPDATE daily_acc SET sodu = sodu + $sotien, tongnap = tongnap + $sotien WHERE tendaily = '$daily'";
$result_money = mysqli_query($conn, $sql_money);





// Kiểm tra kết quả của câu lệnh SQL






if ($result && $result_money) {
    echo "Dữ liệu đã được lưu vào cơ sở dữ liệu";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}
	mysqli_close($conn);

