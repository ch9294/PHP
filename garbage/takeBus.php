<?php
/**
 * Created by PhpStorm.
 * User: ch929
 * Date: 2018-11-30
 * Time: 오후 8:17
 */

// 세션 시작
session_start();

// 데이터베이스 연결하기
$connect = mysqli_connect("localhost", "ch9294", "7269", "SYSTEM");
$beacon_signal = $_POST['beacon'];

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

$tbl_name = 'UserStatusTBL';

$sql = "SELECT {$column['ID']},{$column['BOOK']},{$column['TRANSFER']},{$column['UUID']},{$column['IN&OUT']} 
FROM {$tbl_name} where {$column['ID']} = {$_SESSION['ID']}";

$result = mysqli_query($connect, $sql);

if (!$beacon_signal . is_null()) {
    /*
     * 환승 처리 구간
     */
    if (transfer_confirm() == 1) {
        echo "환승이 완료되었습니다.\n"; // 환승 처리 완료 (결제 완료)
    } else {
        echo "환승이 불가합니다.\n"; // 일반적인 탑승 처리 (결제 해야함)
    }
} else {

}

// 환승 체크 모듈
function transfer_confirm()
{
    global $result, $column;

    // 환승 여부 체크를 확인
    if ($result[$column['TRANSFER']] == 1) {
    } else {
        return 0;
    }
    // 유효시간 30분 이내 여부 확인
    if (date('yy-mm-dd hh:mm:ss', $result[$column['GET_OFF']]) - date('yy-mm-dd hh:mm:ss', time()) < 30) {
    } else {
        return 0;
    }
    // 환승 횟수 확인
    if ($result[$column['TRANS_CNT']] <= 1) {
    } else {
        return 0;
    }
    // 이전 버스와 환승 버스의 번호 확인
    if (!strcmp($result[$column['UUID']], $_POST['beacon'])) {
        return 1; // 모든 환승 조건이 갖추어 지면 1을 반환
    } else {
        return 0;
    }
}