<?php 

    $ids = $_POST['ids'];

    include "tools/doSql.php";

    $rows = doZSG("delete from categories where id in ($ids)");

    if($rows > 0){

        echo "ok";
    }else{

        echo "fail";
    }
?>