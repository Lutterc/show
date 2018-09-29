<?php 

    //拿到提交的数据
    $oldPass = $_POST['oldPass'];

    //开启session
    session_start();
    $pwd = $_SESSION['userInfo']['password'];

    //拿到用户输入的旧密码，跟修改之前的密码比对，如果旧密码核对失败，所以应该先判断再走下面代码
    if($oldPass != $pwd){

        echo 0; 
        return; //后面代码都不执行
    }

    //能来到这，就代表旧密码核对成功
    $newPass = $_POST['newPass'];
    //取到id
    $id = $_SESSION['userInfo']['id'];

    //修改数据库
    include "tools/doSql.php";

    $sql = "update users set password='$newPass' where id =$id";

    $rows = doZSG($sql);

    if($rows > 0){
        //修改成功，应该先把之前的session删掉（相当于要重新登录）
        unset($_SESSION['userInfo']);
        echo 1;
    }else{

        echo 2; 
    }
?>