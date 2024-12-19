<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    //
    protected $table = 'bookings';

    public function rooms(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
