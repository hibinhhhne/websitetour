<!DOCTYPE html>
<html>
<head>
    <style>
        /* Thêm CSS tại đây */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }

        .email-container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #777;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h1>Thông báo đặt hàng</h1>
    <p>
        Xin chào {{ $data['name'] }},<br>
        Chúng tôi đã nhận được yêu cầu đặt tour của bạn:<br>

        <br>
        Để xác nhận đặt tour vui lòng bấm vào link bên dưới để xác nhận:<br>
        <br>
        {{ $data['link'] }}
    </p>
</div>
</body>
</html>
