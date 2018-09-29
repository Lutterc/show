<?php 

    //访问数据库

    //读取出数据
    include "tools/doSql.php";

    $data = doSelect("select *from categories");


    //转成json字符串返回
    echo json_encode($data);
?>