$(document).ready(function () {
    loginCheck();
    // showADMIN();
    lichSuNap();

});

// nav mobile
$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
    $(this).toggleClass('open');
    $('.nav_fade').toggleClass('open');
});


var role = '';
var game = '';

function checkGame() {
    str = window.location.href;
    if (str.includes('ninja')) {
        game = 'ninja';
    } else if (str.includes('vodai')) {
        game = 'vodai';
    }
    return game;
}




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
            //show tên user đăng nhập
            $('.user_name').html(res.name)

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
}

function showCODE() {
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').show();
}

// show table dashboard
function lichSuNap() {
    console.log(role);
    $.ajax({
        url: '/backend/lognapdaily.php',
        type: 'post',
        data: { role: role, game: checkGame() },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res)
            // $('#table').html(res);
            // $(".lich_su_nap").addClass("active");
            // $(".lich_su_chuyen").removeClass("active");
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
        data: { role: role, game: checkGame() },
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (res) {
            console.log(res)
            // $('#table').html(res);
            // $(".lich_su_chuyen").addClass("active");
            // $(".lich_su_nap").removeClass("active");

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
        data: { role: role, game: checkGame() },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            // var html = '';
            // $.each(res, function (i, item) {
            //     html += `<tr><td>${res[i].tendaily}</td><td >${addCommas(res[i].tongnap)}</td><td >${addCommas(String(hoaHong_HienTai(res[i].tongnap)))}</td><td >${addCommas(res[i].tong_thangtruoc)}</td><td  >${res[i].hoahong_thangtruoc}</td><td class ="stk_css" >${res[i].stk_dangky}</td><td class ="stk_css" >${res[i].stk_nhan}</td><td >${res[i].sdt}</td></tr>`;
            // });
            // var html_rank = '<table id="table_lich_su_nap"><tr><th>Tên Đại Lý</th><th>Tổng Tháng 7</th><th>Hoa Hồng Tháng 7</th><th>Tổng Tháng 6</th><th>Hoa Hồng Tháng 6</th><th >STK Đăng Ký Đại Lý</th><th >STK Nhận Hoa Hồng</th><th>SĐT</th></tr> ' + html + '</table>';
            // $('#table_ttDaiLy').html(html_rank);
        },
        complete: function () {
        }
    });
}


// function submitStatus(id, nguoichuyen) {
//     console.log(role);
//     // console.log(id);
//     // console.log(nguoichuyen);

//     $.ajax({
//         url: '/backend/submitStatus.php',
//         type: 'post',
//         data: {
//             role: role,
//             game: checkGame(),
//             id: id,
//             nguoichuyen: nguoichuyen
//         },
//         dataType: 'json',
//         beforeSend: function () {
//         },
//         success: function (res) {
//             console.log(res);
//             if (res.status == 'success') {
//                 swal("Thông báo!", "Submit thành công");
//                 lichSuChuyenAD(role);
//             }
//         },
//         complete: function () {
//             lichSuChuyenAD(role);
//         }
//     });

// }

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
