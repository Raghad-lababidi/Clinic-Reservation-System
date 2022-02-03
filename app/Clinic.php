<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function resrevations()
    {
        return $this->hasMany(Reservation::class);
    }
    
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

      public function reviews()
    {
        return $this->belongsToMany(User::class,'review','user_id','clinic_id')
        ->withTimestamps()
        ->withPivot(['date','comment'])
        ->using(Review::class);
    }
    public function favorites()
    {
        return $this->belongsToMany(User::class,'favorites','user_id','clinic_id')
        ->withTimestamps()
        ->using(Favorite::class);

    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

}
