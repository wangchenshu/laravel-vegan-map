<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "vegan_map";
$type = '炸物';
$regional = '外島';
$csv_dir = '../csv/restaurant/fried';
$src_file = $regional . '1.csv';
$file = $csv_dir . '/' . $src_file;

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

$fp = fopen($file, "r");

while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
    if ($data[0] == '名稱') {
        continue;
    }

    $name = $data[0];
    $address = $data[1];
    $phone = $data[2];
    $business_hour = $data[3];
    $comment = $data[4];

    $sql = "INSERT INTO restaurant (name, type, address, phone, regional, business_hour, comment) ";
    $sql .= " VALUES ('" . $name . "', '" . $type . "', '" . $address . "', '" . $phone . "',  '" . $regional . "', '" . $business_hour . "', '" . $comment . "')";

    if ($conn->query($sql) === TRUE) {
        echo "新增成功" . PHP_EOL;
    } else {
        echo "Error: " . $sql . PHP_EOL . $conn->error;
    }
}

fclose($fp);
$conn->close();
