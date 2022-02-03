<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\Location;
use App\State;
use App\Http\Resources\ClinicResource;


class ClinicController extends Controller
{
    public function store(Request $request)
    {
       $clinic =new Clinic;
          // if (isset($request->name)) {
                $clinic->name = $request->name;
            //}
             if (isset($request->phone)) {
                $clinic->phone = $request->phone;     
            }
             if (isset($request->price)) {
                $clinic->price = $request->price;     
            }
             if (isset($request->view_time)) {
                $clinic->view_time = $request->view_time;     
            }
            if (isset($request->location_id)) {
                $clinic->location_id = $request->location_id;     
            }
            if (isset($request->doctor_id)) {
                $clinic->doctor_id = $request->doctor_id;     
            }

         
           $clinic->save();

            $response['data'] = $clinic;
            $response['message'] = "store success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
       
    }
     public function update_clinic(Request $request)
    {
        $clinic=clinic::where('id','=',$request->id)->first();
        if(isset($clinic)){
            if (isset($request->name)) {
                $clinic->name = $request->name;
            }
             if (isset($request->phone)) {
                $clinic->phone = $request->phone;     
            }
             if (isset($request->price)) {
                $clinic->price = $request->price;     
            }
             if (isset($request->view_time)) {
                $clinic->view_time = $request->view_time;     
            }
            if (isset($request->location_id)) {
                $clinic->location_id = $request->location_id;     
            }
            if (isset($request->doctor_id)) {
                $clinic->doctor_id = $request->doctor_id;     
            }

             $clinic->save();
            $response['data'] = $clinic;
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
        $clinics = Clinic::all();

        $response['data'] = $clinics;
        $response['message'] = "This is all clinics";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }
     public function show_clinics_by_doctor_id($doctor_id)
    {
        $clinic = Clinic::where('doctor_id','=', $doctor_id )->first();
        if (isset($clinic)) {
        $location_cl = Location::where('id','=',$clinic->location_id)->first();
            if (isset($location_cl)) {
            $state_cl = State::where('id','=',$location_cl->state_id)->first();
              $response['data'] = $clinic;
              $response['location'] = $location_cl;
              $response['state'] = $state_cl;
              $response['message'] = "success";
              $response['status_code'] = 200;
              return response()->json($response,200) ;
             }
      
        }
        $response['data'] = $clinic;
        $response['location'] = $location_cl;
        $response['state'] = $state_cl;
        $response['message'] = "error";
        $response['status_code'] = 404;
        return response()->json($response,404) ;
    }
      public function show_clinics_by_location_id($location_id)
    {
        $clinic = Clinic::all()->where('location_id','=', $location_id );
        if (isset($clinic)) {
       // $response['data'] = ClinicResource::Collection($clinic);
           $response['data'] =$clinic->values();
        $response['message'] = "success";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
        }
        $response['data'] =$clinic->values();
        $response['message'] = "error";
        $response['status_code'] = 404;
        return response()->json($response,404) ;
    }
      public function show_clinics_by_id($id)
    {
        $clinic = Clinic::where('id','=', $id )->first();
        if (isset($clinic)) {
              //$response['data'] = $clinic;
              $response['data'] =  new ClinicResource($clinic);
              $response['message'] = "success";
              $response['status_code'] = 200;
              return response()->json($response,200) ;
             }
        $response['data'] = $clinic;
        $response['message'] = "error";
        $response['status_code'] = 404;
        return response()->json($response,404) ;
    }
}
