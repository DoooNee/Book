<?php
// Khởi tạo phiên
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG CHỦ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/index.css?v=0.0.4">

</head>

<body>

    <?php
    // echo $_SESSION["username"];
    ?>
    <div class="wrapper">
        <div class="nav">
            <div class="user">
                <i class="fa-solid fa-user"></i><span class="user_name"></span>
            </div>
            <div class="nav_soDu"><i class="fa-solid fa-wallet"></i>Số dư ví (GP): <span class="GP">0</span></div>
        </div>

        <div class="title">
            <h1 id="title_id">
            </h1>
            <label for="nav_mb" id="nav-icon3" style="z-index: 11;">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </label>
            <div class="nav_fade" class="open">
                <input type="checkbox" id="nav_mb">
                <div class="nav_wrapper">
                    <ul class="">
                        <label for="nav_mb">
                            <li class="dashboard"><a href="javascript:showDashBoard();"><i class="fa-solid fa-user"></i>DashBoard</a></li>
                        </label>
                        <li class="inforDaiLy"><a href="javascript:showTTDaiLy();"><i class="fa-solid fa-user"></i>Thông
                                Tin Đại Lý</a></li>
                        <li class="chinh_sach"><a href="javascript:showChinhSach();"><i class="fa-solid fa-book-open"></i></i>Chính Sách Đại Lý</a></li>
                        <li class="code_thang"><a href="javascript:showCODE();"><i class="fa-solid fa-gift"></i>Kho CODE Tháng</a></li>
                        <li class="admin" id=""><a href="javascript:showTongNap();"><i class="fa-solid fa-hammer"></i>Thông tin đại lý</a></li>
                        <li class="exit"> <a href="/backend/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Đăng Xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div style="overflow: hidden;width: auto;height: auto;">
            <p class="thong_bao"></p>
        </div>

        <div class="container">
            <div class="content">
                <div class="content_ninja">
                    <a href="http://localhost:3000/ninja">
                        <img src="/assets/img/photo_2023-07-05_16-51-21.jpg" alt=""></a>
                    <div class="content_ninja_name">NINJA</div>
                </div>
                <div class="content_vodai content_ninja">
                    <a href="http://localhost:3000/vodai">
                        <img src="/assets/img/photo_2023-07-05_16-51-21.jpg" alt=""></a>
                    <div class="content_ninja_name">VÕ ĐÀI TỐI THƯỢNG</div>
                </div>
            </div>
        </div>


        <!-- ĐĂNG NHẬP -->
        <div class="wrapper_popup">
            <div class="popup">
                <div style="font-size: 1.5rem;font-weight: 600;text-align: center;">Đăng Nhập</div>
                <form action="">
                    <div class="form-group">
                        <label for="">Tên Đăng Nhập:</label><br>
                        <input class="ten_dang_nhap" type="text">
                    </div>

                    <div class="form-group">
                        <label for="">Mật Khẩu:</label> <br>
                        <input class="mat_khau" type="password">
                    </div>
                    <input onclick="login()" class="submit" type="button" value="Đăng Nhập">
                </form>
            </div>
        </div>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./assets/js/js.js?v=0.2.7"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>