<?php
/**
 * Created by PhpStorm.
 * User: ch929
 * Date: 2018-11-30
 * Time: 오후 7:35
 */

// 데이터베이스 연결하기
$connect = mysqli_connect("localhost", "ch9294", "7269", "SYSTEM");

// 데이터베이스 연결여부 확인
if ($connect) {
    echo "데이터베이스 접속에 성공했습니다.";
} else {
    echo "데이터베이스 접속에 실패했습니다.";
    return;
}

/*
 * SQL Injection 방지를 위해 컬럼명과 테이블 이름은 전부 변수에 저장
 */
$column = array(
    'ID' => 'userid',
    'PW' => 'password',
    );
$table_name = 'UserInfoTBL'; // 테이블 이름

// 아이디와 비밀번호 검색을 위한 쿼리문
$sql = "SELECT {$column['ID']} from {$table_name} where {$column['PW']} = {$_POST['ID']}";

// 쿼리 실행
$result = mysqli_query($connect, $sql);

if (strcmp($result['pw'], $_POST['_pw'])) {
    echo "로그인 성공";
} else {
    echo "로그인 실패";
}