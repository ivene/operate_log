<?php

namespace Ivene\OperateLog;

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
                $v::updated(function ($data) {
                    ActionLog::createActionLog('update', "更新的id:" . $data->id);
                });
                $v::created(function ($data) {
                    ActionLog::createActionLog('add', "新建的id:" . $data->id);
                });
                $v::deleted(function ($data) {
                    ActionLog::createActionLog('delete', "删除的id:" . $data->id);
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
