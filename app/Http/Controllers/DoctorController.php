<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Doctor;
use Hash;
class DoctorController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(){
      return view('admin.doctors.add');
    }

    public function store(Request $request){
        $doctor = new Doctor;
        $doctor->name =$request->name;
          // $doctor->password =bcrypt("$request->password");
    //    $doctor->password =Hash::make('$request->password');     
        $doctor->password =$request->password;
        // $doctor->code =$request->code;
        $doctor->save();

        return back();
    }
     public function all(){
        $doctors = Doctor::all();

        return view('admin.doctors.all',compact('doctors'));
    }
    
     public function edit($id){
       $doctor= Doctor::where('id','=',$id)->first();
      return view('admin.doctors.edit', compact('doctor'));
    }

     public function update($id,Request $Request){
       $doctor = Doctor::find($id);
       $doctor->name = $Request->name;
      $doctor->password =$Request->password;
        // $doctor->code =$request->code;
         //$doctor->password =bcrypt("$Request->password");
       $doctor->save();  
      return redirect('/doctors/all');
     }

     public function delete($id){
      $doctor = Doctor::find($id);
      $doctor->delete();
      return redirect('/doctors/all');
     }



     


}
