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

    <div class="wrapper">
        <div class="nav">
            <div class="user">
                <i class="fa-solid fa-user"></i><span class="user_name"></span>
            </div>
            <div class="logout"><i class="fa-solid fa-right-from-bracket"></i><a href="/backend/logout.php">Đăng xuất</a></div>
        </div>

        <div class="title">
            <h1 id="title_id">
            </h1>
        </div>

        <div style="overflow: hidden;width: auto;height: auto;">
            <p class="thong_bao"></p>
        </div>


        <!-- container -->
        <!-- <div class="container">
            <div class="content_group">
                <div class="content ninja">
                    <a href="/ninja">
                        <img src="/assets/img/photo_2023-07-05_16-51-21.jpg" alt=""></a>
                    <div class="content_ninja_name">NINJA</div>
                </div>
                <div class="content vodai ">
                    <a href="/vodai">
                        <img src="/assets/img/photo_2023-07-05_16-51-21.jpg" alt=""></a>
                    <div class="content_ninja_name">VÕ ĐÀI TỐI THƯỢNG</div>
                </div>
            </div>
        </div> -->

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
    <script src="/assets/js/home.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>