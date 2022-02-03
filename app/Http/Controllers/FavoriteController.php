<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Favorite;
use App\User;
use App\Clinic;
use App\Http\Resources\ClinicResource;

class FavoriteController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = User::find($request->user_id);
      
        $user->favorites()->attach($request->clinic_id);
    

          //  $response['data'] = $clinic;
            $response['message'] = "store success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
       
    }
    public function remove(Request $request)
    {
        $user = User::find($request->user_id);
      
        $user->favorites()->detach($request->clinic_id);
    

          //  $response['data'] = $clinic;
            $response['message'] = "remove success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
       
    }
    public function favorite_doctor($user_id)
    {

        $user = User::find($user_id);
      
       $clinics= $user->favorites->find($user_id,'user_id');
       
        $response['data'] = ClinicResource::make($clinics);
        $response['message'] = "This is all favorite_Doctors";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }
}
