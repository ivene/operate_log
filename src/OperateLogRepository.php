<?php
/**
 * Created by PhpStorm.
 * User: yaoyao
 * Date: 2018/3/13
 * Time: 19:12
 */

namespace Ivene\OperateLog;

use Carbon\Carbon;
use Ivene\OperateLog\Http\Models\SysOperateLog;

class OperateLogRepository
{
    public function createActionLog($type,$action, $content)
    {
        $oplog = new  SysOperateLog();
        $oplog->action = $action;
        $oplog->description = $action;

        $oplog->action = $action;
        $oplog->action = $action;
        $oplog->action = $action;
         $oplog->save();

        return "";
    }
}