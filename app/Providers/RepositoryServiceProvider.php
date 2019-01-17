<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

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
        $this->app->bind(\App\Interfaces\DepartmentRepository::class, \App\Repositories\DepartmentRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\GroupRepository::class, \App\Repositories\GroupRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\NewsRepository::class, \App\Repositories\NewsRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\CommentRepository::class, \App\Repositories\CommentRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EmployeeRepository::class, \App\Repositories\EmployeeRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EmployeeTelephoneRepository::class, \App\Repositories\EmployeeTelephoneRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EmployeeEmailRepository::class, \App\Repositories\EmployeeEmailRepositoryEloquent::class);
       $this->app->bind(\App\Interfaces\BiometricInOutDetailsRepository::class, \App\Repositories\BiometricInOutDetailsRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\BiometricShiftRepository::class, \App\Repositories\BiometricShiftRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EventsRepository::class, \App\Repositories\EventsRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EmployeeTypeRepository::class, \App\Repositories\EmployeeTypeRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\MemoRepository::class, \App\Repositories\MemoRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\ExtensionRepository::class, \App\Repositories\ExtensionRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\BankRepository::class, \App\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\BankBranchRepository::class, \App\Repositories\BankBranchRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\PayrollRepository::class, \App\Repositories\PayrollRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\DeductionRepository::class, \App\Repositories\DeductionRepositoryEloquent::class);
        $this->app->bind(\App\Interfaces\EmployeesDeductionRepository::class, \App\Repositories\EmployeesDeductionRepositoryEloquent::class);
        //:end-bindings:
    }
}
