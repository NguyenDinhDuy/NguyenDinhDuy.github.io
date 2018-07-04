<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đăng kí thành viên</title>
</head>
<body>
<p>
    Chào mừng <span style="font-size: 24px;font-family: monospace;font-weight: bold">{{ $user->name }}</span> đã đăng ký
    thành viên tại SuHouse. Bạn hãy click vào đường link sau đây để hoàn tất việc
    đăng ký.
    </br>
    <a style="font-size:20px;color: #E32124;font-weight: bold;font-family: monospace"
       href="{{ $user->activation_link }}">Đường link xác nhận</a>
</p>
</body>
</html>