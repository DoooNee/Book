<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Võ Đài</title>
    <link rel="stylesheet" href="/admin//assets/css/admin_game.css">
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
                <div class="user">
                    <i class="fa-solid fa-user"></i><span class="user_name"></span>
                </div>
            <div class="logout"><i class="fa-solid fa-right-from-bracket"></i><a href="/backend/logout.php">Đăng xuất</a></div>

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
    </div>


    <script src="/admin/assets/js/admin_game.js"></script>
</body>

</html>