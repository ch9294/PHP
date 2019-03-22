<?php

$link = mysqli_connect("localhost", "root", "7269", "SYSTEM");

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

$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$user_name = $_POST['user_name'];
$user_age = $_POST['user_age'];
$user_sex = $_POST['user_sex'];

$overlapSignUp = "SELECT user_id FROM UserInfoTBL where user_id = $user_id";

$overlapResult = mysqli_query($link, $overlapSignUp);

if ($overlapResult) {
    $row = mysqli_fetch_row($overlapResult);
    if ($row) {
        echo "OVERLAP";
    } else {
        $sql = "INSERT INTO UserInfoTBL (user_id, user_pw, user_name, user_age, user_sex) VALUES ('${user_id}','${user_pw}','${user_name}','${user_age}','${user_sex}')";
        $result = mysqli_query($link, $sql);

// mysqli_query가 성공과 실패에 따라 boolean형 데이터를 반환한다.
        if ($result) {
            echo "SUCCESS";
        } else {
            echo "FAIL";
        }
    }
}
/*
 * values의 인자는 반드시 작은따옴표로 묶여있어야 한다.
 */



