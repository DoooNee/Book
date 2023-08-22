<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Đại lý</title>
    <link rel="stylesheet" href="/admin/assets/css/admin_game.css">
    <link href="/admin/assets/img/cropped-cropped-icon_Logo-180x180.png" rel="shortcut icon" type="image/png">
    <script src="/admin/assets/js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/admin/assets/js/sweetalert.js"></script>
</head>

<body>
    <div class="wrapper">
        <!--======================= ADMIN ============================-->
        <div class="admin_wrapper">
            <!-- nav -->
            <div class="nav">
                <div class="logo"><img src="/admin/assets/img/Logo_ngang-1.png" alt=""></div>
                <div class="nav-group-right">
                    <div class="user"><i class="fa-solid fa-user"></i><span class="user_name"></span></div>
                    <div class="logout"><i class="fa-solid fa-right-from-bracket"></i><a href="/backend/logout.php">Đăng xuất</a></div>
                </div>
            </div>
            <!-- title -->
            <div class="title">
                <h1 id="title_id">
                    ADMIN ĐẠI LÝ
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
                            <li class="admin" id=""><a href="javascript:showSaoKet7();"><i class="fa-solid fa-hammer"></i>Sao Kê Đại Lý T7</a></li>
                            <li class="admin" id=""><a href="javascript:showSaoKe();"><i class="fa-solid fa-hammer"></i>Sao Kê Đại Lý T8</a></li>
                            <li class="admin" id=""><a href="javascript:showChinhSach();"><i class="fa-solid fa-hammer"></i>Chính sách đại lý</a></li>
                            <li class="admin" id=""><a href="javascript:showCheckNap();;"><i class="fa-solid fa-hammer"></i>Check nạp đại lý</a></li>
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
                        <li class="admin" id=""><a href="javascript:showSaoKet7();"><i class="fa-solid fa-hammer"></i>Sao Kê Tháng 7</a></li>
                        <li class="admin" id=""><a href="javascript:showSaoKe();"><i class="fa-solid fa-hammer"></i>Sao Kê Tháng 8</a></li>
                        <li class="admin" id=""><a href="javascript:showChinhSach();"><i class="fa-solid fa-hammer"></i>Chính sách đại lý</a></li>
                        <li class="admin" id=""><a href="javascript:showCheckNap();"><i class="fa-solid fa-hammer"></i>Check nạp đại lý</a></li>
                    </ul>
                </div>
                <div class="content ">
                    <!--  admin -->
                    <div class="content_admin">
                        <ul class="sidebar_content ">
                            <li class="lich_su_nap_admin "><a href="javascript:lichSuNapAD();"> Lịch Sử Nạp</a></li>
                            <li class="lich_su_chuyen_admin "><a href="javascript:lichSuChuyenAD('<?php echo $_SESSION["vdtt-daily"] ?>');"> Lịch Sử Chuyển </a></li>
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
                        <ul class="sidebar_content1 table-rank">
                            <!-- <li class="lich_su_nap "><a href="javascript:getSaoKe('DailyGame');">DailyGame</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('QuyenQuyen');">QuyenQuyen</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('NguyenQuangTung');">NguyenQuangTung</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('Weacc');">Weacc</a></li>


                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('Minato');">Minato</a></li>
                            <li class="lich_su_chuyen "><a href="javascript:getSaoKe('SonHeroGaming');">SonHeroGaming</a></li> -->
                        </ul>
                        <div class="bang_saoke">
                        </div>
                    </div>

                    <!--chinh sach -->
                    <div style="display:none;" class="content_chich_sach">
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

                    </div>

                    <!-- check nap dai ly -->
                    <div class="content_checknap" style="">
                        <div class="content_checknap-top">
                            <div><label for="checknap"><b>Đại Lý:</b></label>
                                <select name="checknap" id="checknap">
                                    <option value="Dailygamevn">Dailygamevn</option>
                                    <option value="QuyenQuyen">QuyenQuyen</option>
                                    <option value="Weacc">Weacc</option>
                                    <option value="SonLeu">SonLeu</option>
                                </select>
                            </div>
                            <div>
                                <label for="ngaybatdau"><b>Ngày bắt đầu:</b></label>
                                <input type="date" id="ngaybatdau" name="ngaybatdau">
                            </div>
                            <div>
                                <label for="ngayketthuc"><b>Ngày kết thúc:</b></label>
                                <input type="date" id="ngayketthuc" name="ngayketthuc">
                            </div>
                            <div class="check-daily" onclick="checkNapDaiLy()">
                                check
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--==================== END ADMIN ==============================-->
        </div>
    </div>
    <script src="/admin/assets/js/admin_game.js?v=0.0.8"></script>
    <!-- <script src="/admin/assets/js/admin.js"></script> -->
</body>

</html>