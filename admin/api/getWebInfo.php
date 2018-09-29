<?php 

    include "tools/doSql.php";

    //得到文章总数
    $postsCount = count(doSelect("select *from posts"));

    //得到草稿总数
    $caoGaoShuLiang = count(doSelect("select *from posts where status='drafted'"));

    //得到分类数量
    $fenleiCount = count(doSelect("select *from categories"));

    //得到评论总数
    $commentsCount = count(doSelect("select *from comments"));

    //得到待审核的评论总数
    $heldCount = count(doSelect("select *from comments where status = 'held'"));

    $arr = array(

        "postsCount" => $postsCount,
        "draftedCount" => $caoGaoShuLiang,
        "categoryCount" => $fenleiCount,
        "commentsCount" => $commentsCount,
        "heldCount" => $heldCount
    );

    echo json_encode($arr);


?>