<?php

/*
 * 안드로이드와 데이터베이스 간의 간단한 통신 예제
 */

// 데이터베이스 커넥터 생성
$link = mysqli_connect("localhost", "root", "7269", "Capstone");

/*
 * 커넥터 생성 여부 확인
 * 만약 연결 실패 할 시 에러 전달
 * 안드로이드 소스에 에러 발생 소스 미작성 (차후 작성 예정)
 */
if (!$link) {
    echo "MySQL 접속 에러 : ";
    echo mysqli_connect_error();
    exit();
}

// 유니코드 설정
mysqli_set_charset($link, "utf8");

// 쿼리문 작성
$sql = "select * from Person";

// 쿼리 실행
$result = mysqli_query($link, $sql);

// 데이터 배열 생성
$data = array();

if ($result) {

    /*
     * 데이터베이스에 저장된 각 레코드를 반환함
     * while문은 레코드 값이 null이 될 때까지 다음 레코드를 가리키도록 한다.
     */
    while ($row = mysqli_fetch_array($result)) {
        /*
         * 레코드를 위에서 생성한 데이터 배열에 삽입
         * ArrayList 혹은 Vector와 비슷하게 배열을 삽입
         */
        array_push($data,
            array('id' => $row[0],
                'name' => $row[1],
                'address' => $row[2]
            ));
    }

//    echo "<pre>"; print_r($data); echo '</pre>';

    // json 작업을 위한 헤더 선언
    header('Content-Type: application/json; charset=utf8');

    // 배열의 값을 json으로 인코딩
    // 인코딩과 동시에 안드로이드 앱으로 json 데이터 전달
    $json = json_encode(array("webnautes" => $data), JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
    echo $json;

} else {
    echo "SQL문 처리중 에러 발생 : ";
    echo mysqli_error($link);
}

mysqli_close($link);