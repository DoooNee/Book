$(document).ready(function () {
    // thongbao();
    loginCheck();
    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
        $(this).toggleClass('open');
    });
});



function loginCheck() {
    $.ajax({
        url: '/backend/login.php',
        // url : 'https://goirongat.tranthanhquan.com/backend/daily/logintest.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            // console.log(res);
            if (res.isLogin != 1) {
                $('.wrapper_popup').show();
            }
            else {
                if(res.role == 'admin'){
                    window.location = "/admin";
                }
                else if(res.role == 'daily'){
                    window.location = "/daily";
                }
            }

            if (res.role == 'daily') {
                console.log(res.role);
            } else {
                var role = res.role;
            }

        },
        complete: function () {
        }
    });
}


function checkAdmin() {
    swal("Bạn Không Phải ADMIN!");
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
        url: './backend/login.php',
        // url: 'https://goirongat.tranthanhquan.com/backend/daily/logintest.php',
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
                    if(res.role == 'daily'){
                        window.location = "/daily";
                    }
                    else {
                        window.location = "/admin";
                    }
                });
            }

        },
        complete: function () {
        }
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


