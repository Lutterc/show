<?php 

    //获取到id
    $id = $_GET['id'];

    include "tools/doSql.php";

    $sql = "select *from posts where id = $id";

    //是数组
    $data = doSelect($sql)[0];

    //转成json字符串
    echo json_encode($data);

?>