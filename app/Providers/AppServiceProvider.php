<?php

namespace App\Providers;

use DateTime;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::if('admin',function() {
            return auth()->user()->user_type == User::ROLE_ADMIN;
        });

        Paginator::useBootstrapFive();

        View::composer('frontend.layoutes.header', function ($view) {
            $breaking_news = Post::select('id', 'title', 'slug', 'category_id')->with('category:id,name')->latest()->take(6)->get();

            $header_categories = Category::with([
                'posts' => function ($query) {
                    $query->select('id', 'title', 'thumbnail', 'slug','category_id')->latest()->take(4);
                }
            ])
                ->latest()
                ->take(5)
                ->get();

            $date = date_format(new DateTime(), 'D ,M d');

            $view->with('breaking_news', $breaking_news);

            $view->with('header_categories', $header_categories);

            $view->with('date', $date);
        });
    }
}
