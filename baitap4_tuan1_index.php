<?php
include 'baitap4_tuan1_ham.php';

$array_input = '';
$check_num = '';
$result = '';
$max_val = '';
$min_val = '';
$tong_val = '';
$sap_xep_arr = '';
$ton_tai_msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $array_input = explode(',', $_POST['array_input']);
    $array_input = array_map('intval', array_filter($array_input));
    $check_num = intval($_POST['check_number']);

    if (!empty($array_input)) {
        $max_val = tim_gia_tri_lon_nhat($array_input);
        $min_val = tim_gia_tri_nho_nhat($array_input);
        $tong_val = tinh_tong($array_input);
        $sap_xep_arr = sap_xep_mang($array_input);
        $ton_tai_msg = kiem_tra_ton_tai($check_num, $array_input) ? "Co $check_num trong mang" : "Khong co $check_num trong mang";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xử Lý Mảng</title>
    <link rel="stylesheet" href="baitap4_tuan1_style.css">
</head>
<body>
    <div class="main-box">
        <h1>Xử Lý Mảng</h1>
        <form action="Bai4_index.php" method="post" class="input-area">
            <p>Nhap mang <br> (dung dau phay cach nhau): <input type="text" name="array_input" value="<?php echo isset($_POST['array_input']) ? $_POST['array_input'] : ''; ?>"></p>
            <p>So can tim kiem: <input type="text" name="check_number" value="<?php echo isset($_POST['check_number']) ? $_POST['check_number'] : ''; ?>"></p>
            <input type="submit" value="Kiem tra">
        </form>
        <?php if (!empty($array_input) && is_numeric($check_num)): ?>
        <div class="output-area">
            <p>Mang ban dau: <?php echo implode(', ', $array_input); ?></p>
            <p>Gia tri lon nhat: <?php echo $max_val; ?></p>
            <p>Gia tri nho nhat: <?php echo $min_val; ?></p>
            <p>Tong mang: <?php echo $tong_val; ?></p>
            <p>Mang sau sap xep: <?php echo implode(', ', $sap_xep_arr); ?></p>
            <p>Ket qua kiem tra: <?php echo $ton_tai_msg; ?></p>
        </div>
        <?php endif; ?>
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