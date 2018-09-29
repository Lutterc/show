<?php 
//这个是判断登录状态的php文件;
    //读取session
    session_start();

    //后端发现登录的时候应该把用户的信息存到session里
    //然后如果session有数据就代表登录成功
    if(isset($_SESSION['userInfo'])){

        echo "loginOK";
    }else{

        echo "fail";
    }

?>