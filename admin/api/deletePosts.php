<?php

    include "tools/doSql.php";

    //接收传递过来的ids
    $ids = $_GET['ids'];
    
    $rows = doZSG("update posts set status='trashed' where id in ($ids)");

    if($rows > 0)
        echo "ok";
    else 
        echo "nook";
?>