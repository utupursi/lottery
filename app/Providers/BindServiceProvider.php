<?php

namespace App\Providers;

use App\Interfaces\Lottery\LotteryServiceInterface;
use App\Interfaces\Prize\PrizeRepositoryInterface;
use App\Interfaces\Ticket\TicketRepositoryInterface;
use App\Interfaces\WinningHistory\WinningHistoryRepositoryInterface;
use App\Repositories\Prize\PrizeRepository;
use App\Repositories\Ticket\TicketRepository;
use App\Repositories\WinningHistoryRepository\WinningHistoryRepository;
use App\Services\Lottery\LotteryService;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindServices();
        $this->bindRepositories();
    }

    protected function bindRepositories()
    {
        $this->app->bind(PrizeRepositoryInterface::class, PrizeRepository::class);
        $this->app->bind(TicketRepositoryInterface::class, TicketRepository::class);
        $this->app->bind(WinningHistoryRepositoryInterface::class, WinningHistoryRepository::class);
    }

    protected function bindServices()
    {
        $this->app->bind(LotteryServiceInterface::class, LotteryService::class);

    }

}
