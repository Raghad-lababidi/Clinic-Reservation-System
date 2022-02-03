<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

}
