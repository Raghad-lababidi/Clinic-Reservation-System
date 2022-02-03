<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function resrevations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
