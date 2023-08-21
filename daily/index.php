<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đại Lý</title>
    <link href="/daily/assets/img/cropped-cropped-icon_Logo-180x180.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="/daily/assets/css/daily_game.css?v=0.01">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/daily/assets/js/jquery.js"></script>
    <script src="/daily/assets/js/sweetalert.js"></script>

</head>

<body>
    <div class="wrapper">
        <!--===================== DAILY ========================-->
        <div class="daily_wrapper">
            <!-- nav -->
            <div class="nav">
                <div class="logo"><img src="/daily/assets/img/Logo_ngang-1.png" alt=""></div>
                <div class="nav_group_right">
                    <div class="user"><i class="fa-solid fa-user"></i><span class="user_name"></span></div>
                    <div class="nav_soDu"><i class="fa-solid fa-wallet"></i>Tổng Nạp: <span class="GP"></span></div>
                    <div class="logout"><i class="fa-solid fa-right-from-bracket"></i><a href="/backend/logout.php">Đăng xuất</a></div>
                </div>

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
                            <!-- <li class="code_thang"><a href="javascript:showCODE();"><i class="fa-solid fa-gift"></i>Kho CODE Tháng</a></li> -->
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
                        <li class="chinh_sach"><a href="javascript:showChinhSach();"><i class="fa-solid fa-book-open"></i>Chính Sách Đại Lý</a></li>
                        <!-- <li class="code_thang"><a href="javascript:showCODE();"><i class="fa-solid fa-gift"></i>Kho CODE Tháng</a></li> -->
                    </ul>
                </div>
                <div class="content">
                    <div class="content_dashboard">
                        <ul class="sidebar_content ">
                            <li class="lich_su_nap "><a href="javascript:lichSuNap();"> Lịch Sử Nạp</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:lichSuChuyen();"> Lịch Sử Chuyển </a></li>
                        </ul>
                        <div class="bang_lich_su">

                        </div>
                    </div>

                    <div class="content_inforDaiLy">
                        <h2>Thông Tin Đại Lý</h2>
                        <h4>Tên Đại Lý</h4>
                        <div class="content_inforDaiLy_form "><span id="ten"></span></div>
                        <h4>Mã Đại Lý</h4>
                        <div class="content_inforDaiLy_form"><span id="madaily"></span></div>
                        <h4>GAME</h4>
                        <div class="content_inforDaiLy_form"><span id="game"></span></div>
                        <h4>Cú pháp nạp</h4>
                        <div class="content_inforDaiLy_form"><span id="cuphap"></span></div>
                        <h4>Facebook</h4>
                        <div class="content_inforDaiLy_form"><a target="_blank" id="facebook" href=""></a></div>
                        <h4>SĐT</h4>
                        <div class="content_inforDaiLy_form"><span id="sdt"></span></div>
                        <h4>STK Đăng Ký Đại Lý</h4>
                        <div class="content_inforDaiLy_form"><span id="stk_dangky"></span></div>
                        <h4>STK Nhận Hoa Hồng</h4>
                        <div class="content_inforDaiLy_form"><span class="stk_nganhang"></span></div>
                        <h4>Hoa Hồng Tháng Trước</h4>
                        <div class="content_inforDaiLy_form"><span class="hoahongthangtruoc"></span></div>
                        <h4>Tổng Tháng Trước</h4>
                        <div class="content_inforDaiLy_form"><span class="tongthangtruoc"></span></div>
                        <h4>Tổng Nạp (GP)</h4>
                        <div class="content_inforDaiLy_form"><span class="tongnap"></span></div>
                    </div>

                    <div class="content_chich_sach">
                        <h4>1. ĐIỀU KIỆN LÀM ĐẠI LÝ</h4>
                        <ul>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Tổng nạp từ 50m VNĐ trở lên (không tính các khuyến mãi nạp).</p>
                            <li>+ Sẽ được xem là đại lý sau khi có mức tích lũy nạp trên 50 triệu và áp dụng quyền lợi Đại lý sau khi đạt mốc.</li>
                            <li>+ Đại lý có thể ký quỹ trước 50 triệu để trở thành đại lý ngay lập tức. Số tiền ký quỹ được hoàn lại khi mức tích lũy nạp đạt yêu cầu, hoàn tiền cùng lần đối soát gửi hoa hồng đầu tiên.</li>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Đăng ký đại lý của game nào thì sẽ nhận được các hỗ trợ tương ứng của game đó, khi làm game mới cùng trong hệ thống thì phải ký quỹ 50 triệu hoặc nạp 50 triệu GP thì mới được tính vào đại lý của game đó.</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Hàng tháng chuyển khoản tối thiểu từ 20 triệu VNĐ trở lên mới duy trì tư cách đại lý.</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i>Đăng ký làm đại lý tại facebook Admin duy nhất của các game:</p>
                            <li>+ NINJA HUYỀN THOẠI (Nezuko Kamado): <a href="https://www.facebook.com/AdminNinja77">https://www.facebook.com/AdminNinja77</a> </li>
                            <li>+ VÕ ĐÀI TỐI THƯỢNG (Bulma Capsule): <a href="https://www.facebook.com/profile.php?id=100094681042863">https://www.facebook.com/profile.php?id=100094681042863</a> </li>
                        </ul>

                        <h4>2. THÔNG TIN CHUYỂN KHOẢN</h4>
                        <ul>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Số tài khoản: 104878728170</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Tên chủ tài khoản: DO THI TIEN</p>
                            <p> <i class="fa-solid fa-fire-flame-simple"></i> Tên ngân hàng: Ngân hàng TMCP Công Thương Việt Nam (VietinBank)</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Chi nhánh: Chi nhánh TPHCM</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Cú Pháp khi nạp: NAPGP_username ()</p>
                            <span>(</span><span style="color:red">username</span><span> là tên tài khoản đã đăng ký làm đại lý với BQT)</span>
                        </ul>

                        <h4>3. HƯỚNG DẪN NẠP GP CHO NGƯỜI CHƠI</h4>

                        <ul>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Các tài khoản đại lý sau khi nạp GP vào tài khoản đại lý của mình thì sẽ có quyền cộng GP cho tài khoản khác dựa trên tổng số GP có trên tài khoản. Do đó, tài khoản này phải được xác thực bằng SĐT và email định danh của đại lý.</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i>Để cộng GP cho tài khoản khác, các đại lý thao tác như sau:</p>
                            <li>+ B1: Đăng nhập vào tài khoản đại lý tại trang: <a href="https://vngates.com">https://vngates.com</a></li>
                            <li>+ B2: Chọn vào mục “Chuyển GP”</li>
                            <img src="/daily/assets/img/img1.png" style="width: 100%" alt="">
                            <li>+ B3: Nhập tên tài khoản (username) và số GP cần chuyển cho tài khoản, sau đó nhấn “Đồng ý”</li>
                            <img src="/daily/assets/img/img2.png" style="width: 100%" alt="">

                        </ul>

                        <h4>4. ƯU ĐÃI KHI NẠP GP QUA ĐẠI LÝ</h4>
                        <ul>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Ưu đãi của người nạp qua Đại lý:</p>
                            <li>▪️ Nhận thêm 6% GP cộng thẳng vào tài khoản ví.</li>

                            <li>▪️ Ưu đãi đặc biệt: khi Đổi 100 triệu GP vào game (đổi 2 lần 50 triệu GP và đổi trong 24h tính từ lần đổi 50 triệu đầu tiên) sẽ nhận được 20% tiền game khuyến mãi. Cụ thể như sau:</li>
                            <img src="/daily/assets/img/img3.png" style="width: 100%" alt="">





                            <p><i class="fa-solid fa-fire-flame-simple"></i>Lưu ý</p>

                            <li>+ Phải đổi 2 lần 50 triệu GP vào game (đổi trong 24h tính từ lần đổi 50 triệu đầu tiên) thì mới nhận được 5000 tiền game cộng thêm.</li>
                            <li>+ Tiền game nhận thêm là tiền game kích phúc lợi</li>
                        </ul>

                        <h4>5. QUYỀN LỢI CỦA ĐẠI LÝ</h4>
                        <ul style="margin-bottom: 2w;">
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Nhận code đặc biệt hàng tháng riêng cho từng đại lý (số lượng code sẽ dựa vào doanh số của tháng trước - 1 triệu sẽ được 1 code đại lý). Đại lý có doanh thu trong tháng cao nhất sẽ được đặt tên mã code và danh hiệu cho tháng tiếp theo.</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Được hưởng hoa hồng hàng tháng trên doanh số nạp</p>
                            <li>+ Hoa hồng 4% nếu doanh số tháng dưới 200 triệu.</li>
                            <li>+ Hoa hồng 5% nếu doanh số tháng từ 200 triệu trở lên.</li>
                            <li>+ Hoa Hồng sẽ được gửi vào ngày 20 hàng tháng thông qua chuyển khoản ATM</li>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Được công bố danh sách Đại lý chính thức trên trang chủ của các game</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Được hỗ trợ chia sẻ thông tin hoặc chia sẻ livestream trên cộng đồng </p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> BQT các game sẽ tài trợ cho một số event của đại lý phù hợp tất cả các yêu cầu sau:</p>
                            <li>- Nội dung Event phải được thực hiện trong game ( chỉ các hoạt động pk trong game, các event liên quan đến cờ bạc sẽ không được hỗ trợ)</li>
                            <li>- Live hoặc được tổ chức trong cộng đồng càng tốt (quà tài trợ sẽ được nhiều hơn)</li>
                            <li>- Event phải có thể lệ đầy đủ và rõ ràng thì mới nhận được tài trợ</li>
                        </ul>
                        <h4>6. LƯU Ý</h4>

                        <ul>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Không đại lý nào được bán phá giá trên 6%, quảng cáo nạp trên 6%</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Không được bán code đại lý</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Đăng ký đại lý của game nào thì sẽ nhận được các hỗ trợ tương ứng của game đó. Ví dụ đại lý của Ninja Huyền Thoại thì chỉ nhận được các hỗ trợ của Ninja Huyền Thoại chứ không nhận được các hỗ trợ của Võ Đài Tối Thượng.</p>
                            <p><i class="fa-solid fa-fire-flame-simple"></i> Các đại lý phải đăng các lưu ý này trên những nơi liên quan.</p>

                            <li>+ Đại lý chỉ giúp người chơi có thể nạp game nhanh, chiết khấu cao hơn so với trang nạp truyền thống của Game</li>
                            <li>+ Đại lý là trung gian hỗ trợ Game và người dùng. Không phải Admin/GM nên không có quyền hạn liên quan tới Game.</li>
                            <li>+ Mọi vấn đề liên quan tới Game vui lòng liên hệ fanpage hoặc Admin Game để được hỗ trợ</li>

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
                        <div class="nav_soDu"><i class="fa-solid fa-wallet"></i>Tổng Nạp: <span class="GP">0</span></div>
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
    </div>

    <script src="/daily/assets/js/daily_game.js?v=0.0.1"></script>
</body>

</html>