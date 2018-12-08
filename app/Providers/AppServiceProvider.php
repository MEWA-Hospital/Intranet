<?php

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
