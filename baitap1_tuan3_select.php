<?php
require "baitap1_tuan3_connect.php";

$sql = "SELECT id, firstname, lastname, email, reg_date FROM myguests";
$result = $conn->query($sql);

echo "<!DOCTYPE html>
<html lang='vi'>
<head>
<meta charset='UTF-8'>
<title>Danh sách khách</title>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body class='myguests-body'>";

echo "<div class='myguests'>";
echo "<h2>Danh sách khách</h2>";

echo "<div style='margin-bottom: 20px;'>
        <a href='baitap1_tuan3_insert.php' class='btn'>Thêm</a>
        <a href='baitap1_tuan3_update.php' class='btn'>Sửa</a>
        <a href='baitap1_tuan3_delete.php' class='btn'>Xóa</a>
      </div>";

echo "<table>
        <tr>
          <th>ID</th><th>Firstname</th><th>Lastname</th>
          <th>Email</th><th>Reg Date</th>
        </tr>";

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["firstname"] . "</td>
                <td>" . $row["lastname"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["reg_date"] . "</td>
              </tr>";
  }
} else {
  echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
}
echo "</table>";
echo "</div>";

echo "</body></html>";

$conn->close();
// Nút quay lại trang tuần tương ứng
echo '<p><a href="week3.php" style="
    display:inline-block;
    padding:8px 12px;
    background:#6a5acd;
    color:white;
    text-decoration:none;
    border-radius:6px;
    font-family:Arial, sans-serif;
">⬅ Quay về Tuần 3</a></p>';