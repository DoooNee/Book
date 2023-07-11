<?php
	session_start();
    
    $fullname = $cccd = $email = $tongnap = $GP = $status = $stk = $loginname = $role = $madaily = $facebook = $sdt = $stk_dangky = $stk_nhan = $sodu = $tong_thangtruoc = $link_code =$game = null;

    //unset($_SESSION["username"]);
    
    require_once '../config.php';
	// Kiểm tra kết nối
	if ($conn->connect_error) {
	    die("Kết nối không thành công: " . $conn->connect_error);
	}

    if(isset($_POST["action"]) == 'login'){
        // Lấy dữ liệu từ form đăng nhập
        $username = $_POST["loginname"];
        $password = md5(md5($_POST["password"]));

        // Kiểm tra tên đăng nhập và mật khẩu trong cơ sở dữ liệu
        $sql = "SELECT * FROM daily_acc WHERE login_name='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Đăng nhập thành công, lưu thông tin vào session
            $_SESSION["username"] = $username;
            //
            // thực hiện truy vấn SQL
            $result = mysqli_query($conn, "SELECT * FROM daily_acc WHERE login_name = '$username'");
            
            // lấy dữ liệu từ kết quả truy vấn và gán vào biến
            while ($row = mysqli_fetch_assoc($result)) {
                $fullname = $row["tendaily"];
                $madaily = $row["madaily"];
                $facebook = $row["facebook"];
                $sdt = $row["sdt"];
                $stk_dangky = $row["stk_dangky"];
                $stk_nhan = $row["stk_nhan"];
                $email = $row["Email"];
                $cccd = $row["cccd"];
                $tongnap = $row["tongnap"];
                $sodu = $row["sodu"];
                $tong_thangtruoc = $row["tong_thangtruoc"];
                $role = $row["role"];
              	$link_code = $row["link_code"];
            }
            // đóng kết nối
            mysqli_close($conn);
            //
            $status = "success";
            $isLogin = 1;
            
        } else {
            // Đăng nhập không thành công
            $status = "error";
            $isLogin = 0;
            
        }

        $data = array( "status" => $status, 
                        "isLogin" => $isLogin,
                        "fullname" => $fullname,
                        "madaily" => $madaily,
                        "facebook" => $facebook,
                        "sdt" => $sdt,
                        "stk_dangky" => $stk_dangky,
                        "stk_nhan" => $stk_nhan,
                        "email" => $email,
                        "cccd" => $cccd,
                        "tongnap" => $tongnap,
                        "sodu" => $sodu,
                        "tong_thangtruoc" => $tong_thangtruoc,
                        "role" => $role,
                      	"link_code" => $link_code
                    );
        echo json_encode($data);
        exit;

        $conn->close();
    }
    
    
    if (isset($_SESSION["username"])) {
		$isLogin = 1;
        $status = 'success';
        $loginname = $_SESSION["username"];
        // thực hiện truy vấn SQL
        $result = mysqli_query($conn, "SELECT * FROM daily_acc WHERE login_name = '$loginname'");
        
        // lấy dữ liệu từ kết quả truy vấn và gán vào biến
        while ($row = mysqli_fetch_assoc($result)) {
                $fullname = $row["tendaily"];
                $madaily = $row["madaily"];
                $facebook = $row["facebook"];
                $sdt = $row["sdt"];
                $stk_dangky = $row["stk_dangky"];
                $stk_nhan = $row["stk_nhan"];
                $email = $row["Email"];
                $cccd = $row["cccd"];
                $tongnap = $row["tongnap"];
                $sodu = $row["sodu"];
                $tong_thangtruoc = $row["tong_thangtruoc"];
                $role = $row["role"];
          		$link_code = $row["link_code"];
        }
        // đóng kết nối
        mysqli_close($conn);
    
	} else {
		$isLogin = 0;
	}
    // mảng thông tin người dùng
    $data = array("status" => $status, 
                    "isLogin" => $isLogin,
                    "fullname" => $fullname,
                    "madaily" => $madaily,
                    "facebook" => $facebook,
                    "sdt" => $sdt,
                    "stk_dangky" => $stk_dangky,
                    "stk_nhan" => $stk_nhan,
                    "email" => $email,
                    "cccd" => $cccd,
                    "tongnap" => $tongnap,
                    "sodu" => $sodu,
                    "tong_thangtruoc" => $tong_thangtruoc,
                    "role" => $role,
                  	"link_code" => $link_code
                    );


// hiển thị chuỗi JSON
echo json_encode($data);
    


	
exit;
	$conn->close();

    
?>
