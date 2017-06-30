<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/26
 * Time: 10:36
 */


if(isset($_REQUEST['authcode'])){
    session_start();
    header("Content-Type: text/html;charset=utf-8");
    $flag = "";
    if(strtolower($_REQUEST['authcode']) == $_SESSION['authcode']){
        $flag = 'true';
    }else{
        $flag = 'false';
    }
    echo $flag;
    exit();
}

?>


