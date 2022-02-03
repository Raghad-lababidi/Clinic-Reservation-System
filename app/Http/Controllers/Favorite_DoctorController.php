<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite_Doctor;
use App\User;
use App\Clinic;
class Favorite_DoctorController extends Controller
{
    
     public function store(Request $request)
    {
        $user = User::find($request->user_id);
      
        $user->favorite_doctors()->attach($request->clinic_id);
    

          //  $response['data'] = $clinic;
            $response['message'] = "store success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
       
    }
    public function index()
    {
        $favorite_Doctors = Favorite_Doctor::all();

        $response['data'] = $favorite_Doctors;
        $response['message'] = "This is all favorite_Doctors";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }
}
