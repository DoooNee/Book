<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/ticket.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- 
            - Tên đại lý
            - Tiêu đề 
            - Nội dung
            - Hình ảnh đính kèm (tối đa 5 hình)
            - Nút submit
         -->

    <div class="wrapper">
        <div class="container">
            <div class="close_form">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <h1 style="text-align: center;color:#53b5dc ;">Phản Hồi</h1>
            <form id="form" style="" action="" enctype='multipart/form-data'>
                <label for="fname">Tên Đại Lý*</label><br>
                <input id="fname" type="text" name="fname"><br><br>
                <label for="title">Tiêu Đề*</label><br>
                <input id="title" type="text" name="title"><br><br>
                <label for="content">Nội Dung*</label><br>
                <textarea id="content" name="content"></textarea><br><br>
                <label for="image">Hình Ảnh Đính Kèm(tối đa 5 hình)</label><br>
                <input id="image" type="file" name="image" multiple="5"><br><br>
                <input id="submit" type="button" value="Gửi" onclick="submitForm()">
            </form>
        </div>
    </div>

    <div class="close">

    </div>

    <script src="/assets/js/ticket.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>