<?php namespace Gzero\Vanilla;

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
        $this->registerHelpers();
        $this->registerFilters();
        $this->bindRepositories();
        $this->bindTypes();
        $this->bindOtherStuff();
        $this->bindCommands();
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
