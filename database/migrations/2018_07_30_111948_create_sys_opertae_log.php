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
            $table->string('action',100)->comment('行为动作');
            $table->string('type')->comment('日志分类 admin  api  wen');
            $table->string('description');
            $table->integer('op_uid')->default('0')->comment('操作人编号');
            $table->string('client_ip')->default('')->comment('请求IP');
            $table->string('client_type')->default('')->comment('客户端类型 ');
            $table->string('client_version')->default('')->comment('客户端版本');
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
