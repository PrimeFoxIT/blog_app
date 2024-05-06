<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Services\Interfaces\ITagService::class,
            \App\Services\TagService::class);

        $this->app->bind(
            \App\Repositories\ITagRepository::class,
            \App\Repositories\Eloquent\TagRepository::class);

        $this->app->bind(
            \App\Services\Interfaces\IPostCategoryService::class,
            \App\Services\PostCategoryService::class);

        $this->app->bind(
            \App\Repositories\IPostCategoryRepository::class,
            \App\Repositories\Eloquent\PostCategoryRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
