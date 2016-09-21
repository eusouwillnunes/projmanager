<?php

namespace ProjManager\Providers;

use Illuminate\Support\ServiceProvider;

class ProjManagerRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\ProjManager\Repositories\ClientRepository::class, \ProjManager\Repositories\ClientRepositoryEloquent::class);
        $this->app->bind(\ProjManager\Repositories\ProjectRepository::class, \ProjManager\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\ProjManager\Repositories\ProjectNoteRepository::class, \ProjManager\Repositories\ProjectNoteRepositoryEloquent::class);
    }
}
