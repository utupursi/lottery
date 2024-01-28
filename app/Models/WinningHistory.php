<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WinningHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prize_id',
        'user_id',
        'ticket_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
