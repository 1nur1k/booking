<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    //
    protected $table = 'bookings';
    protected $fillable = [
        'room_id',
        'user_id',
        'start_date',
        'end_date',
        ];

    public function rooms(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
