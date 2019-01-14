<?php

echo "자꾸 연결이 안되 ㅜㅜ";
echo $_SERVER['REQUEST_METHOD'];
//$link = mysqli_connect("localhost", "root", "7269", "Capstone");
//
//if (!$link) {
//    echo "MySQL 접속 에러 : ";
//    echo mysqli_connect_error();
//    exit();
//}
//mysqli_set_charset($link, "utf8");
//
//$_name = $_POST['_name'];
//$_address = $_POST['_address'];
//
//$sql = "INSERT INTO Capstone.Person ('name', 'address') VALUE (${$_name},${$_address})";
//
//$result = mysqli_query($link, $sql);
//
//echo "사용된 쿼리문 : ${$sql}\n";
//echo "데이터 삽입이 성공하였습니다.\n";
//echo "이름 : ${$_name}\n";
//echo "주소 : ${$_address}\n";