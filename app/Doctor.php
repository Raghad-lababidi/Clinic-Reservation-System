<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function clinic()
    {
        return $this->hasOne(Clinic::class);
    }
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
