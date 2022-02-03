<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\User;
class ClinicDashController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
     public function all(){
        $clinics = Clinic::all();

        return view('admin.clinics.all',compact('clinics'));
    }
      public function count(){
        $clinics = Clinic::all();
        $users = User::all();

        return view('admin.counts.count',compact('clinics','users'));
    }
}
