<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$host = "localhost";
$user = "root";
$pass = "";
$db   = "babakan";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
