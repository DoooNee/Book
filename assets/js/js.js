$(document).ready(function () {
    thongbao();
    loginCheck();
    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
        $(this).toggleClass('open');
    });
});


function loginCheck() {
    $.ajax({
        // url: 'https://ninjahuyenthoai.vn/daily/backend/login.php',
        url: 'https://ninjahuyenthoai.vn/daily/thongtindaily.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res.tendaily);
            if (res.isLogin == 0) {
                $('.wrapper_popup').show();
            }
            else {
                $('.user_name').html(res.tendaily);
                $('.GP').html(res.sodu);

                $('#ten').html(res.tendaily);
                $('#madaily').html(res.madaily);
                $('#facebook').html(res.facebook);
                $('#sdt').html(res.sdt);
                $('#stk_dangky').html(res.stkdangky);
                $('.stk_nganhang').html(res.stknhan);
                $('.tongnap').html(res.tongnap);


                let GP = addCommas(res.GP);
                let tongnap = addCommas(res.tongnap);

            }

            if (res.role != 'admin') {
                $('.admin').html('<a href="javascript:checkAdmin();"><i class="fa-solid fa-hammer"></i>ADMIN</a>');
                $('.admin').hide();
            } else {

                $('.dashboard').hide();
                $('.inforDaiLy').hide();
                $('.chinh_sach').hide();
                $('.code_thang').hide();
                $('.chinh_sach').hide();
                $('.nav_soDu').hide();
                $('.sidebar_content').html(`<li class="lich_su_nap_admin "><a href="javascript:lichSuNapAD();"> Lịch Sử Nhận</a></li>
                                            <li class="lich_su_chuyen_admin "><a href="javascript:lichSuChuyenAD();"> Lịch Sử Chuyển </a></li> `);

            }

        },
        complete: function () {
        }
    });
}


function checkAdmin() {
    swal("Bạn Không Phải ADMIN!");
}






function addCommas(str) {
    var arr = str.split(''); // Chuyển chuỗi thành mảng các kí tự
    var len = arr.length; // Độ dài của chuỗi
    var commaIndex = len - 3; // Vị trí đầu tiên cần thêm dấu phẩy

    // Vòng lặp để thêm dấu phẩy vào các vị trí cần thiết
    while (commaIndex > 0) {
        arr.splice(commaIndex, 0, ','); // Thêm dấu phẩy vào vị trí commaIndex
        commaIndex -= 3; // Cập nhật lại vị trí cần thêm dấu phẩy
    }

    // Ghép mảng các kí tự thành chuỗi và trả về
    return arr.join('');
}



function showDashBoard() {
    $('.content_dashboard').show();
    $('.content_admin').hide();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    $('#title_id').html('DashBoard');

}
function showTTDaiLy() {
    $('.content_admin').hide();
    $('.content_dashboard').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    $('.content_inforDaiLy').show();
    $('#title_id').html('Thông Tin Đại Lý');
}


function showChinhSach() {
    $('.content_admin').hide();
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_kho_code').hide();
    $('.content_chich_sach').show();
    $('#title_id').html('Chích Sách Đại Lý');
}


function showCODE() {
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_admin').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').show();
    $('#title_id').html('Kho CODE Tháng');
}


function showADMIN() {
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    $('.content_admin').show();
    $('#title_id').html('ADMIN');
}


// show table dashboard
function lichSuNap() {
    $.ajax({
        // url: 'https://ninjahuyenthoai.vn/daily/lichsunap.php',
        url: '/backend/lognap.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            $('#table').html(res);
            $(".lich_su_nap").addClass("active");
            $(".lich_su_chuyen").removeClass("active");
        },
        complete: function () {
        }
    });
}


// show table dashboard
function lichSuChuyen() {

    $.ajax({
        // url: 'https://ninjahuyenthoai.vn/daily/lichsuchuyen.php',
        url: '/backend/logchuyen.php',

        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {

        },
        success: function (res) {
            $('#table').html(res);
            $(".lich_su_chuyen").addClass("active");
            $(".lich_su_nap").removeClass("active");


        },
        complete: function () {

        }
    });
}



// show table ADMIN
function lichSuNapAD() {
    $.ajax({
        url: '/backend/lognapAD.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            $('#table').html(res);
            $(".lich_su_nap_admin").addClass("active");
            $(".lich_su_chuyen_admin").removeClass("active");
            // console.log(res)

        },
        complete: function () {
        }
    });
}







// show table ADMIN
function lichSuChuyenAD() {
    $.ajax({
        // url: 'https://ninjahuyenthoai.vn/daily/lichsuchuyenadmin.php',
        url: '/backend/logchuyenAD.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {

        },
        success: function (res) {
            $('#table').html(res);
            $(".lich_su_chuyen_admin").addClass("active");
            $(".lich_su_nap_admin").removeClass("active");
        },
        complete: function () {

        }
    });
}



function submitStatus($username) {
    $.ajax({
        url: '/backend/submitStatus.php',
        type: 'post',
        data: {
            username: $username
        },
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (res) {
            console.log(res);
            if (res.status == 'success') {
                swal("Thông báo!", "Submit thành công");
            }

        },
        complete: function () {
            lichSuChuyenAD();
        }
    });

}


function login() {
    let loginname = $(".ten_dang_nhap").val();
    let password = $(".mat_khau").val();
    if (loginname == null || loginname == '') {
        swal("Vui lòng điền tên đăng nhập!");
        return 0;
    }
    if (password == null || password == '') {
        swal("Vui lòng điền mật khẩu!");
        return 0;
    }


    $.ajax({
        url: '/backend/login.php',
        type: 'post',
        data: {
            loginname: loginname,
            password: password,
            action: 'login'
        },
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (res) {
            if (res.status == "error") {
                swal("Thông báo!", "Thông tin đăng nhập không đúng!");
            }

            else {
                swal({
                    title: "Thông báo!",
                    text: "Đăng nhập thành công!"
                }).then(function () {
                    window.location = "/";
                });
            }

        },
        complete: function () {
        }
    });
}





// thông báo game
function thongbao() {
    // $.ajax({
    //     url: '/backend/thongbao.php',
    //     type: 'get',
    //     data: '',
    //     dataType: 'json',
    //     beforeSend: function () {

    //     },
    //     success: function (res) {
    //         // $('.thong_bao').html(res.noti);
    //         console.log(res)

    //     },
    //     complete: function () {

    //     }
    // });


    $.get("/backend/thongbao.php", function (data) {
        $('.thong_bao').html(data);
    });

}



$('#nav-icon3').click(function () {
    $('.nav_fade').toggleClass('open');
})






