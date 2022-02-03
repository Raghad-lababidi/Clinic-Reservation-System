<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function periods()
    {
        return $this->hasMany(Period::class);
    }
}
