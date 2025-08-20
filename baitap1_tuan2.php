<?php

//GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
    $ten_sach = htmlspecialchars($_GET['ten_sach']);
    $tac_gia = htmlspecialchars($_GET['tac_gia']);
    $nxb = htmlspecialchars($_GET['nxb']);
    $nam_xuat_ban = htmlspecialchars($_GET['nam_xuat_ban']);

    echo '<div class="result"><h3>Kết quả (GET):</h3>';
    echo "Tên sách: " . $ten_sach . "<br>";
    echo "Tác giả: " . $tac_gia . "<br>";
    echo "Nhà xuất bản: " . $nxb . "<br>";
    echo "Năm xuất bản: " . $nam_xuat_ban . "<br></div><br>";
}

//POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $ten_sach = htmlspecialchars($_POST['ten_sach']);
    $tac_gia = htmlspecialchars($_POST['tac_gia']);
    $nxb = htmlspecialchars($_POST['nxb']);
    $nam_xuat_ban = htmlspecialchars($_POST['nam_xuat_ban']);

    echo '<div class="result"><h3>Kết quả (POST):</h3>';
    echo "Tên sách: " . $ten_sach . "<br>";
    echo "Tác giả: " . $tac_gia . "<br>";
    echo "Nhà xuất bản: " . $nxb . "<br>";
    echo "Năm xuất bản: " . $nam_xuat_ban . "<br></div><br>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form thông tin sách</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 20px;
        }
        h2 {
            color: #333;
            margin-top: 30px;
        }
        form {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 420px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"], 
        input[type="number"] {
            width: calc(100% - 12px);
            padding: 6px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background: #007BFF;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        .result {
            background: #eaf7ea;
            border: 1px solid #b5dfb5;
            padding: 10px;
            border-radius: 6px;
            width: 350px;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
    <h2>Form nhập thông tin sách (GET)</h2>
    <form method="get" action="">
        Tên sách: <input type="text" name="ten_sach"><br>
        Tác giả: <input type="text" name="tac_gia"><br>
        Nhà xuất bản: <input type="text" name="nxb"><br>
        Năm xuất bản: <input type="number" name="nam_xuat_ban"><br>
        <input type="submit" value="Gửi bằng GET">
    </form>

    <h2>Form nhập thông tin sách (POST)</h2>
    <form method="post" action="">
        Tên sách: <input type="text" name="ten_sach"><br>
        Tác giả: <input type="text" name="tac_gia"><br>
        Nhà xuất bản: <input type="text" name="nxb"><br>
        Năm xuất bản: <input type="number" name="nam_xuat_ban"><br>
        <input type="submit" value="Gửi bằng POST">
    </form>

    <h3>Khác nhau giữa GET và POST</h3>
    <ul>
        <li>GET gửi dữ liệu qua URL, dễ thấy và copy được link.</li>
        <li>POST gửi dữ liệu ẩn trong body, an toàn hơn và không giới hạn nhiều.</li>
    </ul>
</body>
</html>
<?php
// Nút quay lại trang tuần tương ứng
echo '<p><a href="week2.php" style="
    display:inline-block;
    padding:8px 12px;
    background:#6a5acd;
    color:white;
    text-decoration:none;
    border-radius:6px;
    font-family:Arial, sans-serif;
">⬅ Quay về Tuần 2</a></p>';
?>