<?php 

   $icon =  $_FILES['image'];
   //拿到图片名
   $name = $icon['name'];
   //拿到临时目录
   $tmp = $icon['tmp_name'];

   //转码
   $gbkName = iconv('utf-8','gbk',$name);

   //移动
    $path = "../../uploads/$gbkName";
    move_uploaded_file($tmp,$path);
    
   //返回新路径
   echo "/uploads/$name";
?>