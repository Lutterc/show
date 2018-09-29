<?php 

    //打开session
    session_start();

    //获取session里的值
    $user = $_SESSION['userInfo'];

    //输出成json格式的字符串
    echo json_encode($user);
?>