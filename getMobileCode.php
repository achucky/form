<?php
session_start();

if(isset($_REQUEST['phonecheak']) && isset($_REQUEST['mobile'])){
    header("Content-Type: text/html;charset=utf-8");
    $flag = "false";
    if($_REQUEST['phonecheak'] == $_SESSION['phonecheak']){
        $flag = 'true';
    }
    echo $flag;
    exit();
}

?>