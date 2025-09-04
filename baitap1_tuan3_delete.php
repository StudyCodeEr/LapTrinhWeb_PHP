<?php
require "baitap1_tuan3_connect.php";

$sql = "DELETE FROM myguests WHERE id=2";

if ($conn->query($sql) === TRUE) {
    header("Location: baitap1_tuan3_select.php");
    exit;
} else {
    echo "<p>Lỗi: " . $conn->error . "</p>";
}

$conn->close();
?>
