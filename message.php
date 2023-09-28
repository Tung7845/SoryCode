<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi đến Trang</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Kablammo&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/message.css">
</head>

<body>
    <div class="container">
        <div id="text-message">
            <div id="container-title" class="title"></div>
            <div id="container-text" class="text"></div>
        </div>
    </div>
    <script>
        // Your string
        const title = "Chào Trang!";
        const text = "Anh muốn bắt đầu bằng việc thú nhận rằng anh đã đã nói dối rằng anh đang ở Nhật, thật ra anh đã trở về Việt Nam từ đầu năm nay, nhưng anh đã nói dối rằng anh vẫn đang ở Nhật và còn hẹn gặp em vào cuối tuần này, chỉ vì anh nghi ngờ facebook của em được tạo bởi anh chàng nào đó và câu dụ anh với mục đích không tốt, nhưng anh đã hiểu nhầm em, và anh hiểu rằng điều đó có thể gây ra sự phiền phức và mất thời gian cho em. Anh xin lỗi thật lòng về điều này .Anh hiểu rằng anh đã nói dối về việc ở Nhật khi thực tế anh đang ở Việt Nam, sẽ làm mất sự tin tưởng và gây ấn tượng không tốt của em về anh. Anh thật sự xin lỗi vì điều này và thừa nhận rằng anh đã hành động không đúng đắn.";

        // Reference to the container element
        const containerTitle = document.getElementById("container-title");
        const containerText = document.getElementById("container-text");

        // Function to render text one character at a time
        async function renderText(text, textType, container, timeout) {
            // Clear the container
            container.innerHTML = "";

            // Split the text into an array of characters
            const characters = text.split("");

            // Loop through each character and create a <span> for it
            for (let index = 0; index < characters.length; index++) {
                const charSpan = document.createElement(textType);
                charSpan.textContent = characters[index];

                // Append the element to the container
                container.appendChild(charSpan);

                // Delay the rendering of each character (adjust the delay as needed)
                await new Promise((resolve) => setTimeout(resolve, timeout)); // Delay in milliseconds
            }
        }

        // Call the renderText function to start rendering
        renderText(title, "h3", containerTitle, 120)
            .then(() => {
                // After the first function completes, call the second function
                return renderText(text, "span", containerText, 50);
            })
            .catch((error) => {
                console.error(error);
            });
    </script>
    <?php
    // Lấy địa chỉ IP của người truy cập
    $ip = $_SERVER['REMOTE_ADDR'];

    // Lấy user agent của người truy cập
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    // Tên tệp tin để lưu thông tin
    $filename = 'log.txt';

    // Mở tệp tin để ghi
    $file = fopen($filename, 'a');

    $domain = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // Ghi thông tin vào tệp tin cùng với thời gian
    $logData = $domain . ': ' . date('H:i:s d-m-Y') . ' - IP: ' . $ip . ' - User Agent: ' . $userAgent . PHP_EOL;
    fwrite($file, $logData);

    // Đóng tệp tin
    fclose($file);
    ?>


</body>

</html>