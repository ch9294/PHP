<?php
/**
 * Created by PhpStorm.
 * User: ch929
 * Date: 2019-01-14
 * Time: 오후 2:06
 */

//echo $_SERVER['REQUEST_METHOD'];


$data1 = $_POST['data1'];
$data2 = $_POST['data2'];
$data3 = $_POST['data3'];

//echo $data1;
//echo $data2;
//echo $data3;
//

$jsonArr = array(
    "value1" => $data1,
    "value2" => $data2,
    "value3" => $data3,
);

// json 작업을 위한 헤더 선언
header('Content-Type: application/json; charset=utf8');

// 배열의 값을 json으로 인코딩
// 인코딩과 동시에 안드로이드 앱으로 json 데이터 전달
$json = json_encode($jsonArr, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
echo $json;
