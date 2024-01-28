<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrizeCount extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prize_id',
        'count',
    ];

    public function prize(): BelongsTo
    {
        return $this->belongsTo(Prize::class, 'prize_id', 'id');
    }
}
