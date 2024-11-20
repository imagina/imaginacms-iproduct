<?php

namespace Modules\Iproduct\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Iproduct\Listeners\RegisterIproductSidebar;

class IproductServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIproductSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            // append translations
        });


    }

    public function boot()
    {
       
        $this->publishConfig('iproduct', 'config');
        $this->publishConfig('iproduct', 'crud-fields');

        $this->mergeConfigFrom($this->getModuleConfigFilePath('iproduct', 'settings'), "asgard.iproduct.settings");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('iproduct', 'settings-fields'), "asgard.iproduct.settings-fields");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('iproduct', 'permissions'), "asgard.iproduct.permissions");

        //$this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Iproduct\Repositories\ProductRepository',
            function () {
                $repository = new \Modules\Iproduct\Repositories\Eloquent\EloquentProductRepository(new \Modules\Iproduct\Entities\Product());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Iproduct\Repositories\Cache\CacheProductDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Iproduct\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\Iproduct\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\Iproduct\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Iproduct\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
// add bindings


    }


}
