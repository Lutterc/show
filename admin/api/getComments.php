<?php

/*
  页容量 = 10
  总页数 = ceil (数据总数 / 页容量)

  第1页： 0,10(页容量)   0*页容量 = 0
  第2页: 10,10         10
  第3页：20,10      2

  左边部分： （页码 - 1） * 页容量  得到左边的起点， 右边就是页容量


  limit 参数1,参数2（页容量）

    参数1 ：  （页码-1） * 页容量
*/

    //去查询
    include "tools/doSql.php";


    //获取页容量
    $pageSize = $_GET['pageSize']; //10

    //获取要查询的页码
    $pageIndex = $_GET['pageIndex'];  //2 

    //获得limit第一个参数值
    $start = ($pageIndex - 1) * $pageSize;


    //获得数据总量
    $count = count(doSelect("select c.id,c.author,c.content,p.title,c.created,c.status from comments c inner join posts p on c.post_id = p.id where c.status != 'trashed'"));

    //要算出总页数
    $totalPage = ceil($count / $pageSize);



    $sql = "select c.id,c.author,c.content,p.title,c.created,c.status from comments c inner join posts p on c.post_id = p.id where c.status != 'trashed' limit $start,$pageSize";

    $data = doSelect($sql);


    $obj = array(
        "totalPage" => $totalPage,
        "data" => $data
    );

    //转成json字符串
    echo json_encode($obj);
?>