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
    public function createActionLog($type, $content)
    {
        $log = new  SysOperateLog();

        //请求操作类型
        $log->type = $type ? $type : '';
        //系统版本
        $log->system = clientService::getPlatForm(self::getHttpUserAgent(), true) ? clientService::getPlatForm(self::getHttpUserAgent(), true) : '';
        //请求的ip
        $log->ip = request()->getClientIp() ? request()->getClientIp() : '';

        $region = clientService::getRegionFromIp(request()->getClientIp());
        //国家
        $log->country = $region['country'] ? $region['country'] : '';
        //省份
        $log->province = $region['province'] ? $region['province'] : '';
        //城市
        $log->city = $region['city'] ? $region['city'] : '';
        //请求url
        $log->url = request()->getRequestUri() ? request()->getRequestUri() : '';
        //请求内容
        $log->content = $content ? $content : '';
        $res = $actionLog->save();

        return $res;
    }
}