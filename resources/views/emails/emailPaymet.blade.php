<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Hóa Đơn</h1>

    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Dưới đây là thông tin chi tiết về hóa đơn của bạn:</p>

    <table>
        <thead>
        <tr>
            <th>Khách hàng</th>
            <th>Tour</th>
            <th>Ngày khởi hành</th>
            <th>Số lượng</th>
            <th>Tổng Tiền</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$data['name']}}</td>
            <td>{{$data['tour']}}</td>
            <td>{{$data['ngay_bat_dau']}} </td>
            <td>{{$data['so_nguoi']}} vé</td>
            <td>{{$data['tong_tien']}} Vnđ</td>
        </tr>
        <!-- Thêm các dòng khác tương tự cho các sản phẩm khác -->
        </tbody>
    </table>

    <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi.</p>

    <p>Trân trọng,<br>
        Booking Tour</p>
</div>

</body>
</html>
