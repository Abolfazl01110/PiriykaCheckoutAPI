<?php

$conn = mysqli_connect('localhost', 'h200391_AE', 'root', 'databasename', 3306);
mysqli_set_charset($conn, "utf8mb4");


if (!$conn) {
    echo 'Connection Error ' . mysqli_connect_error();
}

?>
