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
                        <li class="exit"> <a href="/backend/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Đăng Xuất</a></li>
                    </ul>
                </div>
            </div>
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
                    <li class="admin" id=""><a href="javascript:showADMIN();"><i class="fa-solid fa-hammer"></i>ADMIN</a></li>
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
                    <h4>Tên Đại Lý</h4>
                    <div class="content_inforDaiLy_form "><span id="ten"></span></div>
                    <h4>Mã Đại Lý</h4>
                    <div class="content_inforDaiLy_form"><span id="madaily"></span></div>
                    <h4>Facebook</h4>
                    <div class="content_inforDaiLy_form"><a target="_blank" id="facebook" href=""></a></div>
                    <h4>SĐT</h4>
                    <div class="content_inforDaiLy_form"><span id="sdt"></span></div>
                    <h4>STK Đăng Ký Đại Lý</h4>
                    <div class="content_inforDaiLy_form"><span id="stk_dangky"></span></div>
                    <h4>STK Nhận Hoa Hồng</h4>
                    <div class="content_inforDaiLy_form"><span class="stk_nganhang"></span></div>
                    <h4>Số Tiền Nạp Tháng 3 2023</h4>
                    <div class="content_inforDaiLy_form"><span class="tongthangtruoc"></span></div>
                    <h4>Tổng Nạp (GP)</h4>
                    <div class="content_inforDaiLy_form"><span class="tongnap"></span></div>
                    <h4>Số Dư (GP)</h4>
                    <div class="content_inforDaiLy_form"><span class="sodu"></span></div>
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
                            <tr>
                                <th>GP</th>
                                <th>Tên nhân vật</th>
                                <th>Trạng thái</th>
                                <th>Thời gian</th>
                            </tr>
                            <tr>
                                <td>10000</td>
                                <td>HGluxy</td>
                                <td> Đang xử lý</td>
                                <td>
                                    <div class="search disabled">
                                        Tìm
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>500</td>
                                <td>Walnuts</td>
                                <td> Hoàn thành</td>
                                <td>
                                    <div class="search">
                                        Tìm
                                    </div>
                                </td>
                            </tr>
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