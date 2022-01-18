PHP在线客服聊天系统
===============
##### 最近在看workerman，因此采用GatewayWorker写了一个简易的在线客户聊天系统。仅供学习，写的不好，欢迎指点。参考采用tp5+mysql+php7.4+GatewayWorker+websocket

### 功能点

+ 消息列表
+ 未读消息数
+ 最后一条未读消息实时列表展示
+ 最后一条未读消息时间展示等
+ 一对一单聊
+ 头像、用户名展示
+ 文字聊天
+ 图片聊天
+ 表情
+ 聊天内容持久化
+ 是否在线展示
+ 聊天过程中是否在线惰性加载
+ 聊天内容持久化
+ 历史聊天记录 等

> 采用docker搭建开发环境。
> docker环境搭建，可网上自行搜索。或者参考我的个人博客 [docker-lnmp](http://blog.caixiaoxin.cn/?p=94)



### step
1. 配置域名

2. 新建chat数据库，导入chat.sql

3. 启动 websocket服务 
```
-> php start.php start
```
4. 新建两个浏览器窗口，模拟两人聊天
![](http://blog.caixiaoxin.cn/wp-content/uploads/2022/01/chat-1024x790.jpg)

5. 85号客服的聊天列表

![](http://blog.caixiaoxin.cn/wp-content/uploads/2022/01/chat-lists.jpg)

