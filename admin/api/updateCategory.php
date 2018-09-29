<?php 

    //获取数据
    $id = $_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];

    //导入文件
    include "tools/doSql.php";

    $sql = "update categories set name='$name',slug='$slug' where id='$id'";

    $rows = doZSG($sql);

    if($rows > 0){

        echo "ok";
    }else{

        echo "fail";
    }
?>