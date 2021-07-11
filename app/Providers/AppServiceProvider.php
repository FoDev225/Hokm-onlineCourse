<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Models\{School, Page};
use ConsoleTVs\Charts\Registrar as Charts;
use App\Charts\{ OrdersChart, UsersChart };
use DB;


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
    public function boot(Charts $charts)
    {
        DB::statement("SET lc_time_names = 'fr_FR'");

        Paginator::useBootstrap();

        View::share('pages', Page::all());

        View::composer('back.layout', function ($view) {
            $title = config('titles.' . Route::currentRouteName());
            $view->with(compact('title'));
        });

        $charts->register([
            OrdersChart::class,
            UsersChart::class
        ]);

        Schema::defaultStringLength(191);
    }
}
