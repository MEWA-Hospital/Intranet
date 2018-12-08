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
        $this->app->bind(\App\Interfaces\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\GroupRepository::class, \App\Repositories\GroupRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\NewsRepository::class, \App\Repositories\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\CommentRepository::class, \App\Repositories\CommentRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EmployeeRepository::class, \App\Repositories\EmployeeRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EmployeeTelephoneRepository::class, \App\Repositories\EmployeeTelephoneRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EmployeeEmailRepository::class, \App\Repositories\EmployeeEmailRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\BankRepository::class, \App\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\BiometricInOutDetailsRepository::class, \App\Repositories\BiometricInOutDetailsRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\BiometricShiftRepository::class, \App\Repositories\BiometricShiftRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EventsRepository::class, \App\Repositories\EventsRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EmployeeTypeRepository::class, \App\Repositories\EmployeeTypeRepositoryEloquent::class);
        //:end-bindings:
    }
}
