<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use View;
use App\Survey;
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
         view()->composer('layouts.backend', function($view)
        {
            $survey = Survey::where('user_id',Auth::user()->id)->count();
            $view->with('jumlah_survey', $survey);
        });
    }
}
