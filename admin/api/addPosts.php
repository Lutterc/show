<?php 

    //获取参数
    $title =  $_POST['title'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $created = $_POST['created'];

    //开启session
    session_start();
    //获取到id
    $userID = $_SESSION['userInfo']['id'];
    
    
    //获取到图片的信息
    $feature = $_FILES['feature'];
    //取到图片名
    $name = $feature['name'];
    //取到临时目录
    $tmp = $feature['tmp_name'];
    //转码
    $gbkName = iconv('utf-8','gbk',$name);

    //移动到某个目录上，在PHP里面你不能用/做根目录
    //所以我们用../就可以了
    $path = "../../uploads/$gbkName";

    //把文件从临时目录中移动到新的目录
    move_uploaded_file($tmp,$path);

   
    //插入到数据库
    include "tools/doSql.php";
    //用utf-8的名字存
    $path = "/uploads/$name";
    $sql = "insert into posts(slug,title,feature,created,content,status,user_id,category_id)
            values ('$slug','$title','$path','$created','$content','$status','$userID','$category')";

    $rows = doZSG($sql);

    if($rows > 0){

        echo "ok";

    }else{

        echo "fail";
    }
    
?>