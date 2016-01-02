## 一些细节点：
* 使用了Laravel内置的Requests,对请求进行预先的验证；
* 将laravel中使用ORM Eloquent 数据库操作较多的地方，单独转移到Repositories文件夹中，有助于数据库操作和控制器逻辑的分离；
* 使用laravelcollective/html 包处理表单，以及做好数据绑定；
* 使用laravel内置权限功能进行了角色区分，并显示不同内容；
* 使用vuejs的双向数据绑定进行一些前端基础验证；
* 使用更为亲和的消息提示框作为消息反馈；

## 具体实现了如下功能：
* 员工的登录、管理、权限；
* 用户信息的录入、更改、删除、添加；


## 一些截图

![](https://github.com/dingyiming/xc-20151103-addinfo/blob/amazeui/docs/amazeui%E6%88%90%E5%8A%9F%E5%9B%BE/localhost_8000.png?raw=true)

![](https://github.com/dingyiming/xc-20151103-addinfo/blob/amazeui/docs/amazeui%E6%88%90%E5%8A%9F%E5%9B%BE/localhost_8000_do.png?raw=true)

![](https://github.com/dingyiming/xc-20151103-addinfo/blob/amazeui/docs/amazeui%E6%88%90%E5%8A%9F%E5%9B%BE/localhost_8000_userinfo.png?raw=true)

![](https://github.com/dingyiming/xc-20151103-addinfo/blob/amazeui/docs/amazeui%E6%88%90%E5%8A%9F%E5%9B%BE/localhost_8000_userinfo_46_.png?raw=true)