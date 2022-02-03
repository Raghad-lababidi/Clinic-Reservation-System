<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Http\Resources\OfferResource;

class OfferController extends Controller
{
    public function store(Request $request)
    {
       $offer =new Offer;
           $offer->details = $request->details;
           $offer->start_time = $request->start_time;
           $offer->end_time = $request->end_time;
           $offer->discound = $request->discound;
           $offer->clinic_id = $request->clinic_id;
         
           $offer->save();

            $response['data'] = OfferResource::make($offer);
            $response['message'] = "store success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
       
    }

    public function index()
    {
        $offers = Offer::all();

        $response['data'] = OfferResource::collection($offers);
        $response['message'] = "This is all offers";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }

    public function show_offers_for_clinic($clinic_id)
    {
        $offers = Offer::all()->where('clinic_id','=', $clinic_id);
        if (isset($offers)) {
            $response['data'] = OfferResource::collection($offers);
            $response['message'] = "success";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
            }
            $response['data'] = OfferResource::collection($offers);
            $response['message'] = "error";
            $response['status_code'] = 404;
            return response()->json($response,404) ;
   
        
    }
}
