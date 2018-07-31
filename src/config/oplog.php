<?php
return [
    //ADMIN 后台用户ID SessionKey
    'adminIdSessionKey' =>'Admin_Session_ID',
    //API 前端用户ID SessionKey
    'userIdSessionKey'=>'User_Session_ID',
    //需要自动记录的Model 配置后改Model的 create update delete 都会有日志记录
    'listenModel' => [
        '\App\Models\Base\BaseCecUser',
    ],
];