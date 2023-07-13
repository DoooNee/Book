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

function showTTDaiLy() {
    $('.content_admin').hide();
    $('.tongnap_daily').show();
    $('.saoke_daily').hide();
    getTTDaiLy();
}

function showSaoKe() {
    $('.content_admin').hide();
    $('.tongnap_daily').hide();
    $('.saoke_daily').show();
    getDanhSachDaiLy()
}

function getDanhSachDaiLy(){
    $.ajax({
        url: '/backend/getDanhSachDaiLy.php',
        type: 'post',
        data: { role: role, game: checkGame()},
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            // console.log(res)
            // $('.bang_saoke').html(`<table > ${res} </table>`);
        },
        complete: function () {
        }
    });
}

function getSaoKe(daily) {
    // console.log(daily);
    $.ajax({
        url: '/backend/getSaoKe.php',
        type: 'post',
        data: { role: role, game: checkGame(), daily: daily },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            // console.log(res)
            // $('.bang_saoke').html(`<table > ${res} </table>`);
        },
        complete: function () {
        }
    });
}


function getTTDaiLy() {
    $.ajax({
        url: '/backend/thongtindaily.php',
        type: 'post',
        data: { role: role, game: checkGame() },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            var html = '';
            $.each(res, function (i, item) {
                html += `<tr><td>${res[i].tendaily}</td><td >${addCommas(res[i].tongnap)}</td><td >${addCommas(String(hoaHong_HienTai(res[i].tongnap)))}</td><td >${addCommas(res[i].tong_thangtruoc)}</td><td  >${res[i].hoahong_thangtruoc}</td><td class ="stk_css" >${res[i].stk_dangky}</td><td class ="stk_css" >${res[i].stk_nhan}</td><td >${res[i].sdt}</td></tr>`;
            });
            var html_rank = '<table id="table_lich_su_nap"><tr><th>Tên Đại Lý</th><th>Tổng Tháng 7</th><th>Hoa Hồng Tháng 7</th><th>Tổng Tháng 6</th><th>Hoa Hồng Tháng 6</th><th >STK Đăng Ký Đại Lý</th><th >STK Nhận Hoa Hồng</th><th>SĐT</th></tr> ' + html + '</table>';
            $('#table_ttDaiLy').html(html_rank);
        },
        complete: function () {
        }
    });
}




// Tính Hoa Hồng Đại Lý
function hoaHong_HienTai(sotien) {
    if (sotien >= 200000000) {
        let a = sotien * 0.05;
        return a;
    } else {
        let a = sotien * 0.04;
        return a;
    }
}

// show table dashboard
// function lichSuNap() {
//     $.ajax({
//         url: '/backend/lognap.php',
//         type: 'get',
//         data: '',
//         dataType: '',
//         beforeSend: function () {
//         },
//         success: function (res) {
//             console.log(res)
//             $('#table').html(res);
//             $(".lich_su_nap").addClass("active");
//             $(".lich_su_chuyen").removeClass("active");
//         },
//         complete: function () {
//         }
//     });
// }

// show table dashboard
// function lichSuChuyen() {
//     $.ajax({
//         url: '/backend/logchuyen.php',
//         type: 'get',
//         data: '',
//         dataType: '',
//         beforeSend: function () {

//         },
//         success: function (res) {
//             $('#table').html(res);
//             $(".lich_su_chuyen").addClass("active");
//             $(".lich_su_nap").removeClass("active");

//         },
//         complete: function () {

//         }
//     });
// }
// show table ADMIN
function lichSuNapAD() {
    $.ajax({
        url: '/backend/logNapAD.php',
        type: 'post',
        data: { role: role, game: checkGame() },
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


$('#table_lich_su_chuyen').hide();

function lichSuChuyenAD(username) {
    // console.log(role);
    $.ajax({
        url: '/backend/logchuyenAD.php',
        type: 'post',
        data: { role: role, game: checkGame() },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            $(".lich_su_chuyen_admin").addClass("active");
            $(".lich_su_nap_admin").removeClass("active");
            var html = '';
            $.each(res, function (i, item) {
                html += `<tr><td>${addCommas(res[i].sotien)}</td><td >${res[i].username}</td><td >${res[i].status}</td><td >${res[i].nguoi_chuyen}</td><td ><div class="search disabled"><a href="javascript:submitStatus(${res[i].id},'${username}')">Submit</a></div></td></tr>`;
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
            game: checkGame(),
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
                lichSuChuyenAD(role);
            }
        },
        complete: function () {
            lichSuChuyenAD(role);
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
