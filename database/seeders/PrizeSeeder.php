<?php

namespace Database\Seeders;

use App\Models\Prize;
use App\Models\PrizeCount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PrizeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $prizes = [
            [
                'id' => 1,
                'count' => 1,
                'amount' => 20000,

            ],
            [
                'id' => 2,
                'count' => 3,
                'amount' => 5000,
            ],
            [
                'id' => 3,
                'count' => 5,
                'amount' => 1000,
            ],
            [
                'id' => 4,
                'count' => 20,
                'amount' => 500,
            ]
        ];

        foreach ($prizes as $prize) {
            $createdPrize = Prize::create([
                'id' => Arr::get($prize, 'id'),
                'amount' => Arr::get($prize, 'amount')
            ]);

            for ($i = 0; $i < Arr::get($prize, 'count'); $i++) {
                PrizeCount::create([
                    'prize_id' => $createdPrize->id,
                    'count' => 1
                ]);
            }
        }
    }
}
