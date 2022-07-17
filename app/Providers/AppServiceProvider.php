<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('user', function(User $user){
           return $user->is_admin !== '0' && $user->is_admin !== '1';
        });

        Blade::directive('currency', function ( $expression ) { return "Rp<?php echo number_format($expression,0,',','.'); ?>"; });
    }
}
