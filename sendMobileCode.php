<?php
session_start();
if(isset($_REQUEST['authcode'])){
    if(strtolower($_REQUEST['authcode']) == $_SESSION['authcode']){
        $_SESSION['phone'] = $_REQUEST['mobile'];
        $arr = array();
        while(count($arr)<6){
            $arr[]=rand(0,9);
            $arr=array_unique($arr);
        }
        $res = implode("",$arr);
        $_SESSION['phonecheak'] = $res;
        echo $res;
    }
}

?>