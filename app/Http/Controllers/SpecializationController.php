<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialization;
class SpecializationController extends Controller
{

	   public function index()
    {
        $specializations = Specialization::all();

        $response['data'] = $specializations;
        $response['message'] = "This is all specializations";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }
    public function store(Request $request)
    {
       $specialization =new Specialization;
		            $specialization->name = $request->name;
		            $specialization->description = $request->description;
		              
		            $specialization->save();

		            $response['data'] = $specialization;
		            $response['message'] = "store success";
		            $response['status_code'] = 200;
		            return response()->json($response,200) ;
    }
}
