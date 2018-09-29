<?php 

    $value = $_REQUEST['value'];


    //写入到数据库
    include "tools/doSql.php";

    $sql = "update options set value='$value' where id = 10";

    $rows = doZSG($sql);

    if($rows > 0 ){

        echo "ok";
    }else{

        echo "fail";
    }

?>