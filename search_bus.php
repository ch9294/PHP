<?php
/**
 * Created by PhpStorm.
 * User: ch929
 * Date: 2018-11-30
 * Time: 오후 9:18
 */
session_start();

// 데이터베이스 연결하기
$connect = mysqli_connect("localhost", "ch9294", "7269", "SYSTEM");
$platform_name = $_POST['platform_name'];

// 데이터베이스 연결여부 확인
if ($connect) {
    echo "데이터베이스 접속에 성공했습니다.";
} else {
    echo "데이터베이스 접속에 실패했습니다.";
    return;
}

$column = array(
    'PLAT_NAME' => 'platform_name',
    'BUS1' => 'bus1',
    'BUS1' => 'bus2',
    'BUS1' => 'bus3',
    'BUS1' => 'bus4',
);

$tbl_name = 'PlatFormTBL';

$bus_search_sql = "SELECT {$column['BUS1']},{$column['BUS2']},{$column['BUS3']},{$column['BUS4']} 
FROM {$tbl_name} where {$column['PLAT_NAME']} = {$platform_name}";

$platform_search_sql = "SELECT {$column['PLAT_NAME']} FROM {$tbl_name} where {$column[$platform_name]} = $platform_name";

$search_result = mysqli_query($connect, $platform_search_sql);
$bus_result = null; // 초기화

if ($search_result . is_null()) {
    echo "검색하신 버스 정류장이 없습니다.";
    return;
} else {
    $bus_result = mysqli_query($connect, $bus_search_sql);
    return $bus_result; // 검색한 버스 정류장에 정차하는 버스 목록들을 스마트폰으로 전송하여 출력함.
}

