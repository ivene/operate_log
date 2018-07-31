<?php

namespace Ivene\OperateLog;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Oplog;
class OperateLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__."/../database/migrations");
        $this->publishes([
            __DIR__ . '/config/oplog.php' => config_path('oplog.php'),
        ], 'config');
        $model = config("oplog.listenModel");
        if ($model) {
            foreach ($model as $k => $v) {
                $v::updated(function ($data) use($v) {
                    Oplog::autoLog('updated',$v,$data);
                 });
                $v::created(function ($data) use($v) {
                    Oplog::autoLog('created',$v,$data);
                });
                $v::deleted(function ($data) use($v) {
                    Oplog::autoLog('deleted',$v,$data);
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
