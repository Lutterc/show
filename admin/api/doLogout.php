<?php 

    session_start();

    //删除session
    unset($_SESSION['userInfo']);


    echo "ok";

    header('location:/admin/login.html');
?>