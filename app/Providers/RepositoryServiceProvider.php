<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Interfaces\BranchRepository::class, \App\Repositories\BranchRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\DepartmentRepository::class, \App\Repositories\DepartmentRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\MembershipRepository::class, \App\Repositories\MembershipRepositoryEloquent::class);
        //:end-bindings:
    }
}
