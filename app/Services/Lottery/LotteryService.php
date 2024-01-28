<?php

namespace App\Services\Lottery;


use App\Interfaces\Lottery\LotteryServiceInterface;
use App\Interfaces\Prize\PrizeRepositoryInterface;
use App\Interfaces\Ticket\TicketRepositoryInterface;
use App\Interfaces\WinningHistory\WinningHistoryRepositoryInterface;
use Carbon\Carbon;

class LotteryService implements LotteryServiceInterface
{
    /**
     * @throws \Exception
     */
    public function spin()
    {
        /** @var TicketRepositoryInterface $lotteryRepository */
        $lotteryRepository = resolve(TicketRepositoryInterface::class);
        /** @var PrizeRepositoryInterface $prizeRepository */
        $prizeRepository = resolve(PrizeRepositoryInterface::class);
        /** @var WinningHistoryRepositoryInterface $winningRepository */
        $winningRepository = resolve(WinningHistoryRepositoryInterface::class);

        $ticket = $lotteryRepository->getRandomTicket();
        if (!$ticket) {
            throw new \Exception('Ticket not found');
        }
        $prizes = $prizeRepository->getPrizes();
        $users = $ticket->users;
        return $this->generateWinningHistory($users, $prizes, $ticket, $winningRepository);
    }

    protected function generateWinningHistory($users, $prizes, $ticket, $winningRepository)
    {
        $history = [];
        $sumPrize = 0;
        foreach ($users as $user) {
            $prize = $prizes->shuffle()->first();
            $history[] = [
                'prize_id' => $prize->prize_id,
                'user_id' => $user->id,
                'ticket_id' => $ticket->id,
                'created_at' => Carbon::now(),
                'updated_At' => Carbon::now()
            ];
            $sumPrize += $prize->prize->amount;
        }
        $latestHistory = $winningRepository->getLatestWinningHistory();
        $winningRepository->insert($history);
        $result = $winningRepository->getLastInsertedWinningHistories($latestHistory);
        return [
            'sum_prize' => $sumPrize,
            'total_count' => count($result),
            'data' => $result->toArray()
        ];
    }
}
