<?php 

    //1. 获取提交的参数
    $email = $_POST['email'];
    $pass = $_POST['password'];


    //2. 去数据库查有没有这个记录，有的话代表登录成功
    //打开数据库
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');

    //操作数据库
    $sql = "select *from users where email='$email' and password ='$pass'";
    $result = mysqli_query($link,$sql);
    //转换成数组
    $data = mysqli_fetch_all($result,1);

    //关闭数据库
    mysqli_close($link);

    if(count($data) > 0){

        session_start();
        //把用户信息存入session 方便后面拿出来直接用
        $_SESSION['userInfo'] = $data[0];

        echo '{"msg":"登录成功","status":"ok"}';
        
    }else{

        echo '{"msg":"登录失败","status":"fail"}';
    }
?>