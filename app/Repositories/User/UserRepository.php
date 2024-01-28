<?php

namespace App\Repositories\User;

use App\Interfaces\Lottery\LotteryRepositoryInterface;
use App\Interfaces\Ticket\TicketRepositoryInterface;
use App\Models\Ticket;
use App\Models\User;

class UserRepository implements TicketRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function getUsersByTicketNumnber()
    {
        return $this->model->inRandomOrder()->first();
    }
}
