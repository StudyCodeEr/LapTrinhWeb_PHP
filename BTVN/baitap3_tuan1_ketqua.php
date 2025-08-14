<?php
require 'baitap3_tuan1_ham_xuly.php';

$so1 = $_POST['a'];
$so2 = $_POST['b'];
$pheptinh = $_POST['phep_tinh'];
$ketqua = '';
$tenpheptinh = '';

if (is_numeric($so1) && is_numeric($so2)) {
    if ($pheptinh == 'cong') {
        $ketqua = tinhTong($so1, $so2);
        $tenpheptinh = 'Cộng';
    } elseif ($pheptinh == 'tru') {
        $ketqua = tinhHieu($so1, $so2);
        $tenpheptinh = 'Trừ';
    } elseif ($pheptinh == 'nhan') {
        $ketqua = tinhTich($so1, $so2);
        $tenpheptinh = 'Nhân';
    } elseif ($pheptinh == 'chia') {
        $ketqua = tinhThuong($so1, $so2);
        $tenpheptinh = 'Chia';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ket Qua Phep Tinh</title>
</head>
<body>
    <div style="border: 1px solid blue; width: 400px; margin: auto; padding: 20px;">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        Chọn phép tính: <?php echo $tenpheptinh; ?><br><br>
        a: <input type="text" value="<?php echo $so1; ?>" readonly><br><br>
        b: <input type="text" value="<?php echo $so2; ?>" readonly><br><br>
        Kết quả <input type="text" value="<?php echo $ketqua; ?>" readonly><br><br>
        <a href="baitap3_tuan1_pheptinh.php"> -Quay lại- </a>
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