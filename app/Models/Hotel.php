<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    //
    protected $table = 'hotels';

    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
