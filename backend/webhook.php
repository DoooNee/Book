<?php
    require_once '../config.php';
    // Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents('php://input');

  // Phân tích dữ liệu JSON
  $json = json_decode($data);


//  $sotien =  $json->amount;
//  $mota =  $json->description;
//  $thoigiannap =  $json->when;


$sotien =  $json->data[0]->amount;
$mota =  $json->data[0]->description;
$thoigiannap =  $json->data[0]->when;



$daily = findDaiLy(strtolower($mota));
$madaily = findMaDaiLy(strtolower($mota));
  // Lưu thông tin cần thiết từ JSON vào cơ sở dữ liệu
  $sqldemo = "INSERT INTO demo (sotien, mota, thoigiannap) VALUES ('$sotien', '$mota','$thoigiannap')";
  $resultdemo = mysqli_query($conn, $sqldemo);



  $chuoicodinh = "NAPGP ";
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

  function findMaDaiLy($input) {
      if (strpos($input, 'dailygame91') !== false) {
        return 'dailygame91';
      }

      if (strpos($input, 'quyenvtv99') !== false) {
        return 'quyenvtv99';
      }

        if (strpos($input, '0981007879') !== false) {
          return '0981007879';
      }
      if (strpos($input, 'doanhhnaod2000') !== false) {
            return 'doanhhnaod2000';
       }

        if (strpos($input, 'sonleuvdtt') !== false) {
            return 'sonleuvdtt';
       }

      if (strpos($input, 'lingtocxu') !== false) {
          return 'lingtocxu';
      }
        if (strpos($input, 'TUNGN88513010') !== false) {
            return 'TUNGN88513010';
        }

      if (strpos($input, 'trongphuctradee') !== false) {
            return 'trongphuctradee';
        }
      if (strpos($input, 'sonherolangla') !== false) {
            return 'sonherolangla';
        }

    else return '';
  }

/////
  function findDaiLy($input) {
      if (strpos($input, 'dailygame91') !== false) {
        return 'DailyGameVN';
      }

      if (strpos($input, 'quyenvtv99') !== false) {
        return 'QuyenQuyen';
      }

        if (strpos($input, '0981007879') !== false) {
          return 'NgocKen';
      }
      if (strpos($input, 'doanhhnaod2000') !== false) {
            return 'Weacc';
       }

        if (strpos($input, 'sonleuvdtt') !== false) {
            return 'SonLeu';
       }

      if (strpos($input, 'lingtocxu') !== false) {
          return 'ZeniSieuRe';
      }
        if (strpos($input, 'TUNGN88513010') !== false) {
            return 'NguyenQuangTung';
        }

      if (strpos($input, 'trongphuctradee') !== false) {
            return 'Minato';
        }
      if (strpos($input, 'sonherolangla') !== false) {
            return 'SonHeroGaming';
        }

    else return '';
  }

  // Lưu thông tin cần thiết từ JSON vào cơ sở dữ liệu
//  $sql = "INSERT INTO webhook (daily, sotien, description, username,status , nguoi_chuyen, thoigiannap) VALUES ('$daily' ,'$sotien', '$mota','$username', '' , '', '$thoigiannap')";
  $sql = "INSERT INTO lognap_vodai (daily, sotien, description, username,status , nguoi_chuyen, thoigiannap) VALUES ('$daily' ,'$sotien', '$mota','$madaily', '' , '', '$thoigiannap')"; 
$result = mysqli_query($conn, $sql);


 $sql_money = "UPDATE daily_acc SET sodu = sodu + $sotien, tongnap = tongnap + $sotien WHERE tendaily = '$daily'";

 $result_money = mysqli_query($conn, $sql_money);



  if ($result && $result_money) {
      echo "Dữ liệu đã được lưu vào cơ sở dữ liệu";
  } else {
      echo "Lỗi: " . mysqli_error($conn);
  }
      mysqli_close($conn);