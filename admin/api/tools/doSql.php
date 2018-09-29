<?php 

function doSelect($sql){

    //打开数据库
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');

    //操作数据库
    $result = mysqli_query($link,$sql);
    //转换成数组
    $data = mysqli_fetch_all($result,1);

    //关闭数据库
    mysqli_close($link);

    //返回查到的数组
    return $data;

}


function doZSG($sql){
    
    //打开数据库
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');
    
    //操作数据库
    mysqli_query($link,$sql);

    //拿到受影响的行数
    $rows = mysqli_affected_rows($link);

    mysqli_close($link);

    return $rows;
}