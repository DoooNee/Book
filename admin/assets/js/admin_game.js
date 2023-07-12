$(document).ready(function () {
    loginCheck();
    showADMIN();
});

// nav mobile
$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
    $(this).toggleClass('open');
    $('.nav_fade').toggleClass('open');
});



var role = '';
function loginCheck() {
    $.ajax({
        url: '/backend/login.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res);
            if (res.isLogin != 1) {
                window.location = "/";
            }
            else {
                role = res.role;
            }
        },
        complete: function (res) {
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

function showADMIN() {
    $('.content_admin').show();
    $('.tongnap_daily').hide();
    $('.saoke_daily').hide();
    lichSuNapAD();
}

function showTongNap() {
    $('.content_admin').hide();
    $('.tongnap_daily').show();
    $('.saoke_daily').hide();
    getTongNap();
}

function showSaoKe() {
    $('.content_admin').hide();
    $('.tongnap_daily').hide();
    $('.saoke_daily').show();
    //getTongNap ();
}

function getSaoKeDailyGame() {
    $.ajax({
        url: '/backend/saoKeDailyGame.php',
        // url: '/backend/lognap.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            //$('.bang_saoke').html(`<table > ${res} </table>`);
            $('.bang_saoke').html(`<table > ${res} </table>`);
        },
        complete: function () {
        }
    });
}

function getSaoKeNguyenQuangTung() {
    $.ajax({
        url: '/backend/saoKeNguyenQuangTung.php',
        // url: '/backend/lognap.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            //$('.bang_saoke').html(`<table > ${res} </table>`);
            $('.bang_saoke').html(`<table > ${res} </table>`);
        },
        complete: function () {
        }
    });
}

function getSaoKeMinato() {
    $.ajax({
        url: '/backend/saoKeMinato.php',
        // url: '/backend/lognap.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            //$('.bang_saoke').html(`<table > ${res} </table>`);
            $('.bang_saoke').html(`<table > ${res} </table>`);
        },
        complete: function () {
        }
    });
}

function getSaoKeQuyenQuyen() {
    //$('.bang_saoke').html(`No info`);
    $.ajax({
        url: '/backend/saoKeQuyenQuyen.php',
        // url: '/backend/lognap.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            $('.bang_saoke').html(`<table > ${res} </table>`);

        },
        complete: function () {
        }
    });
}

function getSaoKeWeacc() {
    //$('.bang_saoke').html(`No info`);
    $.ajax({
        url: '/backend/saokeWeacc.php',
        // url: '/backend/lognap.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            $('.bang_saoke').html(`<table > ${res} </table>`);

        },
        complete: function () {
        }
    });
}

function getSaoKeSonHeroGaming() {
    //$('.bang_saoke').html(`No info`);
    $.ajax({
        url: '/backend/saokeSonheroGaming.php',
        // url: '/backend/lognap.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            $('.bang_saoke').html(`<table > ${res} </table>`);

        },
        complete: function () {
        }
    });
}

function getSaoKeKunBanThe() {
    $.ajax({
        url: '/backend/saoKeKunBanThe.php',
        // url: '/backend/lognap.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            //$('.bang_saoke').html(`<table > ${res} </table>`);
            $('.bang_saoke').html(`<table > ${res} </table>`);
        },
        complete: function () {
        }
    });
}

function getTongNap() {
    $.ajax({
        url: '/backend/log_tongnap_daily.php',
        // url: '/backend/lognap.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            $('.tongnap_daily').html(`<table > ${res} </table>`);

        },
        complete: function () {
        }
    });
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
        url: '/backend/logNapAD.php',
        type: 'post',
        data: { role: role, game: "ninja" },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
          
            $(".lich_su_nap_admin").addClass("active");
            $(".lich_su_chuyen_admin").removeClass("active");
            var html = '';
            $.each(res, function (i, item) {
                html += `<tr><td>${addCommas(res[i].sotien)}</td><td >${res[i].description}</td><td >${res[i].thoigiannap}</td></tr>`;
            });
            var html_rank = '<table id="table_lich_su_nap"><tr><th>Số Tiền</th><th>Mô Tả</th><th>Thời Gian</th></tr> ' + html + '</table>';
            $('#table_lich_su_nap').html(html_rank);
        },

        complete: function () {
        }
    });
}
lichSuNapAD();

$('#table_lich_su_chuyen').hide();

function lichSuChuyenAD(username) {
    console.log(role);
    $.ajax({
        url: '/backend/logchuyenAD.php',
        type: 'post',
        data: { role: role, game: "ninja" },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
         
            $(".lich_su_chuyen_admin").addClass("active");
            $(".lich_su_nap_admin").removeClass("active");
            var html = '';
            $.each(res, function (i, item) {
                html += `<tr><td>${addCommas(res[i].sotien)}</td><td >${res[i].username}</td><td >${res[i].status}</td><td >${res[i].nguoi_chuyen}</td><td ><div class="search disabled"><a href="javascript:submitStatus(${res[i].id},\'' + username + '\')">Submit</a></div></td></tr>`;
            });
            var html_rank = '<table id="table_lich_su_nap"><tr><th>GP</th><th>Tên Nhân Vật</th><th>Trạng Thái</th><th>Người Chuyển</th><th></th></tr> ' + html + '</table>';
            $('#table_lich_su_nap').html(html_rank);
        },
        complete: function () {
        }
    });
}





function submitStatus(id, nguoichuyen) {
    console.log(role);
    // console.log(id);
    // console.log(nguoichuyen);

    $.ajax({
        url: '/backend/submitStatus.php',
        type: 'post',
        data: {
            role: role,
            game: "ninja",
            id: id,
            nguoichuyen: nguoichuyen
        },
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (res) {
            console.log(res);
            if (res.status == 'success') {
                swal("Thông báo!", "Submit thành công");
                lichSuChuyenAD();
            }

        },
        complete: function () {
            lichSuChuyenAD();
        }
    });

}

// thông báo game
function thongbao() {
    $.get("/backend/thongbao.php", function (data) {
        $('.thong_bao').html(data);
    });

}

// check input của nav mobbile
function checkInput() {
    $('.nav_fade').toggleClass('open');
    $('#nav-icon3').toggleClass('open');
    // checked false cho input
    $('#nav_mb').get(0).checked = false;
}
