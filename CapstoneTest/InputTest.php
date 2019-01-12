<?php
$link = mysqli_connect("localhost", "root", "7269", "Capstone");

if (!$link) {
    echo "MySQL 접속 에러 : ";
    echo mysqli_connect_error();
    exit();
}

mysqli_set_charset($link, "utf8");

$_name = $_POST['name'];
$_address = $_POST['address'];

$sql = "INSERT INTO Capstone.Person (name, address) VALUE (${_name},${_address})";

$result = mysqli_query($link, $sql);