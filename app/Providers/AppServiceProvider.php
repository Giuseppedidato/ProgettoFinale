<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(Schema::hasTable('categories')){
            View::share ('categories',Category::all());
        }

        if(Schema::hasTable('announcements')){
            View::share ('announcements',Announcement::all());
        }

        if(Schema::hasTable('users')){
            View::share ('users',User::all());
        }

        Paginator::useBootstrap();

    }


}
