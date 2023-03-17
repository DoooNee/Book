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
    <link rel="stylesheet" href="/assets/css/index.css">

</head>

<body>
    <div class="wrapper">
        <div class="nav">
            <div class="user">
                <i class="fa-solid fa-user"></i><span class="user_name"></span>
            </div>
            <div class="nav_soDu"><i class="fa-solid fa-wallet"></i>Số dư ví (GP): <span class="GP">0</span></div>

        </div>

        <div class="title">
            <h1 id="title_id">
                DashBoard
            </h1>
        </div>

        <div style="overflow: hidden;width: auto;height: auto;">
            <p class="thong_bao"></p>
        </div>

        <div class="container">
            <div class="sidebar">
                <ul>
                    <li class="dashboard"><a href="javascript:showDashBoard();"><i class="fa-solid fa-user"></i>DashBoard</a></li>
                    <li class="inforDaiLy"><a href="javascript:showTTDaiLy();"><i class="fa-solid fa-user"></i>Thông
                            Tin Đại Lý</a></li>
                    <li class="chinh_sach"><a href="javascript:showChinhSach();"><i class="fa-solid fa-book-open"></i></i>Chính Sách Đại Lý</a></li>
                    <li class="code_thang"><a href="javascript:showCODE();"><i class="fa-solid fa-gift"></i>Kho CODE Tháng</a></li>
                    <li class="admin" id="admin"><a href="javascript:showADMIN();"><i class="fa-solid fa-hammer"></i>ADMIN</a></li>
                    <li class="exit"> <a href="/backend/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Đăng Xuất</a></li>
                </ul>

            </div>
            <div class="content">
                <div class="content_dashboard">
                    <ul class="sidebar_content ">
                        <li class="lich_su_nap "><a href="javascript:lichSuNap();"> Lịch Sử Nạp</a></li>
                        <li class="lich_su_chuyen "><a href="javascript:lichSuChuyen();"> Lịch Sử Chuyển </a></li>
                    </ul>
                    <div class="bang_lich_su">
                        <table id="table">
                        </table>
                    </div>
                </div>

                <div class="content_inforDaiLy">
                    <h2>Thông Tin Đại Lý</h2>
                    <h4>Tên</h4>
                    <div class="content_inforDaiLy_form "><span id="ten"></span></div>
                    <h4>CCCD</h4>
                    <div class="content_inforDaiLy_form"><span id="cccd"></span></div>
                    <h4>STK Ngân Hàng</h4>
                    <div class="content_inforDaiLy_form"><span id="stk"></span></div>
                    <h4>Email</h4>
                    <div class="content_inforDaiLy_form"><span id="mail"></span></div>
                    <h4>Tổng Nạp</h4>
                    <div class="content_inforDaiLy_form"><span id="tongNap"></span></div>
                    <h4>Số Dư Ví (GP)</h4>
                    <div class="content_inforDaiLy_form"><span class="GP"></span></div>
                </div>

                <div class="content_chich_sach">
                    CHÍNH SÁCH
                </div>

                <div class="content_kho_code">
                    KHO CODE
                </div>

                <!--  admin -->
                <div class="content_admin">
                    <ul class="sidebar_content ">
                        <li class="lich_su_nap_admin "><a href="javascript:lichSuNapAD();"> Lịch Sử Nạp</a></li>
                        <li class="lich_su_chuyen_admin "><a href="javascript:lichSuChuyenAD();"> Lịch Sử Chuyển </a></li>
                    </ul>
                    <div class="bang_lich_su_admin">
                        <table class="table">
                        </table>
                    </div>
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
    <script src="/assets/js/js.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>