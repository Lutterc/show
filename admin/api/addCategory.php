<?php

    /*
        $_GET拿不到formData提交来的数据，但绝对可以拿到表单提交来的get请求的数据

        或者也能拿到ajax中get请求不用formdata提交的数据
    */
    //获取参数
    $name = $_REQUEST['name'];
    $slug = $_REQUEST['slug'];

    //操作数据库
    include "tools/doSql.php";

    $sql = "insert into categories(name,slug) values('$name','$slug')";

    $rows = doZSG($sql);

    if($rows > 0){

        echo "ok";
    }else{

        echo "fail";
    }
?>