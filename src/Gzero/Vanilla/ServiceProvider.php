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
        $this->mergeConfigFrom($this->getConfigPath(), 'vanilla-integration');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
                $this->getConfigPath() => config_path('vanilla-integration.php'),
            ],
            'config'
        );
        $this->loadRoutesFrom(__DIR__ . '/../../../routes/routes.php');
        $this->registerHelpers();
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

    /**
     * It returns config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return $configPath = __DIR__ . '/../../../config/vanilla-integration.php';
    }

}
