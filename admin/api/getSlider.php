<?php 

    //直接去数据库读取
    include "tools/doSql.php";

    $sql = "select value from options where id = 10";

    //取第0行数据
    $data = doSelect($sql)[0];

    //再把第0行数据的value字段的值取出来当响应体
    echo $data['value'];
?>