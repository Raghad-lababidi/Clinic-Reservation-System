<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Validator;
use password_vertify;
use Hash;
class DoctorAgeController extends Controller
{
   public function update_doctor(Request $request)
    {
        $doctor=Doctor::where('id','=',$request->id)->first();
        if(isset($doctor)){
            if (isset($request->name)) {
                $doctor->name = $request->name;
            }
            if (isset($request->email)) {
                $doctor->email = $request->email;     
            }
            if (isset($request->password)) {
                //$doctor->password =bcrypt("$request->password");
                //$doctor->password =Hash::make('$request->password');
                $doctor->password =$request->password;     
            }
             if (isset($request->my_information)) {
                $doctor->my_information = $request->my_information;     
            }
            if (isset($request->image)) {
              $image_name = rand() . "." . $request->image->
                getClientOriginalExtension();
              $doctor->image =  $image_name;
              $request->image->move('image', $image_name);     
            }
            if (isset($request->phone)) {
                $doctor->phone = $request->phone;     
            }
            if (isset($request->gender)) {
                $doctor->gender = $request->gender;     
            }
            if (isset($request->specialization_id)) {
                $doctor->specialization_id = $request->specialization_id;     
            }

             $doctor->save();
            $response['data'] = $doctor;
            $response['message'] = "update success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            
 
        }
            $response['data'] = '';
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;

    }

       public function index()
    {
        $doctors = Doctor::all();

        $response['data'] = $doctors;
        $response['message'] = "This is all doctors";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }
     public function show_doctors_by_specialization_id($specialization_id)
    {
        $doctor = Doctor::all()->where('specialization_id','=', $specialization_id );
        if (isset($doctor)) {
        $response['data'] = $doctor->values();
        $response['message'] = "success";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
        }
        $response['data'] =$doctor->values();
        $response['message'] = "error";
        $response['status_code'] = 404;
        return response()->json($response,404) ;
    }
     public function show_doctor_profile_by_id($id)
        {
            $doctor = Doctor::where('id','=', $id )->first();
            if (isset($doctor)) {
            $response['data'] = $doctor;
            $response['message'] = "success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] = $doctor;
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;
        }

        public function show_doctor_profile_by_name($name)
        {
            $doctor = Doctor::all()->where('name','=', $name );
            if (isset($doctor)) {
            $response['data'] = $doctor->values();
            $response['message'] = "success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] = $doctor->values();
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;
        }
         public function show_doctor_by_password(Request $request)
        {
           
            $doctor = Doctor::where('id','=',$request->id)->where('password','=',$request->password)->first();
            if (isset($doctor)) {
            $response['data'] = $doctor;
            $response['message'] = "success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] = $doctor;
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;
        }
}
