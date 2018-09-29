## 登录的接口

url:api/doLogin.php
type:post
data:
    email: 输入的邮箱
    password:输入的密码

响应体：
    json格式
    成功：{"msg":"登录成功","status":"ok"}

    失败：{"msg":"登录失败","status":"fail"}


## 判断是否登录的接口

url:api/checkLogin.php
type:get
data:不需要参数
响应体：
    string格式
            如果有登录  "loginOK"
            如果没有登录 "fail"


## 获得登录用户信息的接口

url:api/getUserInfo.php
type:get
data:不需要参数
响应体：
    json格式
        {"name":"jack","id":2.....}


## 退出登录的接口
url:api/doLogout.php
type:get
data:不需要参数
响应体：
    string格式
       ok,fail


## 获得网站信息的接口

url:api/getWebInfo.php
type:get
data:不需要参数
响应体：
    json格式
        {"postsCount":20 , "draftedCount":1 ,"categoryCount":6,"commentsCount":5,"heldCount":1}


## 获得所有的评论接口

url:api/getComments.php
type:get
data：
    pageSize:  页容量    10
    pageIndex：页码    2

响应体：
{
    
totalPage:总页数
data:[
        {每条评论对象},
        {每条评论对象}
    ]
}


## 更新评论状态的接口
url: api/updateComments.php
type:get,post
data:
    ids: 传入要修改的id数组，可以是一个，也可以是多个
    status：要修改的状态

响应体：
    ok，nook


## 获取文章的接口
url:api/getPosts.php
type:get
data:
    pageIndex:页码
    pageSize:页容量
    cate_id: 分类id
    status: 状态

后面两个参数主要是为了做筛选

响应体：
    应该是一个json对象
    {
        totalPage:总页数
        data：所有的查出来的分页数据
    }

## 获取所有分类的接口
url:api/getCategory.php
type:get

响应体：
    应该是一个json数组
    [
      { id:1,slug:living,name:"会生活" },
      { id:1,slug:living,name:"会生活" },
      { id:1,slug:living,name:"会生活" }
    ]


## 删除文章的接口
url:api/deletePosts.php
data:ids：传入要删除的id列表（可以是一个也可以是多个）
响应体：
        ok，nook



## 新增文章的接口
url: api/addPosts.php
type:post
data:
    title: 标题
    content: 文章内容
    feature: 图片
    slug:   别名
    category: 分类id
    status: 状态
    created: 创建时间

响应体：
    要么OK，要么Nook


## 查询某篇文章的接口（根据id查）
url: api/getPostsDetail.php
type:get
data:id：传入文章的id
响应体：
    json对象
    {title: slug: content: feature:}


## 修改某篇文章的接口
url : api/updatePosts.php
type: post
data:
    id: 要修改文章的id
    title: 标题
    content: 文章内容
    feature: 图片
    slug:   别名
    category: 分类id
    status: 状态
    created: 创建时间
响应体：
        ok  或者 fail


## 添加分类的接口
url:"api/addCategory.php",
type:post
data: name:分类名   slug：别名
响应体：
    ok 或者 fail


## 删除分类的接口
url:"api/delCategory.php"
type:post
data:ids:id列表
响应体：
    OK 或 fail


## 修改分类的接口
url:"api/updateCategory.php",
type:"post",
data:
    id:   要修改的id
    name: 修改的名字
    slug: 修改的别名
响应体：
        ok 或 fail


## 修改个人信息的接口
url:"api/updateUserInfo.php",
type:"post",
data:
    avatar
    slug
    nickname
    bio
响应体
    ok fail


## 修改密码的接口
url:"api/changePassword.php",
type:post
data:
    oldPass
    newPass

响应体
   0  对应  "旧密码核对失败",
   1  对应  "修改成功",
   2  对应  "修改失败"（因为万一数据库卦了，你代码是执行了，但是不能写入数据库）



## 获得轮播图数据的接口
url:"api/getSlider.php"
type:get
响应体：
        json数组


## 修改轮播图的接口 ：既可以做添加，也可以做删除
url:"api/updateSlider.php",
data:
    value: 直接传入所有轮播图的json字符串

响应体：
    ok or fail


## 异步上传图片的接口
url:"api/uploadPic.php",
data:
    用formData 上传的文件

响应体:
    图片上传后的路径