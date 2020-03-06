<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use View;
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
        $auth = Auth::user();
        if($auth!=null){
           $profil= DB::table('profil_user')->where('id',$auth->id)->frist();
            View::share('profil', $profil);
        }
    }
}
