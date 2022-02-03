<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;
use App\Reservation;

class PeriodController extends Controller
{
    //
    public function store(Request $request)
    {
       $period =new Period;
       $period->start_of_period = $request->start_of_period;
       $period->work_id = $request->work_id;
         
       $period->save();

            $response['data'] = $period;
            $response['message'] = "store success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
       
    }

    


    public function available_period(Request $request)
    {
    
        $reservations = Reservation::all()->where('clinic_id','=', $request->clinic_id)
       ->where('date','=', $request->date)
        ->whereIn('situation',['active','complete']);
        for ($i = 0, $c = count($reservations); $i < $c; ++$i) {
            $period_id[$i] = $reservations[$i]->period_id;
        }
        $periods=Period::all()->where('work_id','=', $request->work_id)
        ->except($period_id);
        if (isset($periods)) {
            $response['data'] =$periods;
            $response['message'] = "success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] = $periods;
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;

    }
}
