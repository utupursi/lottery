<?php

namespace App\Repositories\Prize;

use App\Interfaces\Prize\PrizeRepositoryInterface;
use App\Models\Prize;
use App\Models\PrizeCount;

class PrizeRepository implements PrizeRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Prize();
    }

    public function getPrizes()
    {
        return PrizeCount::with('prize')->get();
    }
}
