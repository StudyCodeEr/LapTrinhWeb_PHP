<?php
$rowsPerPage = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$totalRows = 100;
$totalPages = ceil($totalRows / $rowsPerPage);
$page = min($page, $totalPages);
$start = ($page - 1) * $rowsPerPage;

echo "<style>";
echo "table { border-collapse: collapse; margin: 0 auto; }";
echo "th, td { border: 1px solid black; padding: 8px; text-align: center; }";
echo "th { background-color: #f2f2f2; }";
echo ".pagination { text-align: center; margin: 20px 0; }";
echo ".pagination a { padding: 5px 10px; text-decoration: none; color: black; }";
echo ".pagination a.active { font-weight: bold; color: blue; }";
echo "</style>";

echo "<table>";
echo "<tr><th>STT</th><th>Tên sách</th><th>Nội dung sách</th></tr>";
for ($i = $start; $i < $start + $rowsPerPage && $i < $totalRows; $i++) {
    echo "<tr>";
    echo "<td>" . ($i + 1) . "</td>";
    echo "<td>Tensach" . ($i + 1) . "</td>";
    echo "<td>Noidung" . ($i + 1) . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<div class='pagination'>";
if ($page > 1) {
    echo "<a href='?page=" . ($page - 1) . "'>Trước</a> ";
}
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=$i' class='" . ($i == $page ? "active" : "") . "'>$i</a> ";
}
if ($page < $totalPages) {
    echo "<a href='?page=" . ($page + 1) . "'>Sau</a>";
}
echo "</div>";
?>
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