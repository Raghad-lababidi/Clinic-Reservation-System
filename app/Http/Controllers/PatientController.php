<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
class PatientController extends Controller
{

	  public function index()
    {
        $patients = Patient::all();

        $response['data'] = $patients;
        $response['message'] = "This is all patients";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }
     public function store(Request $request)
    {
       $patient =new Patient;
           $patient->name = $request->name;
           $patient->email = $request->email;
           $patient->age = $request->age;
           $patient->gender = $request->gender;
           $patient->phone = $request->phone;
           $patient->user_id = $request->user_id;
           $patient->location_id = $request->location_id;
           $patient->save();

            $response['data'] = $patient;
            $response['message'] = "store success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
    
    }
      public function show_patient_by_user_id($user_id)
    {
        $patient = Patient::all()->where('user_id','=', $user_id );
        if (isset($patient)) {
        $response['data'] = $patient->values();
        $response['message'] = "success";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
        }
        $response['data'] =$patient->values();
        $response['message'] = "error";
        $response['status_code'] = 404;
        return response()->json($response,404) ;
    }
}
