<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
    //
    public function store(Request $request)
    {
       $work =new Work;
           $work->start_time = $request->start_time;
           $work->end_time = $request->end_time;
           $work->timing = $request->timing;
           $work->clinic_id = $request->clinic_id;
         
           $work->save();

            $response['data'] = $work;
            $response['message'] = "store success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
       
    }

    public function show_workingtime_for_clinic($clinic_id)
    {
        $works =  Work::all()->where('clinic_id','=', $clinic_id);
        if (isset($works)) {
            $response['data'] = $works;
            $response['message'] = "success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] =  $works;
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;
   
        
    }
}
