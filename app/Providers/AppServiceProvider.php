<?php

namespace App\Providers;


use App\Services\Expense\ExpenseService;
use App\Services\Expense\ExpenseServiceInterface;
use App\Services\Wallet\WalletService;
use Illuminate\Support\ServiceProvider;
use App\Services\Wallet\WalletServiceInterface;
use App\Services\Revenue\RevenueService;
use App\Services\Revenue\RevenueServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WalletServiceInterface::class, WalletService::class);
        $this->app->bind(RevenueServiceInterface::class, RevenueService::class);
        $this->app->bind(ExpenseServiceInterface::class, ExpenseService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
