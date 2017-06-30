<?php

$username = $_REQUEST['username'];

$res = 'true';

// 查数据库表

if($username == 'admin'){
    $res = 'false';
}

echo $res;
?>