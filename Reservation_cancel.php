<?php
/**
 * Created by PhpStorm.
 * User: ch929
 * Date: 2018-12-03
 * Time: 오전 11:25
 */
session_start();

// 데이터베이스 연결하기
$connect = mysqli_connect("localhost", "ch9294", "7269", "SYSTEM");

// 데이터베이스 연결여부 확인
if ($connect) {
    echo "데이터베이스 접속에 성공했습니다.";
} else {
    echo "데이터베이스 접속에 실패했습니다.";
    return;
}

$tbl_name = 'UserStatusTBL';

// 예약 여부 변경하기
$cancel_sql = "DELETE FROM {$tbl_name} WHERE userid = {$_SESSION['ID']}";

mysqli_query($connect,$cancel_sql);