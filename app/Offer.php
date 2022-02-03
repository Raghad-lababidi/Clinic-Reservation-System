<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function resrevations()
    {
        return $this->hasMany(Reservation::class);
    }
}
