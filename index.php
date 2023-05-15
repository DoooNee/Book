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
    <link rel="stylesheet" href="/assets/css/index.css?v=0.0.2">

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
                        <li class="admin" id=""><a href="javascript:showTongNap();"><i class="fa-solid fa-hammer"></i>Tổng nạp đại lý</a></li>
                        <li class="admin" id=""><a href="javascript:showInforDaily();"><i class="fa-solid fa-hammer"></i>Thông tin đại lý</a></li>
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
                    <li class="admin" id=""><a href="javascript:showTongNap();"><i class="fa-solid fa-hammer"></i>Tổng nạp đại lý</a></li>
                    <li class="admin" id=""><a href="javascript:showSaoKe();"><i class="fa-solid fa-hammer"></i>Sao kê đại lý</a></li>
                    <li class="admin" id=""><a href="javascript:showInforDaily();"><i class="fa-solid fa-hammer"></i>Thông tin đại lý</a></li>
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
                    <h4>Số Tiền Nạp Tháng 4 2023</h4>
                    <div class="content_inforDaiLy_form"><span class="tongthangtruoc"></span></div>
                    <h4>Tổng Nạp (GP)</h4>
                    <div class="content_inforDaiLy_form"><span class="tongnap"></span></div>
                    <h4>Số Dư (GP)</h4>
                    <div class="content_inforDaiLy_form"><span class="sodu"></span></div>
                </div>

                <div class="content_chich_sach">

                    <h4>1. ĐIỀU KIỆN LÀM ĐẠI LÝ</h4>
                    <ul>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Tổng nạp từ 50m VNĐ trở lên (không tính các khuyến mãi vàng).</p>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Chuyển khoản từ " số tài khoản ngân hàng " đăng ký làm đại lý. </p>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Hàng tháng chuyển khoản tối thiểu từ 1 triệu VNĐ trở lên.</p>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Đăng ký làm đại lý tại facebook Admin Nezuko Kamado(admin duy nhất của game): <a href="https://www.facebook.com/profile.php?id=100088693733238">https://www.facebook.com/profile.php?id=100088693733238 </a> </p>
                    </ul>

                    <h4>2. THÔNG TIN CHUYỂN KHOẢN</h4>
                    <ul>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Số tài khoản: 31072787</p>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Tên chủ tài khoản: DO THI TIEN</p>
                        <p> <i class="fa-solid fa-fire-flame-simple"></i> Tên ngân hàng: ACB (Ngân hàng thương mại cổ phần Á Châu)</p>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Chi nhánh: ACB - PGD BINH TRIEU</p>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Cú Pháp khi nạp: NAPDL_"tên tài khoản_"mã đại lý"</p>
                    </ul>

                    <h4>3. ƯU ĐÃI KHI ĐẠI KÝ CHUYỂN KHOẢN</h4>
                    <ul>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Ưu đãi của người nhận</p>
                        <li>+ Người chơi nhận thêm 6% GP cộng thẳng vào tài khoản ví</li>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Ưu đãi của người nhận</p>
                        <li>+ Nhận code đặc biệt hàng tháng</li>
                        <li>+ Được hưởng hoa hồng hàng tháng.</li>
                        <li>+ Hoa hồng 4% nếu doanh số tháng dưới 200 triệu. </li>
                        <li>+ Hoa hồng 5% nếu doanh số tháng từ 200 triệu trở lên. </li>
                    </ul>

                    <h4>4. NOTE</h4>
                    <ul style="margin-bottom: 2w;">
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Các đại lý tạo doc riêng share quyền cho gmail của Admin</p>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Ngày đầu tiên mỗi tháng sẽ tiến hành đối soát, thời gian đối soát từ 3-5 ngày</p>
                        <p><i class="fa-solid fa-fire-flame-simple"></i> Hoa Hồng sẽ được gửi vào ngày 15 hàng tháng thông qua chuyển khoản ATM</p>
                    </ul>

                    <div class="bottom_chinh_sach"></div>
                </div>

                <div class="content_kho_code">
                    <a href="">CODE tháng</a>
                </div>

                <!--  admin -->
                <div class="content_admin">
                    <ul class="sidebar_content ">
                        <li class="lich_su_nap_admin "><a href="javascript:lichSuNapAD();"> Lịch Sử Nạp</a></li>
                        <li class="lich_su_chuyen_admin "><a href="javascript:lichSuChuyenAD();"> Lịch Sử Chuyển </a></li>
                    </ul>
                    <div class="bang_lich_su_admin">
                        <table class="table">
                            <!-- <tr>
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
                            </tr> -->
                        </table>
                    </div>
                </div>

                <div class="tongnap_daily">
                    <table>

                    </table>
                </div>


                <div class="saoke_daily">
                    <ul class="sidebar_content1 ">
                        <li class="lich_su_nap "><a href="javascript:getSaoKeDailyGame();">DailyGame</a></li>
                        <li class="lich_su_chuyen "><a href="javascript:getSaoKeQuyenQuyen();">QuyenQuyen</a></li>
                        <li class="lich_su_chuyen "><a href="javascript:getSaoKeNguyenQuangTung();">NguyenQuangTung</a></li>
                        <li class="lich_su_chuyen "><a href="javascript:getSaoKeWeacc();">Weacc</a></li>
                        <li class="lich_su_chuyen "><a href="javascript:getSaoKeMinato();">Minato</a></li>
                        <li class="lich_su_chuyen "><a href="javascript:getSaoKeSonHeroGaming();">SonHeroGaming</a></li>
                    </ul>
                    <div class="bang_saoke">
                    </div>
                </div>

                <div class="infor_daily">
                    <table>
                        <tr>
                            <th>Tên đại lý</th>
                            <th>Tên đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Mã đại lý</th>
                            <th>Facebook</th>
                            <th>SĐT</th>
                            <th>STK đăng ký đại lý</th>
                            <th>STK nhận hoa hồng</th>
                        </tr>
                        <tr>
                            <td>DailyGameVN</td>
                            <td>Dailygamevn</td>
                            <td>daily77036</td>
                            <td>DLDG</td>
                            <td><a href="https://www.facebook.com/soiden2210">https://www.facebook.com/soiden2210</a></td>
                            <td>036.377.1361</td>
                            <td>0451000240040- Vietcombank</td>
                            <td>0451000240040
                                - Vietcombank
                                - Nguyen Quang Huy</td>

                        </tr>
                        <tr>
                            <td>Quyền Quyền</td>
                            <td>QuyenQuyen</td>
                            <td>quyen87510</td>
                            <td>DLQQ</td>
                            <td><a href="https://www.facebook.com/profile.php?id=100010839150318">https://www.facebook.com/profile.php?id=100010839150318</a></td>

                            <td>0788.055.101</td>
                            <td>030063122277
                                - Sacombank
                                - Nguyễn Văn Quyền</td>
                            <td>030063122277
                                - Sacombank
                                - Nguyễn Văn Quyền</td>

                        </tr>
                        <tr>
                            <td>Nguyễn Quang Tùng</td>
                            <td>QuangTung</td>
                            <td>tung836853</td>
                            <td>DLQT</td>
                            <td><a href="https://www.facebook.com/tungpio12">https://www.facebook.com/tungpio12</a></td>

                            <td>0962.885.130</td>
                            <td>0801000292751-
                                Vietcombank-
                                Nguyễn Quang Tùng</td>
                            <td>0801000292751-
                                Vietcombank-
                                Nguyễn Quang Tùng</td>

                        </tr>
                        <tr>
                            <td>Weacc (Nông Văn Doanh)</td>
                            <td>Weacc</td>
                            <td>Weacc69197</td>
                            <td>DLWE</td>
                            <td><a href="https://www.facebook.com/hnaod2000/">https://www.facebook.com/hnaod2000/</a></td>

                            <td>0369.877.911</td>
                            <td>9369877911
                                - Vietcombank
                                - Nông Văn Doanh</td>
                            <td>9369877911
                                - Vietcombank
                                - Nông Văn Doanh</td>

                        </tr>
                        <tr>
                            <td>Minato</td>
                            <td>Minato</td>
                            <td>Minato79623</td>
                            <td>DLMT</td>
                            <td><a href="https://www.facebook.com/trongphuctrade">https://www.facebook.com/trongphuctrade</a></td>

                            <td>347932255</td>
                            <td>0021000442860
                                - Vietcombank
                                - Đặng Trọng Phúc
                                - 0347932255
                                - VPbank
                                đặng trọng phúc</td>
                            <td>0021000442860
                                - Vietcombank
                                - Đặng Trọng Phúc</td>

                        </tr>
                        <tr>
                            <td>SonHero Gaming</td>
                            <td>SonHero</td>
                            <td>Sonhero8504</td>
                            <td>DLSH</td>
                            <td><a href="https://www.facebook.com/SonHeroHaHa">https://www.facebook.com/SonHeroHaHa</a></td>

                            <td>349625408</td>
                            <td>0349625408
                                - TPbank
                                - Nguyễn Hồng Sơn</td>
                            <td>0349625408
                                - TPbank
                                - Nguyễn Hồng Sơn</td>


                    </table>
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
    <script src="/assets/js/js.js?v=0.2.7"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>