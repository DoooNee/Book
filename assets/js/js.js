
function showDashBoard() {
    $('.content_dashboard').show();
    $('.content_inforDaiLy').hide();
    $('#title_id').html('DashBoard');

}
function showTTDaiLy() {
    $.ajax({
        url: 'https://ninjahuyenthoai.vn/daily/thongtindaily.php',
        type: 'get',
        data: '',
        dataType: 'json',
        beforeSend: function () {
            $('.content_dashboard').hide();
            $('.content_inforDaiLy').show();
            $('#title_id').html('Thông Tin Đại Lý');
        },
        success: function (res) {
            console.log(res)
            $('.user_name').html(res.name);
            $('#ten').html(res.name);
            $('#cccd').html(res.CCCD);
            $('#stk').html(res.stk);
            $('#mail').html(res.mail);
            $('#tongNap').html(res.tongnap);
            $('.VP').html(res.VP);

        },
        complete: function () {
        }
    });
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







