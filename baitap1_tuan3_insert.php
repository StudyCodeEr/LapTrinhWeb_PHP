<?php
require "baitap1_tuan3_connect.php";

$sql = "INSERT INTO myguests (firstname, lastname, email) 
        VALUES ('Anna', 'Taylor', 'anna@example.com')";

if ($conn->query($sql) === TRUE) {
    header("Location: baitap1_tuan3_select.php");
    exit;
} else {
    echo "<p>Lỗi: " . $conn->error . "</p>";
}

$conn->close();
?>
