<?php
$link = mysqli_connect("localhost", "root", "7269", "Capstone");

if (!$link) {
    echo "MySQL 접속 에러 : ";
    echo mysqli_connect_error();
    exit();
}

mysqli_set_charset($link, "utf8");

/*
 * 정확한 이유를 알 수 없지만 $_POST 변수의 값을 직접 쿼리 구문에 사용하는 것 보다는
 * 변수에 대입하여 놓고 그 변수를 이용하는 것이 정확성과 보안성에서 더 나음
 */

$name = $_POST['_name'];
$id = $_POST['_id'];
$pw = $_POST['_password'];
$gender = $_POST['_gender'];
$age = $_POST['_age'];

$search_sql = "SELECT _id from Capstone.UserInfo where _id = ${id}";
$search_result = mysqli_query($link,$sql);

/*
 * values의 인자는 반드시 작은따옴표로 묶여있어야 한다.
 */
$sql = "INSERT INTO Capstone.Person (name, address) VALUES ('${name}','${address}')";

$result = mysqli_query($link, $sql);


// mysqli_query가 성공과 실패에 따라 boolean형 데이터를 반환한다.
if ($result) {
    echo "쿼리 성공\n";
} else {
    echo "쿼리 실패\n";
}
