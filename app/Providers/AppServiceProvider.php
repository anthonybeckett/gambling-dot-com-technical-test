<?php

namespace App\Providers;

use Domain\Affiliate\Contracts\AffiliateRepositoryContract;
use Domain\Affiliate\Repositories\AffiliateRepository;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AffiliateRepositoryContract::class, AffiliateRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
