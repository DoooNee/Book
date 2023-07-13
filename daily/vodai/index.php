<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Võ Đài</title>
    <link rel="stylesheet" href="/admin//assets/css/admin_game.css">
    <script src="/admin/assets/js/jquery.js"></script>
    <script src="/admin/assets/js/sweetalert.js"></script>
</head>

<body>
    <div class="wrapper">
        <!--======================= ADMIN ============================-->
        <div class="admin_wrapper">
            <!-- nav -->
            <div class="nav">
                <div class="user">
                    <i class="fa-solid fa-user"></i><span class="user_name"></span>
                </div>
            </div>
            <!-- title -->
            <div class="title">
                <h1 id="title_id">
                    ADMIN VÕ ĐÀI TỐI THƯỢNG
                </h1>
                <label for="nav_mb" id="nav-icon3" style="z-index: 11;">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </label>

                <div class="nav_fade">
                    <input type="checkbox" id="nav_mb">
                    <div class="nav_wrapper">
                        <ul>
                            <label for="nav_mb">
                                <li class="dashboard"><a href="javascript:showADMIN();"><i class="fa-solid fa-user"></i>DashBoard</a></li>
                            </label>
                            <li class="inforDaiLy"><a href="javascript:showTTDaiLy();"><i class="fa-solid fa-user"></i>Thông
                                    Tin Đại Lý</a></li>
                            <li class="admin" id=""><a href="javascript:showSaoKe();"><i class="fa-solid fa-hammer"></i>Sao Kê Đại Lý</a></li>
                            <li class="exit"> <a href="/backend/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Đăng Xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="overflow: hidden;width: auto;height: auto;">
                <p class="thong_bao"></p>
            </div>
            <!-- container -->
            <div class="container">
                <div class="sidebar">
                    <ul>
                        <li class="admin" id=""><a href="javascript:showADMIN();"><i class="fa-solid fa-hammer"></i>Dashboard</a></li>
                        <li class="admin" id=""><a href="javascript:showTTDaiLy();"><i class="fa-solid fa-hammer"></i>Thông tin đại lý</a></li>
                        <li class="admin" id=""><a href="javascript:showSaoKe();"><i class="fa-solid fa-hammer"></i>Sao kê đại lý</a></li>
                        <li class="exit"> <a href="/backend/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Đăng Xuất</a></li>
                    </ul>
                </div>
                <div class="content">
                    <!--  admin -->
                    <div class="content_admin">
                        <ul class="sidebar_content ">
                            <li class="lich_su_nap_admin "><a href="javascript:lichSuNapAD();"> Lịch Sử Nạp</a></li>
                            <li class="lich_su_chuyen_admin "><a href="javascript:lichSuChuyenAD('<?php echo $_SESSION["username"] ?>');"> Lịch Sử Chuyển </a></li>
                        </ul>
                        <div class="bang_lich_su_admin">
                            <table id="table_lich_su_nap" class="table">
                            </table>
                        </div>
                    </div>
                    <!-- tongnap -->
                    <div class="tongnap_daily">
                        <table id="table_ttDaiLy">

                        </table>
                    </div>
                    <!-- saoke -->
                    <div style="display:none;" class="saoke_daily">
                        <ul class="sidebar_content1 ">
                            <li class="lich_su_nap "><a href="javascript:getSaoKe('DailyGame');">DailyGame</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('QuyenQuyen');">QuyenQuyen</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('NguyenQuangTung');">NguyenQuangTung</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('Weacc');">Weacc</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('Minato');">Minato</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('SonHeroGaming');">SonHeroGaming</a></li>
                        </ul>
                        <div class="bang_saoke">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==================== END ADMIN ==============================-->

        <!--===================== DAILY ========================-->
        <div class="daily_wrapper" style="display:none">
            <!-- nav -->
            <div class="nav">
                <div class="user">
                    <i class="fa-solid fa-user"></i><span class="user_name"></span>
                </div>
                <div class="nav_soDu"><i class="fa-solid fa-wallet"></i>Số dư ví (GP): <span class="GP">0</span></div>
            </div>
            <div class="title">

                <h1 id="title_id">
                    ĐẠI LÝ
                </h1>
                <label for="nav_mb" id="nav-icon3" style="z-index: 11;">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
                <div class="nav_fade">
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
                        <h4>Số Tiền Nạp Tháng 6 2023</h4>
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
                </div>
            </div>



            <!--================= END DAILY =======================-->


            <!--==================== CTV =======================-->
            <div style="display: none;" class="ctv_wrapper">
                <div class="admin_wrapper">
                    <!-- nav -->
                    <div class="nav">
                        <div class="user">
                            <i class="fa-solid fa-user"></i><span class="user_name"></span>
                        </div>
                        <div class="nav_soDu"><i class="fa-solid fa-wallet"></i>Số dư ví (GP): <span class="GP">0</span></div>
                    </div>
                    <!-- title -->
                    <div class="title">

                        <h1 id="title_id">
                            CTV
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
                    <!-- container -->
                    <div class="container">
                        <div class="sidebar">
                            <ul>
                                <li class="dashboard"><a href="javascript:showDashBoard();"><i class="fa-solid fa-user"></i>DashBoard</a></li>
                                <li class="inforDaiLy"><a href="javascript:showTTDaiLy();"><i class="fa-solid fa-user"></i>Thông
                                        Tin Đại Lý</a></li>
                                <li class="chinh_sach"><a href="javascript:showChinhSach();"><i class="fa-solid fa-book-open"></i></i>Chính Sách Đại Lý</a></li>
                                <li class="code_thang"><a href="javascript:showCODE();"><i class="fa-solid fa-gift"></i>Kho CODE Tháng</a></li>
                                <li class="admin" id=""><a href="javascript:showADMIN();"><i class="fa-solid fa-hammer"></i>ADMIN</a></li>
                                <li class="admin" id=""><a href="javascript:showTongNap();"><i class="fa-solid fa-hammer"></i>Thông tin đại lý</a></li>
                                <li class="admin" id=""><a href="javascript:showSaoKe();"><i class="fa-solid fa-hammer"></i>Sao kê đại lý</a></li>
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
                                <h4>Số Tiền Nạp Tháng 6 2023</h4>
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
                        </div>
                    </div>
                </div>
            </div>
            <!--=================== CTV =======================-->

        </div>
        <!--===================== END DAILY ========================-->

        <!--===================== CTV ========================-->
        <div class="ctv_wrapper" style="display:none">
            <!-- nav -->
            <div class="nav">
                <div class="user">
                    <i class="fa-solid fa-user"></i><span class="user_name"></span>
                </div>
                <div class="nav_soDu"><i class="fa-solid fa-wallet"></i>Số dư ví (GP): <span class="GP">0</span></div>
            </div>
            <!-- title -->
            <div class="title">

                <h1 id="title_id">
                    CỘNG TÁC VIÊN
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
                            <li class="admin" id=""><a href="javascript:showTongNap();"><i class="fa-solid fa-hammer"></i>Thông tin đại lý</a></li>
                            <li class="exit"> <a href="/backend/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Đăng Xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style="overflow: hidden;width: auto;height: auto;">
                <p class="thong_bao"></p>
            </div>
            <!-- container -->
            <div class="container">
                <div class="sidebar">
                    <ul>
                        <li class="admin" id=""><a href="javascript:showADMIN();"><i class="fa-solid fa-hammer"></i>ADMIN</a></li>
                        <li class="admin" id=""><a href="javascript:showTongNap();"><i class="fa-solid fa-hammer"></i>Thông tin đại lý</a></li>
                        <li class="admin" id=""><a href="javascript:showSaoKe();"><i class="fa-solid fa-hammer"></i>Sao kê đại lý</a></li>
                        <li class="exit"> <a href="/backend/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Đăng Xuất</a></li>
                    </ul>
                </div>
                <div class="content">
                    <!-- <div class="content_dashboard">
                        <ul class="sidebar_content ">
                            <li class="lich_su_nap "><a href="javascript:lichSuNap();"> Lịch Sử Nạp</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:lichSuChuyen();"> Lịch Sử Chuyển </a></li>
                        </ul>
                        <div class="bang_lich_su">
                            <table id="table">
                            </table>
                        </div>
                    </div> -->

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
                        <h4>Số Tiền Nạp Tháng 6 2023</h4>
                        <div class="content_inforDaiLy_form"><span class="tongthangtruoc"></span></div>
                        <h4>Tổng Nạp (GP)</h4>
                        <div class="content_inforDaiLy_form"><span class="tongnap"></span></div>
                        <h4>Số Dư (GP)</h4>
                        <div class="content_inforDaiLy_form"><span class="sodu"></span></div>
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
                    <!-- tongnap -->
                    <div class="tongnap_daily">
                        <table>
                        </table>
                    </div>
                    <!-- saoke -->
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
                </div>
            </div>
        </div>
        <!--===================== END CTV ========================-->
    </div>


    <script src="/admin/assets/js/admin_game.js"></script>
</body>

</html>