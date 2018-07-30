<?php
/**
 * Created by PhpStorm.
 * User: yaoyao
 * Date: 2018/3/14
 * Time: 16:08
 */

namespace Ivene\OperateLog\Facade;


use Illuminate\Support\Facades\Facade;

class OperateLogFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'oplog';
    }
}