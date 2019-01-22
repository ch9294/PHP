<?php
/**
 * Created by PhpStorm.
 * User: ch929
 * Date: 2019-01-16
 * Time: 오후 5:56
 */

$host = "localhost";
$db = "Capstone";
$user = "root";
$password = "7269";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
}

$st = $conn->prepare('select * from Person');

$st->execute();

$st->setFetchMode(PDO::FETCH_ASSOC);

$data = array();


while ($row = $st->fetch()) {
    array_push($data,array(
       "id" => $row['id'],
       "name"=>$row['name'],
       "address" => $row['address']
    ));
}

$result = json_encode($data,JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
echo $result;


