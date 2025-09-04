<?php
$host = "localhost:3306";
$user = "root";
$pass = "Nguyenkien7901@";
$db = "baitaptuan3";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Không thể kết nối CSDL: " . $conn->connect_error);
}
