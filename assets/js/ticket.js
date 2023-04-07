
//hiện ẩn Form
$('.close').click(function () {
    $('.container').toggle();
});


// close Form
$('.close_form').click(function () {
    $('.container').hide();
});



//Kiểm tra Form
function submitForm() {
    var fname = $("#fname").val();
    var title = $("#title").val();
    var content = $("#content").val();
    if (fname == "") {
        swal("Chưa Nhập Tên Đại Lí", "", "warning");
        return 0;
    }
    if (title == "") {
        swal("Chưa Nhập Tiêu Đề", "", "warning");
        return 0;
    } if (content == "") {
        swal("Chưa Nhập Nội Dung", "", "warning");
        return 0;
    }
    swal("Gửi phản hồi thành công", "", "success");
}

































