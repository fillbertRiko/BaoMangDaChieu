<?php
$mysqli = new mysqli("localhost","root","","web_mysqli");

// Check connection
if ($mysqli->connect_errno) {
  echo "Kết nối mySQL lỗi: " . $mysqli->connect_error;
  exit();
}
?>