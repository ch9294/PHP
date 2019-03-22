<?php
/**
 * Created by PhpStorm.
 * User: ch929
 * Date: 2018-12-03
 * Time: 오후 7:06
 */
$connect = mysqli_connect("localhost", "ch9294", "7269", "SYSTEM");

// 데이터베이스 연결여부 확인
if ($connect) {
    echo "데이터베이스 접속에 성공했습니다.";
} else {
    echo "데이터베이스 접속에 실패했습니다.";
    return;
}

$tbl_name = 'UserInfoTBL';
$fee = $_POST['MONEY'];

$column = array(
    'ID' => 'userid',
    'PASSWORD' => 'password',
    'NAMES' => 'names',
    'AGE' => 'age',
    'MONEY' => 'money',
    'GET_OFF' => 'getoff',
);

// 요금을 불러옴
$fee_sql = "SELECT {$column['MONEY']} FROM {$tbl_name} WHERE {$column['ID']} = {$_SESSION['ID']}";
// 요금 수정
$update_sql = "UPDATE {$tbl_name} SET {$column['MONEY']} = {$result} WHERE {$column['ID']} = {$_SESSION['ID']}";

// 현재 사용자의 잔액을 불러온다.
$result = mysqli_query($connect,$fee_sql);

// 현재 사용자의 잔액과 버스 요금을 차감시킨다.
$result += $fee;

// 잔액의 여부를 변경한다.
mysqli_query($connect,$update_sql);
