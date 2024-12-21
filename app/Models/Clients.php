<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'passport_number',
        'passport_series',
        'phone_number',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
