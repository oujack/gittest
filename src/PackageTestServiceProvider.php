<?php

namespace oyfirstlxcs\PackageTest;

use Illuminate\Support\ServiceProvider;

class PackageTestServiceProvider extends ServiceProvider
{

    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true; // 延迟加载服务
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadViewsFrom(__DIR__ . '/view', 'packageTest'); // 视图目录指定
        $this->publishes([
            __DIR__.'/view' => base_path('resources/views/vendor/packageTest'),  // 发布视图目录到resources 下
            __DIR__.'/config/config.php' => config_path('config.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('packageTest', function ($app) {
            return new packageTest($app['session'], $app['config']);
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['packageTest'];
    }

}

