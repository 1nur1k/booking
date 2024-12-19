<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    //
    protected $table = 'rooms';

    public function hotels(): BelongsTo
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'room_id');
    }
}
