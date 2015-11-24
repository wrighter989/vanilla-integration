<?php namespace Gzero\Vanilla;

use Illuminate\Support\ServiceProvider as SP;

/**
 * This file is part of the GZERO CMS package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class ServiceProvider
 *
 * @package    Gzero
 * @author     Adrian Skierniewski <adrian.skierniewski@gmail.com>
 * @copyright  Copyright (c) 2014, Adrian Skierniewski
 */
class ServiceProvider extends SP {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../../config/vanilla-integration.php';
        $this->mergeConfigFrom($configPath, 'vanilla-integration');
        $this->publishes(
            [
                $configPath => config_path('vanilla-integration.php'),
            ]
        );
        $this->registerHelpers();
        $this->registerRoutes();
    }

    /**
     * Add additional file to store routes
     *
     * @return void
     */
    protected function registerRoutes()
    {
        require __DIR__ . '/../../routes.php';
    }

    /**
     * Add additional file to store helpers
     *
     * @return void
     */
    protected function registerHelpers()
    {
        require __DIR__ . '/../../helpers.php';
    }

}
