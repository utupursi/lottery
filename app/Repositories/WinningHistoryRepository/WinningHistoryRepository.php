<?php

namespace App\Repositories\WinningHistoryRepository;

use App\Interfaces\WinningHistory\WinningHistoryRepositoryInterface;
use App\Models\Ticket;
use App\Models\WinningHistory;

class WinningHistoryRepository implements WinningHistoryRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new WinningHistory();
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function getLatestWinningHistory()
    {
        return $this->model->latest('id')->first();
    }

    public function getLastInsertedWinningHistories($latestHistory)
    {
        return $this->model::where('id', '>', $latestHistory ? $latestHistory->id : 0)
            ->with(['prize', 'ticket', 'user'])
            ->get();
    }
}
