<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'registration_date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tickets');
    }
}
