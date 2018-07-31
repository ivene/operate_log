<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysOpertaeLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_operate_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action',100)->default('unknow')->comment('行为动作');
            $table->string('type')->default('unknow')->comment('日志分类 admin  api  web');
            $table->string('description')->default('');
            $table->text('op_data')->default('');
            $table->string('op_uid')->default('0')->comment('操作人编号');
            $table->string('client_ip')->default('unknow')->comment('请求IP');
            $table->string('client_type')->default('unknow')->comment('客户端类型 ');
            $table->string('client_version')->default('unknow')->comment('客户端版本');
            $table->string('request_url')->default('unknow')->coment('请求url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_operate_log');
    }
}
