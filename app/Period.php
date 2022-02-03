<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public function resrevations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
