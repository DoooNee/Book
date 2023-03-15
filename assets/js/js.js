$( document ).ready(function() {
    loginCheck();
    
});


function loginCheck(){
    $.ajax({
        //url: 'https://ninjahuyenthoai.vn/daily/thongtindaily.php',
        url: '/backend/login.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res);
            if(res.isLogin == 0){
                $('.wrapper_popup').show();
            }

            else{
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
    $('.content_inforDaiLy').hide();
    $('#title_id').html('DashBoard');

}
function showTTDaiLy() {
    $('.content_dashboard').hide();
    $('.content_inforDaiLy').show();
    $('#title_id').html('Thông Tin Đại Lý');
    // $.ajax({
    //     url: 'https://ninjahuyenthoai.vn/daily/thongtindaily.php',
    //     type: 'get',
    //     data: '',
    //     dataType: 'json',
    //     beforeSend: function () {
    //         $('.content_dashboard').hide();
    //         $('.content_inforDaiLy').show();
    //         $('#title_id').html('Thông Tin Đại Lý');
    //     },
    //     success: function (res) {
    //         // console.log(res)
    //         // $('.user_name').html(res.name);
    //         // $('#ten').html(res.name);
    //         // $('#cccd').html(res.CCCD);
    //         // $('#stk').html(res.stk);
    //         // $('#mail').html(res.mail);
    //         // $('#tongNap').html(res.tongnap);
    //         // $('.VP').html(res.VP);

    //     },
    //     complete: function () {
    //     }
    // });
}


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
            if(res.status == "error"){
                swal("Thông báo!", "Thông tin đăng nhập không đúng!");
            }

            else{
                swal({
                    title: "Thông báo!",
                    text: "Đăng nhập thành công!"
                }).then(function() {
                    window.location = "/";
                });
            }
            
        },
        complete: function () {
        }
    });
}







