<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Clinic;

class ReviewController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
        $user->clinics()->attach($request->clinic_id);
    }

}
