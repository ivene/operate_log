<?php
/**
 * Created by PhpStorm.
 * User: yaoyao
 * Date: 2018/3/13
 * Time: 19:12
 */

namespace Ivene\OperateLog;

use Illuminate\Support\Facades\Session;
use Ivene\OperateLog\Http\Models\SysOperateLog;

class OperateLogRepository
{
    private function createActionLog($uid,$action,$description,$data,$type)
    {
        $oplog = new  SysOperateLog();
        $oplog->op_uid =$uid;
        $oplog->action = $action;
        $oplog->description = $description;
        $oplog->type = $type;
        $oplog->op_data  = empty($data)? '' : json_encode($data);
        $oplog->client_ip =  request()->getClientIp() ? request()->getClientIp() : 'unknow';
        $oplog->request_url  = request()->getRequestUri() ? request()->getRequestUri() : 'unknow';
        $oplog->client_version  = request()->get('version') ? request()->get('version') :'unknow';
        $oplog->save();
        return "";
    }

    public function apiLog($action,$description,$data){
        $uid = request()->get('uid',0);
        if($uid==0){
            $uid= Session::get(config('oplog.userIdSessionKey'),0);
        }
       $this->createActionLog($uid,$action,$description,$data,'api');
    }
    public function adminLog($action,$description,$data){
        $uid = request()->get('uid',0);
        if($uid==0){
            $uid= Session::get(config('oplog.adminIdSessionKey'),0);
        }
        $this->createActionLog($uid,$action,$description,$data,'admin');
    }
    public function autoLog($action,$description,$data){
        $uuid= Session::get(config('oplog.adminIdSessionKey'),0);
        $auid= Session::get(config('oplog.userIdSessionKey'),0);
        $this->createActionLog($uuid."|".$auid,$action,$description,$data,'auto');
    }

}