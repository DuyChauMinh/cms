<?php

$db = [
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => '',
    'db_name' => 'cms',
];

//*vong lap foreach de doi key cua array tren thanh constant
foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

// $conn = mysqli_connect(db_host, db_user, db_pass, db_name);
// * đoạn code trên bị lỗi vì sử dụng key của array mà khong đổi qua constant
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn) {
    echo 'connected';
}
?>
