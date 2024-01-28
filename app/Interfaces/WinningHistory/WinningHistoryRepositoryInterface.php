<?php

namespace App\Interfaces\WinningHistory;

use App\Models\WinningHistory;

interface WinningHistoryRepositoryInterface
{
    public function insert(array $data);

    public function getLatestWinningHistory();

    public function getLastInsertedWinningHistories(WinningHistory $latestHistory);
}
