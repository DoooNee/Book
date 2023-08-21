$(document).ready(function () {
    loginCheck();
    lichSuNap();
    showDashBoard();
});





// nav mobile
$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
    $(this).toggleClass('open');
    $('.nav_fade').toggleClass('open');
});

var role = '';
var game = '';

// function checkGame() {
//     str = window.location.href;
//     if (str.includes('ninja')) {
//         game = 'ninja';
//     } else if (str.includes('vodai')) {
//         game = 'vodai';
//     }
//     return game;
// }


function loginCheck() {
    $.ajax({
        url: '/backend/login.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            //console.log(role)
            //show tên user đăng nhập

            // console.log(res.isLogin)
            if (res.isLogin != 1 || res.role != 'daily') {
                window.location = "/";
            }
            else {
                role = res.role;
                $('.user_name').html(res.name)
                $('.GP').html(addCommas(res.tongnap))
                //console.log(res);
            }
        },
        complete: function (res) {
        }
    });
}


function checkAdmin() {
    swal("Bạn Không Phải ADMIN!");
}


function showDashBoard() {
    $('.content_dashboard').show();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    lichSuNap();
}

function showTTDaiLy() {
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').show();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    getTTDaiLy();
}

function showChinhSach() {
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').show();
    $('.content_kho_code').hide();
  	$('.saoke_daily').hide();
}

function showCODE() {
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').show();
}

// show table dashboard
function lichSuNap() {
    $.ajax({
        url: '/backend/lognapdaily.php',
        type: 'post',
        data: { role: role},
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            $(".lich_su_nap ").addClass("active");
            $(".lich_su_chuyen").removeClass("active");
            var html = '';
            $.each(res, function (i, item) {
                html += `<tr><td>${addCommas(res[i].sotien)}</td><td  >${res[i].description}</td><td  >${res[i].thoigiannap}</td></tr>`;
            });
            var html_rank = '<table><tr><th>Số Tiền</th><th>Mô Tả</th><th>Thời Gian Nạp</th></tr>' + html + '</table>';
            $('.bang_lich_su').html(html_rank);
        },
        complete: function () {
        }
    });
}



// show table dashboard
function lichSuChuyen() {
    $.ajax({
        url: '/backend/logchuyendaily.php',
        type: 'post',
        data: { role: role},
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (res) {
            $(".lich_su_chuyen ").addClass("active");
            $(".lich_su_nap").removeClass("active");
            var html = '';
            $.each(res, function (i, item) {
                html += `<tr><td>${res[i].username}</td><td  >${addCommas(res[i].sotien)}</td><td  >${res[i].status}</td></tr>`;
            });
            var html_rank = '<table><tr><th>Tên</th><th>Số Tiền</th><th>Status</th></tr>' + html + '</table>';
            $('.bang_lich_su').html(html_rank);
        },
        complete: function () {
        }
    });
}

$('#table_lich_su_chuyen').hide();

function getTTDaiLy() {
    $.ajax({
        url: '/backend/thongtindaily.php',
        type: 'post',
        data: { role: role},
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            $('#ten').html(res[0].tendaily);
          	$('#cuphap').html(res[0].cuphap_nap);
          	$('#game').html(res[0].game);
            $('#madaily').html(res[0].madaily);
            $('#facebook').html(res[0].facebook);
            $('#sdt').html(res[0].sdt);
            $('#stk_dangky').html(res[0].stk_dangky);
            $('.stk_nganhang').html(res[0].stk_nhan);
            $('#madaily').html(res[0].madaily);
            $('.tongnap').html(res[0].tongnap);
            $('.tongthangtruoc').html(addCommas(res[0].tong_thangtruoc));
            $('.hoahongthangtruoc').html(addCommas(res[0].hoahong_thangtruoc));
            $('.tongnap').html(addCommas(res[0].tongnap));
        },
        complete: function () {
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