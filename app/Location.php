<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
