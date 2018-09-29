<?php 

    //获取数据
    $slug = $_POST['slug'];
    $nickname = $_POST['nickname'];
    $bio = $_POST['bio'];
    //开启session
    session_start();
    $id = $_SESSION['userInfo']['id'];
    
    //获取文件信息
    $avatar = $_FILES['avatar'];
    $name = $avatar['name'];
    $tmp = $avatar['tmp_name'];

    
    //转成gbk
    $gbkName = iconv('utf-8','gbk',$name);
    //准备路径
    $path = "../../uploads/$gbkName";

    move_uploaded_file($tmp,$path);


   
    //声明一个全局的sql变量
    $sql = "";

    //导入工具文件
    include "tools/doSql.php";

    //判断文件名是否为空，如果为空，代表头像没有改过
    //所以不要修改数据库里的头像字段
    if($name == ""){

        $sql = "update users set slug='$slug',nickname='$nickname',bio='$bio' where id='$id'";

    }else{
        
        //否则要修改
        $path = "/uploads/$name";
        //如果文件不为空，那么修改session里保存的头像的路径
        $_SESSION['userInfo']['avatar'] = $path;

        $sql = "update users set avatar='$path',slug='$slug',nickname='$nickname',bio='$bio' where id='$id'";
    }

    $rows = doZSG($sql);

    if($rows > 0){
        //更新session
        $_SESSION['userInfo']['nickname'] = $nickname;
        $_SESSION['userInfo']['bio'] = $bio;
        $_SESSION['userInfo']['slug'] = $slug;

        echo "ok";
    }else{

        echo "fail";
    }

?>