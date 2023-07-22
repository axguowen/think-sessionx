# think-sessionx

ThinkPHP 原生SESSION扩展

主要功能：

让ThinkPHP支持原生SESSION

## 安装

~~~php
composer require axguowen/think-sessionx
~~~

## 用法示例

本扩展不能单独使用，依赖ThinkPHP6.0+

安装完成后配置config目录下的session.php配置文件
将type设置为native后即可对原生SESSION进行操作

代码如下：

~~~php

use think\facade\Session;

// 获取全部session
$sessions = Session::all();

// 设置session
Session::set('mysession', 'myvalue');

// 获取指定session
echo Session::get('mysession');

// 清除session
Session::clear();

~~~

使用方法和ThinkPHP自带的SESSION无任何区别