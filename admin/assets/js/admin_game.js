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
var adminchuyen = '';
// function checkGame() {
//     str = window.location.href;
//     if (str.includes('ninja')) {
//         game = 'ninja';
//     } else if (str.includes('vodai')) {
//         game = 'vodai';
//     }
//     return game;
// }




function checkNapDaiLy() {
    let daily_ = $('select[name="checknap"]').val();
    let ngaybatdau_ = $('#ngaybatdau').val();
    let ngayketthuc_ = $('#ngayketthuc').val();
    $.ajax({
        url: 'https://daily.metatap.vn/backend/checknap.php',
        type: 'post',
        data: {
            daily: daily_,
            ngaybatdau: ngaybatdau_,
            ngayketthuc: ngayketthuc_,
        },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
          console.log(res);
        },
        complete: function () {
        }
    });
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
            $('.user_name').html(res.name)

            if (res.isLogin != 1 || res.role == 'daily') {
                window.location = "/";
            }
            else {
                role = res.role;
                adminchuyen = res.name;
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
    $('.content_checknap').hide();
    $('.content_chich_sach').hide();
    lichSuNapAD();
}



function showTTDaiLy() {
    $('.content_admin').hide();
    $('.tongnap_daily').show();
    $('.saoke_daily').hide();
    $('.content_checknap').hide();
    $('.content_chich_sach').hide();
    getTTDaiLy();
}

function showSaoKe() {
    $('.content_admin').hide();
    $('.tongnap_daily').hide();
    $('.saoke_daily').show();
    $('.sidebar_content1').show();
    $('.content_checknap').hide();
    $('.content_chich_sach').hide();
    getDanhSachDaiLy();
    // getSaoKe('Dailygamevn')
}

function showSaoKet7() {
    $('.content_admin').hide();
    $('.tongnap_daily').hide();
    $('.saoke_daily').show();
    $('.sidebar_content1').show();
    $('.content_checknap').hide();
    $('.content_chich_sach').hide();
    getDanhSachDaiLyt7();
    // getSaoKe('Dailygamevn')
}

function showChinhSach() {
    $('.content_admin').hide();
    $('.tongnap_daily').hide();
    $('.saoke_daily').hide();
    $('.sidebar_content1').hide();
    $('.content_checknap').hide();
    $('.content_chich_sach').show();

}

function showCheckNap() {
    $('.content_admin').hide();
    $('.tongnap_daily').hide();
    $('.sidebar_content1').hide();
    $('.content_chich_sach').hide();
    $('.content_checknap').show();
}

function getDanhSachDaiLy() {
    $.ajax({
        url: '/backend/getDanhSachDaiLy.php',
        type: 'post',
        data: { role: role },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            var th = "";
            $.each(res, function (i, item) {
                th += `<th><a href="javascript:getSaoKe('${res[i].name}');">${res[i].name}</a></th>`;
            });
            var table = '<table><tr>' + th + '</tr></table>'
            $('.table-rank').html(table);
        },
        complete: function () {
        }
    });
}


function getDanhSachDaiLyt7() {
    var tableHtml = '<table><tbody><tr>' +
        '<th><a href="javascript:getSaoKet7(\'Dailygamevnt7ninja\');">Dailygamevn ninja</a></th>' +
        '<th><a href="javascript:getSaoKet7(\'Dailygamevnt7vdtt\');">Dailygame VDTT</a></th>' +
        '<th><a href="javascript:getSaoKet7(\'QuyenQuyent7ninja\');">QuyenQuyen Ninja</a></th>' +
        '<th><a href="javascript:getSaoKet7(\'QuyenQuyent7vdtt\');">QuyenQuyen VDTT</a></th>' +
        '<th><a href="javascript:getSaoKet7(\'Weacct7Ninja\');">Weacc Ninja</a></th>' +
        '<th><a href="javascript:getSaoKet7(\'Sonleut7vdtt\');">SonLeu VDTT</a></th>' +
        '<th><a href="javascript:getSaoKet7(\'QuangTungt7Ninja\');">Quang Tùng Ninja</a></th>' +
        '<th><a href="javascript:getSaoKet7(\'Minatot7ninja\');">Minato Ninja</a></th>' +
        '<th><a href="javascript:getSaoKet7(\'sonherot7ninja\');">SonHero Ninja</a></th>' +

        '</tr></tbody></table>';
    $('.table-rank').html(tableHtml);
}

function getSaoKet7(daily) {
    // console.log(daily);
    $.ajax({
        url: '/backend/getSaoKet7.php',
        type: 'post',
        data: { role: role, daily: daily.toLowerCase() },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            //console.log(res);
            //console.log(addCommas(res[1].sotiennap));
            var html = '';
            $.each(res, function (i, item) {
                html += `<tr><td>${res[i].id}</td><td  >${addCommas(res[i].sotiennap)}</td><td  >${res[i].mota}</td><td  >${res[i].ngay}</td></tr>`;
            });


            //console.log(html);
            var html_rank = '<table><tr><th>ID</th><th>Số Tiền</th><th>Mô Tả</th><th>Ngày</th></tr>' + html + '</table>';
            $('.bang_saoke').html(html_rank);
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
        data: { role: role, daily: daily.toLowerCase() },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            //console.log(res)
            var html = '';
            $.each(res, function (i, item) {
                html += `<tr><td>${res[i].id}</td><td  >${addCommas(res[i].sotiennap)}</td><td  >${res[i].mota}</td><td  >${res[i].ngay}</td></tr>`;
            });
            var html_rank = '<table><tr><th>ID</th><th>Số Tiền</th><th>Mô Tả</th><th>Ngày</th></tr>' + html + '</table>';
            $('.bang_saoke').html(html_rank);
        },
        complete: function () {
        }
    });
}

function getTTDaiLy() {
    $.ajax({
        url: '/backend/thongtindaily.php',
        type: 'post',
        data: { role: role },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            var html = '';
            $.each(res, function (i, item) {
                //html += `<tr><td>${res[i].tendaily}</td><td >${addCommas(res[i].tongnap)}</td><td >${addCommas(String(hoaHong_HienTai(res[i].tongnap)))}</td><td >${addCommas(res[i].tong_thangtruoc)}</td><td>${res[i].hoahong_thangtruoc}</td><td class ="stk_css" >${res[i].stk_dangky}</td><td class ="stk_css" >${res[i].stk_nhan}</td><td >${res[i].sdt}</td></tr>`;
                html += `<tr><td>${res[i].tendaily}</td><td ><ul> <li>- Username: ${res[i].madaily}</li> <li>- STK: ${res[i].stk_dangky}</li> <li>- SDT: ${res[i].sdt}</li><li>- GAME: ${res[i].GAME}</li> </ul></td><td >${addCommas(res[i].tong_ninja_t7)}</td><td>${addCommas(res[i].hoahong_ninja_t7)}</td><td >${addCommas(res[i].tong_vodai_t7)}</td><td>${addCommas(res[i].hoahong_vodai_t7)}</td><td>${addCommas(res[i].tongnap)}</td><td >${addCommas(String(hoaHong_HienTai(res[i].tongnap)))}</td><td >0</td><td >0</td></tr>`;

            });
            //var html_rank = '<table id="table_lich_su_nap"><tr><th>Tên Đại Lý</th><th>Tổng Tháng 8</th><th>Hoa Hồng Tháng 8</th><th>Tổng Tháng 7</th><th>Hoa Hồng Tháng 7</th><th >STK Đăng Ký Đại Lý</th><th >STK Nhận Hoa Hồng</th><th>SĐT</th></tr> ' + html + '</table>';
            var html_rank = '<table> <tr> <th rowspan="2">Danh sách đại lý</th> <th rowspan="2">Thông tin đại lý</th> <th colspan="4">Tháng 7</th> <th colspan="2">Tháng 8</th> <th colspan="2">Tháng 9</th>  </tr> <tr> <th>Tổng nạp ninja</th> <th>Hoa hồng ninja</th> <th>Tổng nạp vdtt</th> <th>Hoa hồng vdtt</th><th>Tổng nạp</th> <th>Hoa hồng</th> <th>Tổng nạp</th> <th>Hoa hồng</th> </tr>' + html + '</table>';
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

// show table ADMIN
function lichSuNapAD() {
    $.ajax({
        url: '/backend/logNapAD.php',
        type: 'post',
        data: { role: role },
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
        data: { role: role },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            if (role === 'admin') {
                $(".lich_su_chuyen_admin").addClass("active");
                $(".lich_su_nap_admin").removeClass("active");
                var html = '';
                $.each(res, function (i, item) {
                    html += `<tr><td>${addCommas(res[i].sotien)}</td><td >${res[i].username}</td><td >${res[i].status}</td><td >${res[i].nguoi_chuyen}</td><td ><div class="search disabled"><a href="javascript:submitStatus(${res[i].id},'${adminchuyen}')">Submit</a></div></td></tr>`;
                });
                var html_rank = '<table id="table_lich_su_nap"><tr><th>GP</th><th>Tên Nhân Vật</th><th>Trạng Thái</th><th>Người Chuyển</th><th></th></tr> ' + html + '</table>';
                $('#table_lich_su_nap').html(html_rank);
            } else {
                $(".lich_su_chuyen_admin").addClass("active");
                $(".lich_su_nap_admin").removeClass("active");
                var html = '';
                $.each(res, function (i, item) {
                    html += `<tr><td>${addCommas(res[i].sotien)}</td><td >${res[i].username}</td><td >${res[i].status}</td><td >${res[i].nguoi_chuyen}</td></tr>`;
                });
                var html_rank = '<table id="table_lich_su_nap"><tr><th>GP</th><th>Tên Nhân Vật</th><th>Trạng Thái</th><th>Người Chuyển</th></tr> ' + html + '</table>';
                $('#table_lich_su_nap').html(html_rank);
            }
        },
        complete: function () {
        }
    });
}




function submitStatus(id, nguoichuyen) {
    //console.log(role);
    // console.log(id);
    // console.log(nguoichuyen);

    $.ajax({
        url: '/backend/submitStatus.php',
        type: 'post',
        data: {
            role: role,
            id: id,
            nguoichuyen: nguoichuyen
        },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            //console.log(res);
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
