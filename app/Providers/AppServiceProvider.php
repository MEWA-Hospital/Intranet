<?php
/**
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function($view){

            $user = auth()->user();

            if ($user) {
                $media = $user->getFirstMediaUrl('profile-pictures') ?
                    $user->getFirstMediaUrl('profile-pictures') : $this->defaultProfilePicture();

                $media = asset($media);
                $view->with('media', $media);
                $view->with('authUser', $user);
            }
        });
    }

    public function defaultProfilePicture()
    {
        return 'global_assets/images/placeholders/placeholder.jpg';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
