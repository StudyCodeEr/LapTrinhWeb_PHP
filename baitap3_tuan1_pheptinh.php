<!DOCTYPE html>
<html>
<head>
    <title>Phep Tinh Tren Hai So</title>
</head>
<body>
    <div style="border: 1px solid blue; width: 400px; margin: auto; padding: 20px;">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        <form action="baitap3_tuan1_ketqua.php" method="post">
            Chọn phép tính:
            <input type="radio" name="phep_tinh" value="cong" checked> Cộng
            <input type="radio" name="phep_tinh" value="tru"> Trừ
            <input type="radio" name="phep_tinh" value="nhan"> Nhân
            <input type="radio" name="phep_tinh" value="chia"> Chia
            <br><br>
            a: <input type="text" name="a"><br><br>
            b: <input type="text" name="b"><br><br>
            <input type="submit" value="Tinh">
        </form>
    </div>
</body>
</html>
<?php
// Nút quay lại trang tuần tương ứng
echo '<p><a href="week1.php" style="
    display:inline-block;
    padding:8px 12px;
    background:#6a5acd;
    color:white;
    text-decoration:none;
    border-radius:6px;
    font-family:Arial, sans-serif;
">⬅ Quay về Tuần 1</a></p>';
?>