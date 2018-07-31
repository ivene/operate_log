## 安装方法
```
composer require  ivene/operate-log
php artisan migrate
php artisan vendor:publish --provider="Ivene\OperateLog\OperateLogServiceProvider"
```
```
'providers' => [
    // ...
    Ivene\OperateLog\OperateLogServiceProvider::class,

]
 ```
 ```
 'aliases' => [
     // ...
     'Oplog' => \Ivene\OperateLog\Facade\OperateLogFacade::class
 ]
  ```
  
## 配置方法
``` 
<?php
return [
    'adminIdSessionKey' =>'Admin_Session_ID', //ADMIN 后台用户ID SessionKey
    'userIdSessionKey'=>'User_Session_ID',    //API 前端用户ID SessionKey
    'listenModel' => [   //需要自动记录的Model 配置后改Model的 create update delete 都会有日志记录
        '\App\Models\Base\BaseCecUser',
    ],
];
```

##使用方法
```
use Oplog
Oplog::apiLog('动作','描述','需要记录的数据');
Oplog::adminLog('动作','描述','需要记录的数据');
```