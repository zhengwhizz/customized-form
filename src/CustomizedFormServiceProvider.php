<?php

namespace Zhengwhizz\CustomizedForm;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedForm as FormContract;
use Zhengwhizz\CustomizedForm\Contracts\CustomizedFormTemplate as TemplateContract;

class CustomizedFormServiceProvider extends ServiceProvider
{
    public function boot(CustomizedFormRegistrar $loader, Filesystem $filesystem)
    {
        $this->publishes([
            __DIR__ . '/../config/customized_form.php' => config_path('customized_form.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_customized_form_tables.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');

        // require __DIR__ . '/../routes/api.php';
        // 注册路由
        $this->registerRoutes();

        $this->registerModelBindings();

        $this->app->singleton(CustomizedFormRegistrar::class, function ($app) use ($loader) {
            return $loader;
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/customized_form.php',
            'customized_form'
        );
    }
    protected function registerRoutes()
    {
        \Route::group([
            'prefix' => 'api/customized_form',
            // 'namespace' => 'Zhengwhizz\CustomizedForm\Controllers',
            // 'middleware' => "auth:api",
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        });
    }
    protected function registerModelBindings()
    {
        $config = $this->app->config['customized_form.models'];

        $this->app->bind(TemplateContract::class, $config['template']);
        $this->app->bind(FormContract::class, $config['form']);
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path . '*_create_customized_form_tables.php');
            })->push($this->app->databasePath() . "/migrations/{$timestamp}_create_customized_form_tables.php")
            ->first();
    }
    protected function isLumen()
    {
        return strpos($this->app->version(), 'Lumen') !== false;
    }
}
