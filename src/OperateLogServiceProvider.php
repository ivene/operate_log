<?php

namespace Ivene\OperateLog;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class OperateLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/migrations' => database_path('migrations'),
        ], 'migrations');
//        $this->loadMigrationsFrom(__DIR__."/../database/migrations");

        $this->publishes([
            __DIR__ . '/config/oplog.php' => config_path('oplog.php'),
        ], 'config');

        $model = config("oplog");
        if ($model) {
            foreach ($model as $k => $v) {
                $v::updated(function ($data) use($v) {
                    Log::error($v." 更新了一条记录");
                 });
                $v::created(function ($data) use($v) {
                    Log::error($v." 创建了一条记录");
                });
                $v::deleted(function ($data) use($v) {
                    Log::error($v." 删除了一条记录");
                });
            }
        }
    }



    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('oplog',function(){
            return new OperateLogRepository();
        });
    }
}
