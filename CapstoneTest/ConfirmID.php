<?php

// 데이터베이스 커넥터 생성
$link = mysqli_connect("localhost", "root", "7269", "SYSTEM");

if (!$link) {
    echo "MySQL 접속 에러 : ";
    echo mysqli_connect_error();
    exit();
}

// 유니코드 설정
mysqli_set_charset($link, "utf8");

$arg1 = $_POST['user_id'];

// 쿼리문 작성
$sql = "select user_id from UserInfoTBL where user_id = '$arg1'";

// 쿼리 실행 (return true or false)
$result = mysqli_query($link, $sql);

// 데이터 배열 생성
$data = array();

if ($result) {
    $row = mysqli_fetch_row($result);
    if($row){
        // 중복된 값이 있을 경우
        echo "OVERLAP";
    }else{
        // 아이디가 중복되지 않을 경우
        echo "NOT_OVERLAP";
    }
} else {
    echo $sql;
}

mysqli_close($lik);

