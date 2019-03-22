<?php
/**
 * Created by PhpStorm.
 * User: ch929
 * Date: 2018-11-30
 * Time: 오후 9:46
 */

session_start();

// 데이터베이스 연결하기
$connect = mysqli_connect("localhost", "ch9294", "7269", "SYSTEM");
$select_bus = $_POST['bus1']; // 선택한 버스가 1번 버스라고 가정
$transfer =  $_POST['transfer'];

// 데이터베이스 연결여부 확인
if ($connect) {
    echo "데이터베이스 접속에 성공했습니다.";
} else {
    echo "데이터베이스 접속에 실패했습니다.";
    return;
}

$column = array(
    'ID' => 'userid',
    'BOOK' => 'book',
    'TRANSFER' => 'transfer',
    'UUID' => 'uuid',
    'IN&OUT' => 'inandout',
    'GET_OFF' => 'getoff',
    'TRANS_CNT' => 'transCnt',
    'LAST_BUS_NUM' => 'lastBusNum',
);

$tbl_name = 'UserInfoTBL';

$book_sql = "UPDATE {$tbl_name} SET {$column['BOOK']} = 1 , {$column['IN&OUT']} = false , {$column['TRANSFER']} = true 
WHERE {$column['ID']} = {$_SESSION['userid']}";

mysqli_query($connect,$book_sql);