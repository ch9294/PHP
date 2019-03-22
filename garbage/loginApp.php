<?php
/**
 * Created by PhpStorm.
 * User: choecheon-il
 * Date: 2019-01-22
 * Time: 15:23
 */

// 데이터베이스 커넥터 생성
$link = mysqli_connect("localhost", "root", "7269", "SYSTEM");

if (!$link) {
    echo "MySQL 접속 에러 : ";
    echo mysqli_connect_error();
    exit();
}

// 유니코드 설정
mysqli_set_charset($link, "utf8");

/*
 * POST 방식으로 클라이언트에서 전달한 데이터를 각각의 키 값을 이용해서 변수에 저장
 */
$userId = $_POST['userId'];
$userPw = $_POST['userPw'];

const USER_PW = 1;

// 쿼리문 작성
$sql = "select user_id,user_pw from UserInfoTBL where user_id = '$userId'";

// 쿼리 실행 (return true or false)
$result = mysqli_query($link, $sql);


if ($result) {
    // 쿼리 성공

    // 쿼리한 결과를 배열 받음
    $row = mysqli_fetch_row($result);
    if ($row) {
        if (strcmp($row[USER_PW],$userPw) == 0) {
            // 아이디와 비밀번호 모두 일하는 경우
            echo "SUCCESS_LOGIN";
            return;
        }
        // 아이디는 있지만 비밀번호가 틀릴 경우
        echo "NOT_EQUAL_PASSWORD";
        return;
    } else {

        // 아이디가 존재하지 않을 경우
        echo "NOT_SEARCH_ID";
        return;
    }
} else {
    echo "FAILED_QUERY";
}