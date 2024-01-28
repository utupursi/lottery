<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use App\Models\User;
use App\Models\UserTicket;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class GenerateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generate-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usersCount = 1000000;
        $limit = 1000;
        $faker = Factory::create();
        $arr = [];
        $userTicket = [];
        $ticketArr = [];

        for ($i = 0; $i < 10000; $i++) {
            $ticketArr[] = [
                'number' => $faker->unique()->numberBetween('1000000', '9999999'),
                'registration_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        Ticket::insert($ticketArr);

        while ($usersCount > 0) {
            $limit = min($usersCount, $limit);

            for ($i = 0; $i < $limit; $i++) {
                $arr[] = [
                    'name' => $faker->name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }

            $latestUser = User::latest('id')->first();
            User::insert($arr);
            $users = User::where('id', '>', $latestUser ? $latestUser->id : 0)->get();

            foreach ($users as $user) {
                $random = rand(1, 10000);
                $userTicket[] = [
                    'user_id' => $user->id,
                    'ticket_id' => $random
                ];
            }
            UserTicket::insert($userTicket);
            $arr = [];
            $userTicket = [];
            $usersCount -= $limit;
        }
    }
}
