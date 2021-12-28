<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class DashboardController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(){
        return view('admin.deshboard');
    }





    // public function registration(Request $request)
    // {
        
    //         $this->validate($request, [
    //         'user_name' => 'required',
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'country' => 'required',
    //         'city' => 'required',
    //         'roles' => 'required',
    //          ]);
           
    //          $table=new User();
    //        $table->user_name=$request->user_name;
    //        $table->first_name=$request->first_name;
    //        $table->last_name=$request->last_name;
    //        $table->email=$request->email;
    //        $table->password=Hash::make($request->password);
    //        $table->country=$request->country;
    //        $table->city=$request->city;
    //        $table->roles=$request->roles;
    //        $table->apiKey=base64_encode(Str::random(40));
    //        $table->save();
    //        if($table){
    //            if($table->roles==1){
    //                return "GO to Expert Information url http://localhost:8000/api/expert-information";
    //            }else{
    //         return response()->json(['status' => 'success']);
    //            }
    //       }else{
    //         return response()->json(['status' => 'fail'],401);
    //     }
    //        }
     
 
    }       

