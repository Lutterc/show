<?php 

    //注意：文章列表，需要显示用户的名字和分类的名字，但是单独一张posts表不够，所以要联合3张表查询


    //获得页码
   $pageIndex =  $_GET['pageIndex'];
    //获得页容量
   $pageSize =  $_GET['pageSize'];
   // 获得分类id
   $cate_id = $_GET['cate_id'];

   // 获得文章状态
   $status = $_GET['status'];


   include "tools/doSql.php";

   //要获得一下总数据
   $sql1 = "select 
            p.id,p.title,u.nickname,c.name,p.created,p.status 
            from posts p 
            inner join users u
            on p.user_id = u.id
            inner join categories c
            on p.category_id = c.id
            where p.status !='trashed'
            ";

    if($cate_id != ""){

        //记得加空格
        $sql1 = $sql1 . " and c.id='$cate_id'";
    }

    if($status != ""){

        $sql1 = $sql1 . " and p.status='$status'";
    }


   $count = count(doSelect($sql1));

   //总页数： ceil (总数据 / 页容量)
   $totalPage = ceil ( $count / $pageSize );


   //得到这一页的数据
   //limit 起点= （页码-1）*页容量

   $start = ($pageIndex - 1) * $pageSize;

   //查询数据的sql语句
   $sql2 = "select 
            p.id,p.title,u.nickname,c.name,p.created,p.status 
            from posts p 
            inner join users u
            on p.user_id = u.id
            inner join categories c
            on p.category_id = c.id
            where p.status !='trashed'";

    if( $cate_id != "" ){

        $sql2 .= " and c.id='$cate_id'";
    }

    if( $status != "" ){

        $sql2 .= " and p.status = '$status'";
    }


    $sql2 = $sql2 . " limit $start,$pageSize";


    $data = doSelect($sql2);

    //放到一起
    $arr = array(
        "totalPage" => $totalPage,
        "data" => $data
    );

    echo json_encode($arr);
?>