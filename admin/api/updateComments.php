<?php

    //拿到传过来的id 要么传5  要么传5,6,8,11
    $ids = $_REQUEST['ids'];

    //拿到传过来要修改的状态
    $status = $_REQUEST['status'];


    //去操作数据库了
    include "tools/doSql.php";

    //执行
    $rows = doZSG("update comments set status='$status' where id in($ids)");

    if($rows > 0){

        echo "ok";
        
    }else{

        echo "nook";
    }

?>