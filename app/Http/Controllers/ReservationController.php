<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Patient;
use App\Http\Resources\ReservationResource;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
       $reservation =new Reservation;
           $reservation->time = $request->time;
           $reservation->date = $request->date;
           $reservation->situation = $request->situation;
           $reservation->patient_id = $request->patient_id;
           $reservation->clinic_id = $request->clinic_id;
           $reservation->offer_id = $request->offer_id;
           $reservation->period_id = $request->period_id;

         
           $reservation->save();

            $response['data'] = ReservationResource::make($reservation);
            $response['message'] = "store success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
       
    }

    public function show_rese_for_clinic($clinic_id)
    {
        $reservations = Reservation::all()->where('clinic_id','=', $clinic_id);
        if (isset($reservations)) {
            $response['data'] = ReservationResource::collection($reservations);
            $response['message'] = "success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] =ReservationResource::collection($reservations);
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;
   
        
    }


    public function show_rese_for_user($user_id)
    {
        $patients = Patient::all()->where('user_id','=',$user_id);
        if (isset($patients)) {
            for ($i = 0, $c = count($patients); $i < $c; ++$i) {
                $id[$i] = $patients[$i]->id;
            }
        $reservations = Reservation::all()->whereIn('patient_id', $id);
       
        if (isset($reservations)) {
            $response['data'] = ReservationResource::collection($reservations);
            $response['message'] = "success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] = ReservationResource::collection($reservations);
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;
        }
       
        $response['data'] = $patients;
        $response['message'] = "error";
        $response['status_code'] = 404;
        return response()->json($response,404) ;
    }

    public function canceled_res($id)
    {
        $reservation = Reservation::find($id);
        if (isset($reservation)) {
            $reservation->situation='canceled';
            $reservation->save();
            $response['data'] = ReservationResource::make($reservation);
            $response['message'] = "success cancel";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] = ReservationResource::make($reservation);
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;


    }

    public function complete_res($id)
    {
        $reservation = Reservation::find($id);
        if (isset($reservation)) {
            $reservation->situation='complete';
            $reservation->save();
            $response['data'] = ReservationResource::make($reservation);
            $response['message'] = "success complete";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] = ReservationResource::make($reservation);
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;


    }
}
