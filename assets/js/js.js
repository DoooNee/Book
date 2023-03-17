$(document).ready(function () {
    thongbao();
    loginCheck();
});


function loginCheck() {
    $.ajax({
        // url: 'https://ninjahuyenthoai.vn/daily/backend/login.php',
        url: '/backend/login.php',


        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res);
            if (res.isLogin == 0) {
                $('.wrapper_popup').show();
            }

            else {
                $('.user_name').html(res.username);
                let GP = addCommas(res.GP);
                let tongnap = addCommas(res.tongnap);

                $('.GP').html(GP);
                $('#tongNap').html(tongnap);
                $('#ten').html(res.fullname);
                $('#cccd').html(res.cccd);
                $('#stk').html(res.stk);
                $('#mail').html(res.email);
            }
        },
        complete: function () {
        }
    });
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
        url: 'https://ninjahuyenthoai.vn/daily/lichsunap.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res.lichsunap)
            $('#table').html(res.lichsunap);
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
        url: 'https://ninjahuyenthoai.vn/daily/lichsuchuyen.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (res) {
            $('#table').html(res.lichsunap);
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
        url: 'https://ninjahuyenthoai.vn/daily/lichsunap.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res.lichsunap)
            $('.table').html(res.lichsunap);
            $(".lich_su_nap_admin").addClass("active");
            $(".lich_su_chuyen_admin").removeClass("active");


        },
        complete: function () {
        }
    });
}







// show table ADMIN
function lichSuChuyenAD() {
    $.ajax({
        url: 'https://ninjahuyenthoai.vn/daily/lichsuchuyen.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (res) {
            $('.table').html(res.lichsunap);
            $(".lich_su_chuyen_admin").addClass("active");
            $(".lich_su_nap_admin").removeClass("active");

            console.log(res.lichsunap);
        },
        complete: function () {

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

    $.ajax({
        url: 'https://ninjahuyenthoai.vn/daily/lichsunap.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (res) {
            $('.thong_bao').html(res.noti);
            console.log(res)

        },
        complete: function () {

        }
    });
}

