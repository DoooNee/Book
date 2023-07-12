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
                //Nếu là admin thì hiển thị tất cả game
                $('.content_group').css('display','grid');
                
            }



        },
        complete: function () {
        }
    });
}

function getGameNumber($name){
    $.ajax({
        url: '/backend/getGameNumber.php',
        type: 'post',
        data: {
            name: $name,

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


function checkAdmin() {
    swal("Bạn Không Phải ADMIN!");
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


