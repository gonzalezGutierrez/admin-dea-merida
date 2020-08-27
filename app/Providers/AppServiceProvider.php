<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
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
        View::composer('*',function($view){
            $newUsers = User::getUsers('inactivo')->whereDate('created_at', '=', Carbon::today()->toDateString())->get();
            $view -> with('newUsers',$newUsers);
        });
    }
}
