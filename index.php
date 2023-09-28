<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào Trang</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Kablammo&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>

    <div class="container">
        <div class="heart">
            <a href='./message.php' class='title'>Open Message</a>
        </div>
    </div>
</body>

</html>
<?php
// Lấy địa chỉ IP của người truy cập

// Lấy user agent của người truy cập
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Tên tệp tin để lưu thông tin
$filename = 'log.txt';

// Mở tệp tin để ghi
$file = fopen($filename, 'a');

$domain =$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$ip = $_SERVER['REMOTE_ADDR'];
// Ghi thông tin vào tệp tin cùng với thời gian
$logData = $domain.': '.date('H:i:s d-m-Y') . ' - IP: ' . $ip . ' - User Agent: ' . $userAgent . PHP_EOL;
fwrite($file, $logData);

// Đóng tệp tin
fclose($file);
?>
