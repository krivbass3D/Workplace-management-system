<?php
	$conn = mysqli_connect("localhost", "root", "root", "db_drm");
  mysqli_set_charset($conn, "utf8");
  
if (!$conn) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>