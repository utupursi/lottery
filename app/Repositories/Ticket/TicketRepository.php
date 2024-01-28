<?php

namespace App\Repositories\Ticket;

use App\Interfaces\Lottery\LotteryRepositoryInterface;
use App\Interfaces\Ticket\TicketRepositoryInterface;
use App\Models\Ticket;
use Carbon\Carbon;

class TicketRepository implements TicketRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Ticket();
    }

    public function getRandomTicket()
    {
        return $this->model
            ->whereDate('registration_date', '=', Carbon::now()->format('Y-m-d'))
            ->inRandomOrder()
            ->first();
    }
}
