$(document).ready(function () {
    thongbao();
    loginCheck();
    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
        $(this).toggleClass('open');
    });
});


function loginCheck() {
    $.ajax({
        url: '/backend/login.php',
        // url: 'https://ninjahuyenthoai.vn/daily/thongtindaily.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res.tendaily);
            if (res.isLogin != 1) {
                $('.wrapper_popup').show();
            }
            else {
                let GP = addCommas(res.sodu);
                let tongnap = addCommas(res.tongnap);
                let sodu = addCommas(res.sodu);
                let tongthangtruoc = addCommas(res.tong_thangtruoc);


                $('.user_name').html(res.fullname);
                $('.GP').html(GP);
                $('#ten').html(res.fullname);
                $('#madaily').html(res.madaily);
                $('#facebook').html(res.facebook);
                $('#sdt').html(res.sdt);
                $('#stk_dangky').html(res.stk_dangky);
                $('.stk_nganhang').html(res.stk_nhan);
                $('.tongthangtruoc').html(tongthangtruoc);
                $('.tongnap').html(tongnap);
                $('.sodu').html(sodu);
                $("#facebook").attr("href", res.facebook);
				$('.content_kho_code').html(`<a href="/assets/kho_code/${res.link_code}">link CODE tháng</a>`)
            }

            if (res.role == 'daily') {
                $('.admin').html('<a href="javascript:checkAdmin();"><i class="fa-solid fa-hammer"></i>ADMIN</a>');
                $('.admin').hide();
              $('.saoke_daily').hide();
              
                lichSuNap();
            } else {
              	var role = res.role;
                $('.dashboard').hide();
                $('.inforDaiLy').hide();
                $('.chinh_sach').hide();
                $('.code_thang').hide();
                $('.chinh_sach').hide();
                $('.nav_soDu').hide();
                $('.sidebar_content').html(`<li class="lich_su_nap_admin "><a href="javascript:lichSuNapAD();"> Lịch Sử Nhận</a></li>
                                            <li class="lich_su_chuyen_admin "><a href="javascript:lichSuChuyenAD('`+role+`');"> Lịch Sử Chuyển</a></li>`);
                showADMIN();
                lichSuNapAD();
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
  	$('.tongnap_daily').hide();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    $('#title_id').html('DashBoard');
    $('.saoke_daily').hide();
    checkInput();

    // $('.nav_fade').toggleClass('open');
    // $('#nav-icon3').toggleClass('open');


}
function showTTDaiLy() {
    $('.content_admin').hide();
  	$('.tongnap_daily').hide();
    $('.content_dashboard').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    $('.content_inforDaiLy').show();
    $('#title_id').html('Thông Tin Đại Lý');
    $('.saoke_daily').hide();
    checkInput();

}


function showChinhSach() {
    $('.content_admin').hide();
    $('.tongnap_daily').hide();
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_kho_code').hide();
    $('.content_chich_sach').show();
    $('#title_id').html('Chích Sách Đại Lý');
    $('.saoke_daily').hide();
    checkInput();

}


function showCODE() {
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_admin').hide();
    $('.tongnap_daily').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').show();
    $('#title_id').html('Kho CODE Tháng');
    checkInput();
    $('.saoke_daily').hide();
}


function showADMIN() {
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    $('.content_admin').show();
    $('#title_id').html('ADMIN');
  	$('.tongnap_daily').hide();
      $('.saoke_daily').hide();
}

function showTongNap (){
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    $('.content_admin').hide();
    $('.tongnap_daily').show();
    $('.saoke_daily').hide();
    getTongNap ();
}

function showSaoKe(){
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').hide();
    $('.content_chich_sach').hide();
    $('.content_kho_code').hide();
    $('.content_admin').hide();
    $('.tongnap_daily').hide();
    $('.saoke_daily').show();


    //getTongNap ();
}

function getSaoKeDailyGame(){
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
<<<<<<< HEAD
            $('.bang_saoke').html(`<table > ${res} </table>`);
=======
            $('.bang_saoke').html(`Tổng nạp: 510,110,000.00<br><table > ${res} </table>`);
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05
        },
        complete: function () {
        }
    });
}

function getSaoKeNguyenQuangTung(){
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
<<<<<<< HEAD
            $('.bang_saoke').html(`<table > ${res} </table>`);
        },
        complete: function () {
        }
    });
}

function getSaoKeMinato(){
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
=======
            $('.bang_saoke').html(`Tổng nạp: 6,100,000.00<br><table > ${res} </table>`);
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05
        },
        complete: function () {
        }
    });
}

function getSaoKeQuyenQuyen(){
<<<<<<< HEAD
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

function getSaoKeWeacc(){
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

function getSaoKeSonHeroGaming(){
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
=======
    $('.bang_saoke').html(`No info`);
    // $.ajax({
    //     url: '/backend/saoKeQuyenQuyen.php',
    //     // url: '/backend/lognap.php',
    //     type: 'get',
    //     data: '',
    //     dataType: '',
    //     beforeSend: function () {
    //     },
    //     success: function (res) {
    //         console.log(res)
    //         $('.bang_saoke').html(`<table > ${res} </table>`);
            
    //     },
    //     complete: function () {
    //     }
    // });
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05
}

function getSaoKeKunBanThe(){
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
<<<<<<< HEAD
            $('.bang_saoke').html(`<table > ${res} </table>`);
=======
            $('.bang_saoke').html(`Tổng nạp: 1,250,000<br><table > ${res} </table>`);
>>>>>>> e9027091f2d60097c15998145852b62e9b5f7d05
        },
        complete: function () {
        }
    });
}











function getTongNap (){
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
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {
          
        },
        success: function (res) {
            console.log(res)
            $('.table').html(res);
            $(".lich_su_nap_admin").addClass("active");
            $(".lich_su_chuyen_admin").removeClass("active");
            

        },
        complete: function () {
        }
    });
}







// show table ADMIN
function lichSuChuyenAD(role) {
  
    $.ajax({
        // url: 'https://ninjahuyenthoai.vn/daily/lichsuchuyenadmin.php',
        url: '/backend/logchuyenAD.php',
        type: 'get',
        data: '',
        dataType: '',
        beforeSend: function () {

        },
        success: function (res) {
            $('.table').html(res);
            $(".lich_su_chuyen_admin").addClass("active");
            $(".lich_su_nap_admin").removeClass("active");
          	if(role == 'ctv'){
            	$(".search").hide();
            }
        },
        complete: function () {

        }
    });
}



function submitStatus($username, $nguoichuyen) {
    $.ajax({
        url: '/backend/submitStatus.php',
        type: 'post',
        data: {
            username: $username,
          	nguoichuyen: $nguoichuyen
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
    $.get("/backend/thongbao.php", function (data) {
        $('.thong_bao').html(data);
    });

}



$('#nav-icon3').click(function () {
    $('.nav_fade').toggleClass('open');
})





// check input của nav mobbile
function checkInput() {
    $('.nav_fade').toggleClass('open');
    $('#nav-icon3').toggleClass('open');
    // checked false cho input
    $('#nav_mb').get(0).checked = false;
}


