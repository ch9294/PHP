<?php
/**
 * Created by PhpStorm.
 * User: ch929
 * Date: 2019-01-16
 * Time: 오후 4:38
 */

$i = 0;
$json = array();
for ($i = 1; $i < 6; $i++) {

    array_push($json,
        array(
            "data1" => "문자열${i}",
            "data2" => 100 * $i,
            "data3" => 11.11 * $i
        ));

}

$result = json_encode(array("json_data" => $json), JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
echo $result;


