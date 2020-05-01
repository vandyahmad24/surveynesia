<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        \Illuminate\Support\Facades\URL::forceScheme('https');
        view()->composer('layouts.backend', function($view)
        {
            $survey = Survey::where('user_id',Auth::user()->id)->count();
            $proses_survey = Survey::where([['surveyor_id',Auth::user()->id],['status','proses']])->count();
            $view->with('jumlah_survey', $survey);
        });

          view()->composer('layouts.backend', function($view)
        {
            $proses_survey = Survey::where([['surveyor_id',Auth::user()->id],['status','proses']])->count();
            $view->with('proses_survey', $proses_survey);
        });
        

    }
}
