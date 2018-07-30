<?php
/**
 * Created by PhpStorm.
 * User: yaoyao
 * Date: 2018/7/30
 * Time: 14:02
 */
namespace Ivene\OperateLog\Http\Models;
use Illuminate\Database\Eloquent\Model;

class SysOperateLog extends Model
{
    protected $table = 'sys_operate_log';
    public $timestamps = true;
//    protected $fillable=[
//    'uname',
//    'loginname',
//    'iphone',
//    'email',
//    'img',
//    'ustatus',
//    'salt'
//    ];
//
//    protected $hidden=['password','salt','updated_at'];

}