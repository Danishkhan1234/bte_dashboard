<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ExpertInformation;
use App\Models\ExpertEducation;
use App\Models\ExpertExperience;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class UserController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function information(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'lunguage' => 'required',
            'professional_title' => 'required',
            'professional_description' => 'required',
             ]);
      
      
        $table=new ExpertInformation();
        $table->user_id=$request->user_id;
        $table->lunguage=$request->lunguage;
        $table->professional_title=$request->professional_title;
        $table->professional_description=$request->professional_description;
        $table->save();
     if($table){
        return "GO to Expert Education url http://localhost:8000/api/education-information";
     }
    }




    public function education(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
            'certificate_name' => 'required',
            'certificate_id' => 'required',
             ]);
      
      
        $table=new ExpertEducation();
        $table->user_id=$request->user_id;
        $table->name=$request->name;
        $table->start_year=$request->start_year;
        $table->end_year=$request->end_year;
        $table->certificate_name=$request->certificate_name;
        $table->certificate_id=$request->certificate_id;
        $table->save();
        
        if($table){
        
         return "GO to Expert Experiance url http://localhost:8000/api/expert-experiance";
        
        }

    }
    
    
    
    
    public function experiance(Request $request)
    {
    
        $this->validate($request, [
            'user_id' => 'required',
            'title' => 'required',
            'start_year' => 'required',
            'end_year' => 'required',
             ]);
    
        $table=new ExpertExperience();
        $table->user_id=$request->user_id;
        $table->title=$request->title;
        $table->start_year=$request->start_year;
        $table->end_year=$request->end_year;
        $table->save();
        
        if($table){
            return response()->json(['status' => 'success']);
        }
    }



    public function registration(Request $request)
    {
        
            $this->validate($request, [
            'user_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'country' => 'required',
            'city' => 'required',
            'roles' => 'required',
             ]);
           
             $table=new User();
           $table->user_name=$request->user_name;
           $table->first_name=$request->first_name;
           $table->last_name=$request->last_name;
           $table->email=$request->email;
           $table->password=Hash::make($request->password);
           $table->country=$request->country;
           $table->city=$request->city;
           $table->roles=$request->roles;
           $table->apiKey=base64_encode(Str::random(40));
           $table->save();
           if($table){
               if($table->roles==1){
                   return "GO to Expert Information url http://localhost:8000/api/expert-information";
               }else{
            return response()->json(['status' => 'success']);
               }
          }else{
            return response()->json(['status' => 'fail'],401);
        }
           }
     




        public function login(Request $request){
               
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required',
                 ]);
               


         $user = User::where('email', $request->input('email'))->first();
      
         if(Hash::check($request->input('password'), $user->password)){
      
            $apikey = base64_encode(Str::random(40));
      
            User::where('email', $request->input('email'))->update(['apiKey' => "$apikey"]);

            if($user['roles']==1){
                
                if (ExpertInformation::where('user_id', '=', $user['id'])->count() > 0) {
                
                }else{
                
                    return "ExpertInformation Page";
                
                }

                 if (ExpertEducation::where('user_id', '=', $user['id'])->count() > 0) {
                
                }else{
                
                    return "ExpertEducation Page";
                
                
                }

                
                if (ExpertExperience::where('user_id', '=', $user['id'])->count() > 0) {
                }else{
                    return "ExpertExperience Page";
                }
            }
            
            return response()->json(['status' => 'success','api_key' => $apikey,'users'=>$user]);
      
        }else{
      
            return response()->json(['status' => 'fail'],401);
          }
       }
 
    }       

