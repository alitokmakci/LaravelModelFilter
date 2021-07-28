<?php

namespace ModelFilter\Providers;

use Illuminate\Support\ServiceProvider;
use ModelFilter\Console\MakeFilter;
use ModelFilter\ModelFilter;

/**
 * @author Ali TOKMAKCI <alitokmakci@outlook.com>
 */

class ModelFilterServiceProvider extends ServiceProvider
{
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeFilter::class,
            ]);
        }
    }
}
